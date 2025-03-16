<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "name",
        "email",
        "phone",
        "notes"
    ];

    /**
     * Verifica se o contato pertence ao usuário
     * @return bool
     */
    public function belongsToUser(): bool
    {
        return $this->user_id === Auth::user()->id;
    }
}
