<?php

namespace App\Http\Controllers;

use App\Models\QuestionGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionGroupController extends Controller
{
    /**
     * Update the specified question group (stimulus / narrative context) from assessment detail view.
     */
    public function update(Request $request, QuestionGroup $questionGroup): JsonResponse|RedirectResponse
    {
        $user = Auth::user();
        if (! $user || (! $user->isTeacher() && ! $user->isAdmin() && ! $user->isSuperUser())) {
            abort(403, 'Akses ditolak: Anda tidak memiliki wewenang untuk mengedit stimulus.');
        }

        if (! $user->isSuperUser()) {
            $assessment = $questionGroup->assessmentSection?->assessment;
            if ($assessment && $assessment->tenant_id !== null) {
                $userTenantIds = $user->tenants->pluck('id')->all();
                if (! in_array($assessment->tenant_id, $userTenantIds, true) && $user->current_tenant_id !== $assessment->tenant_id) {
                    abort(403, 'Akses ditolak: Anda tidak memiliki wewenang mengedit stimulus milik institusi lain.');
                }
            }
        }

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'stimulus_content' => 'required|string',
            'stimulus_type' => 'nullable|string|max:50',
        ]);

        $title = array_key_exists('title', $validated) ? trim((string) $validated['title']) : null;

        $questionGroup->update([
            'title' => $title !== '' ? $title : null,
            'stimulus_content' => $validated['stimulus_content'],
            'stimulus_type' => $validated['stimulus_type'] ?? $questionGroup->stimulus_type ?? 'text',
        ]);

        $msg = 'Stimulus narasi berhasil diperbarui!';

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
                'question_group' => $questionGroup,
            ]);
        }

        return redirect()->back()->with('success', $msg);
    }
}
