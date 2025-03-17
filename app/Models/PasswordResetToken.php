<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $table = "password_reset_tokens";
    protected $primaryKey = "email";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        "email",
        "token",
        "expires_at"
    ];

    public $timestamps = null;

    /**
     * Retornar usuário que contém o email
     * @return \App\Models\User|null 
     */
    public function user(): User|null
    {
        return User::where("email", $this->email)->first();
    }
}
