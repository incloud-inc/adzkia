<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'name', 'email', 'email_verified_at', 'password', 'current_tenant_id',
    'username', 'whatsapp_number', 'whatsapp_verified_at',
    'postal_code', 'address', 'profile_photo_path', 'cover_photo_path', 'bio',
    'google_id', 'avatar_url',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Fitur verifikasi email dinonaktifkan: seluruh user otomatis terverifikasi.
     */
    public function hasVerifiedEmail(): bool
    {
        return true;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'whatsapp_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the URL to the user's profile photo.
    /**
     * Resolve asset URL with fast local check and zero remote latency fallback to R2.
     */
    public static function getStorageUrl(?string $path, string $default): string
    {
        if (! $path) {
            return $default;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (file_exists(storage_path('app/public/'.$path))) {
            return Storage::disk('public')->url($path);
        }

        $disk = config('filesystems.upload_disk', 'public');
        if ($disk === 'r2' && (! config('filesystems.disks.r2.key') || ! config('filesystems.disks.r2.secret'))) {
            return Storage::disk('public')->url($path);
        }

        return Storage::disk($disk)->url($path);
    }

    /**
     * Get the URL to the user's profile photo.
     */
    protected function profilePhotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => self::getStorageUrl(
                $this->profile_photo_path ?: $this->avatar_url,
                'https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&dpr=1'
            )
        );
    }

    /**
     * Get the URL to the user's cover photo.
     */
    protected function coverPhotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => self::getStorageUrl(
                $this->cover_photo_path,
                'https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
            )
        );
    }

    /**
     * Check if user's WhatsApp is verified.
     */
    public function isWhatsappVerified(): bool
    {
        return ! is_null($this->whatsapp_verified_at);
    }

    /**
     * Get the current active tenant that the user is viewing.
     *
     * @return BelongsTo<Tenant, $this>
     */
    public function currentTenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class, 'current_tenant_id');
    }

    /**
     * Get all tenants the user belongs to.
     *
     * @return BelongsToMany<Tenant, $this>
     */
    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Switch current tenant context.
     */
    public function switchTenant(Tenant|int $tenant): void
    {
        $tenantId = $tenant instanceof Tenant ? $tenant->id : $tenant;

        $this->update(['current_tenant_id' => $tenantId]);
    }

    /**
     * Get the user's role in the current tenant.
     * S = Super User, A = Admin, T = Teacher, U = User/Student
     */
    public function currentRole(): ?string
    {
        if (! $this->current_tenant_id) {
            return null;
        }

        return $this->tenants()->where('tenant_id', $this->current_tenant_id)->first()?->pivot?->role;
    }

    /**
     * Check if user is Super User (Owner).
     */
    public function isSuperUser(): bool
    {
        return $this->tenants()->wherePivot('role', 'S')->exists();
    }

    /**
     * Check if user is Admin in current tenant.
     */
    public function isAdmin(): bool
    {
        if ($this->currentRole() === 'A') {
            return true;
        }

        return $this->tenants()->wherePivot('role', 'A')->exists();
    }

    /**
     * Check if user is Teacher in current tenant.
     */
    public function isTeacher(): bool
    {
        if ($this->currentRole() === 'T') {
            return true;
        }

        return $this->tenants()->wherePivot('role', 'T')->exists();
    }

    /**
     * Check if user is regular User / Student in current tenant.
     */
    public function isUser(): bool
    {
        return $this->currentRole() === 'U';
    }

    /**
     * Alias for isUser / Student.
     */
    public function isStudent(): bool
    {
        if ($this->currentRole() === 'U') {
            return true;
        }

        return ! $this->isSuperUser() && ! $this->isAdmin() && ! $this->isTeacher();
    }

    /**
     * Check if user has a public profile page (@username).
     * Only Teachers and Students have public profiles.
     * Admin and Owner profiles are disabled.
     */
    public function hasPublicProfile(): bool
    {
        if ($this->isSuperUser()) {
            return false;
        }

        if ($this->isTeacher()) {
            return true;
        }

        if ($this->isAdmin()) {
            return false;
        }

        return true;
    }

    /**
     * Get assessments created by the user.
     *
     * @return HasMany<Assessment, $this>
     */
    public function assessments(): HasMany
    {
        return $this->hasMany(Assessment::class, 'created_by');
    }

    /**
     * Get orders placed by the user.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get assessment access records for this user.
     */
    public function assessmentAccesses(): HasMany
    {
        return $this->hasMany(UserAssessmentAccess::class);
    }

    /**
     * Get the user's access record for a specific assessment.
     */
    public function getAssessmentAccess(Assessment|int $assessment): ?UserAssessmentAccess
    {
        $assessmentId = $assessment instanceof Assessment ? $assessment->id : $assessment;

        return $this->assessmentAccesses()
            ->where('assessment_id', $assessmentId)
            ->first();
    }

    /**
     * Check if user has active, valid access with remaining attempts for the assessment.
     */
    public function hasPurchasedAssessment(Assessment|int $assessment): bool
    {
        $access = $this->getAssessmentAccess($assessment);
        if ($access) {
            return $access->isValid();
        }

        $assessmentId = $assessment instanceof Assessment ? $assessment->id : $assessment;

        return $this->orders()
            ->where('assessment_id', $assessmentId)
            ->where('status', 'settled')
            ->exists();
    }
}
