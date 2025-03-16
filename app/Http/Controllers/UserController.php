<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Cadastro do usuário
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(UserRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended(route("home"));
        }

        return redirect()->back()->withErrors(["Ocorreu um erro inesperado"]);
    }
}
