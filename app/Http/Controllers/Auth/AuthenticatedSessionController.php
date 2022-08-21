<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\InvalidStateException;
use Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        if (Auth::user()->status === config('const.users.status.block')) {
            return $this->destroy($request);
        }

        $request->session()->regenerate();

        if (Auth::user()->role_id === config('const.admin')) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function apiLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login Fail',
            ]);
        }

        $user = Auth::user();

        if ($user->role_id == config('const.admin')) {
            $token = $user->createToken($request->device, ['admin:view']);
        } else {
            $token = $user->createToken($request->device);
        }

        $user->token = $token->plainTextToken;

        return response()->json($user);
    }

    public function apiLogout()
    {
        auth()->user()->currentAccessToken()->delete();
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function processGoogleLogin()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route("login")->with('error', 'Try after some time');
        }
        
        
        if (!$user) {
            return redirect()->route("login");
        }

        $existUser = User::firstOrCreate(
            [
                "google_id" => $user->id,
            ],
            [
                "name" => 'google_' . $user->name,
                "email" => $user->email,
                "password" => '',
                "phone" => null,
                "address" => null,
                "image" => $user->avatar
            ]
        );

        Auth::loginUsingId($existUser->id);

        return redirect()->route("home");
    }
}