<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $rawLogin = trim((string) $this->input('email'));
        $cleanedLogin = ltrim($rawLogin, '@');
        $password = (string) $this->input('password');
        $remember = $this->boolean('remember');

        $isEmail = (bool) filter_var($cleanedLogin, FILTER_VALIDATE_EMAIL);
        $primaryField = $isEmail ? 'email' : 'username';

        $authenticated = Auth::attempt([$primaryField => $cleanedLogin, 'password' => $password], $remember);

        // Fallback: jika login via username gagal, coba juga via email (atau sebaliknya)
        if (! $authenticated) {
            $fallbackField = $isEmail ? 'username' : 'email';
            $authenticated = Auth::attempt([$fallbackField => $cleanedLogin, 'password' => $password], $remember);
        }

        if (! $authenticated) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        $rawLogin = trim((string) $this->input('email'));
        $cleanedLogin = ltrim($rawLogin, '@');

        return Str::transliterate(Str::lower($cleanedLogin).'|'.$this->ip());
    }
}
