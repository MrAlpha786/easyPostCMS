<?php

namespace App\Models;

use App\Enums\UserRoleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'password' => 'hashed', // All hash the password
        'role' => UserRoleType::class,
    ];

    /**
     * Search for the query
     */
    public function scopeSearch($query, $q)
    {
        $columns = ['firstname', 'lastname', 'email',];

        foreach ($columns as $column) {
            $query->orWhere($column, 'LIKE', '%' . $q . '%');
        }

        return $query;
    }
}
