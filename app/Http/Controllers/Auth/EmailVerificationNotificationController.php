<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // Get the authenticated user
            $user = $request->user();

            if ($user->userType === 'IBUILD') {
                return redirect()->route('ibuild.dashboard');
            } elseif ($user->userType === 'IREAP') {
                return redirect()->route('ireap.dashboard');
            } elseif ($user->userType === 'ADMIN') {
                return redirect()->route('admin.dashboard');
            }
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
