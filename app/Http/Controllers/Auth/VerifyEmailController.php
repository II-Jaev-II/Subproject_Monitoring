<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            $user = $request->user();

            if ($user->userType === 'IBUILD') {
                return redirect()->intended(route('ibuild.dashboard') . '?verified=1');
            } elseif ($user->userType === 'IREAP') {
                return redirect()->intended(route('ireap.dashboard') . '?verified=1');
            } elseif ($user->userType === 'ADMIN') {
                return redirect()->intended(route('admin.dashboard') . '?verified=1');
            } elseif ($user->userType === 'GGU') {
                return redirect()->intended(route('ibuild.dashboard') . '?verified=1');
            } elseif ($user->userType === 'IPLAN') {
                return redirect()->intended(route('iplan.dashboard') . '?verified=1');
            } elseif ($user->userType === 'ECON') {
                return redirect()->intended(route('econ.dashboard') . '?verified=1');
            } elseif ($user->userType === 'SES') {
                return redirect()->intended(route('ses.dashboard') . '?verified=1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $user = $request->user();

        if ($user->userType === 'IBUILD') {
            return redirect()->intended(route('ibuild.dashboard') . '?verified=1');
        } elseif ($user->userType === 'IREAP') {
            return redirect()->intended(route('ireap.dashboard') . '?verified=1');
        } elseif ($user->userType === 'ADMIN') {
            return redirect()->intended(route('admin.dashboard') . '?verified=1');
        } elseif ($user->userType === 'GGU') {
            return redirect()->intended(route('ggu.dashboard') . '?verified=1');
        } elseif ($user->userType === 'IPLAN') {
            return redirect()->intended(route('iplan.dashboard') . '?verified=1');
        } elseif ($user->userType === 'ECON') {
            return redirect()->intended(route('econ.dashboard') . '?verified=1');
        } elseif ($user->userType === 'SES') {
            return redirect()->intended(route('ses.dashboard') . '?verified=1');
        }
    }
}
