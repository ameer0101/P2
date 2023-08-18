<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class GoogleController extends Controller
{
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            try {
                $user = Socialite::driver('google')->user();
            } catch (InvalidStateException $e) {
                $user = Socialite::driver('google')->stateless()->user();
            }
            $finduser = User::query()->where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);

            } else {
                $newUser = User::query()->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
            }
            return response()->json([$finduser]);
        }
        catch (\Throwable $e) {
            dd($e);
        }
    }

}
