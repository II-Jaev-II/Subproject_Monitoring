<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'userName' => $request->username,
            'email' => $request->email,
            'userType' => $request->userType,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->userType === 'IBUILD') {
            return redirect()->route('ibuild.dashboard');
        } elseif ($user->userType === 'IREAP') {
            return redirect()->route('ireap.dashboard');
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
