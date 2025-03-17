<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Mail\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, "user_id")
                    ->orderBy("deleted_at");
    }

    public function resetPasswordNotification()
    {
        $instance = PasswordResetToken::find($this->email);
        $expire = config('auth.passwords.users.reset');
        $date = date('Y-m-d H:i:s', strtotime(now()) + ($expire * 60));
        if($instance) {
            $instance->update(["expires_at" => $date]);
        } else {
            $instance = PasswordResetToken::create([
                "email" => $this->email,
                "token" => Str::random(60),
                "expires_at" => $date
            ]);
        }

        Mail::to($this->email)->send(new ResetPassword($this, $instance->token));
    }
}
