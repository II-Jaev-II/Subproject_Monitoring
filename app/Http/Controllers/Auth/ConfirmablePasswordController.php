<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (
            !Auth::guard('web')->validate([
                'email' => $request->user()->email,
                'password' => $request->password,
            ])
        ) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        $user = $request->user();
        if ($user->userType === 'IBUILD') {
            return redirect()->route('ibuild.dashboard');
        } elseif ($user->userType === 'IREAP') {
            return redirect()->route('ireap.dashboard');
        } elseif ($user->userType === 'ADMIN') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->userType === 'GGU') {
            return redirect()->route('ggu.dashboard');
        } elseif ($user->userType === 'IPLAN') {
            return redirect()->route('iplan.dashboard');
        } elseif ($user->userType === 'ECON') {
            return redirect()->route('econ.dashboard');
        } elseif ($user->userType === 'SES') {
            return redirect()->route('ses.dashboard');
        }
    }
}
