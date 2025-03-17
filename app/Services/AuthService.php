<?php

namespace App\Services;

use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthService
{
    /**
     * Verificar se token é válido
     *
     * @param string $token
     * @return \App\Models\PasswordResetToken
     */
    static public function password_reset_token_is_valid(string $token) {
        $instance = PasswordResetToken::where("token", $token)->first();

        if(!$instance) {
            throw new NotFoundHttpException();
        }
        $date = date('Y-m-d H:i:s', strtotime($instance->expires_at));

        if(now() > $date) {
            throw new NotFoundHttpException();
        }

        return $instance;
    }

    /**
     * Atualizar senha de acordo com token
     * @param \App\Models\PasswordResetToken $instance
     * @param string $password
     * @return \App\Models\User|null
     */
    static public function reset_password(PasswordResetToken $instance, string $password): User|null
    {
        $user = $instance->user();

        DB::transaction(function() use($instance, $user, $password) {
            $user->update([
                "password" => Hash::make($password)
            ]);
            $instance->delete();
        }, 2);

        return $user;
    }
}
