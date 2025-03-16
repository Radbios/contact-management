<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeSearch(Builder $query, string $search)
    {
        if(!is_null($search)) {
            $query->where("name", "LIKE", "%" . $search . "%");
        }
    }

    public function scopeFilter(Builder $query, string $filter)
    {
        if(!is_null($filter)) {
            if($filter == 0) {
                $query->onlyTrashed();
            } else if($filter == -1) {
                $query->withTrashed();
            }
        }
    }
}
