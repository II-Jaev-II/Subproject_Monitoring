<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->hasVerifiedEmail()) {
            $user = $request->user();

            if ($user->userType === 'IBUILD') {
                return redirect()->intended(route('ibuild.dashboard'));
            } elseif ($user->userType === 'IREAP') {
                return redirect()->intended(route('ireap.dashboard'));
            } elseif ($user->userType === 'ADMIN') {
                return redirect()->intended(route('admin.dashboard'));
            }
        }
        return view('auth.verify-email');
    }
}
