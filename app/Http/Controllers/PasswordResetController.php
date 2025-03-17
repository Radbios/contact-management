<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassowordEmailRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class PasswordResetController extends Controller
{
    /**
     * Envia notificação para recuperação de senha via email
     * @param \App\Http\Requests\PassowordEmailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password_request(PassowordEmailRequest $request): RedirectResponse
    {
        $user = User::where("email", $request->email)->first();

        if(!$user) return redirect()->back()->withErrors(["error" => "Email não encontrado."]);

        $user->resetPasswordNotification();

        return redirect()->route("login")->with("success", "O email de recuperação foi enviado");
    }

    /**
     * Verifica token e, se válido, redireciona para view de atualizar senha
     * @param string $token
     * @return \Illuminate\Support\Facades\View
     */
    public function password_reset(string $token)
    {
        AuthService::password_reset_token_is_valid($token);
        
        return view("guest.password-reset", compact("token"));
    }
    
    /**
     * Atualizar senha
     * @param \App\Http\Requests\PasswordUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password_update(PasswordUpdateRequest $request)
    {
        $instance = AuthService::password_reset_token_is_valid($request->token);
        AuthService::reset_password($instance, $request->password);

        return redirect()->route("login")->with("success", "A senha foi atualizada!");
    }
}
