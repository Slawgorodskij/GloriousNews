<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_in_soc',
        'type_auth',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createUser($data)
    {
        $role = $data['role'] ?? 'user';
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole($role);

        return $user;
    }

    public static function createUserSocial($user, $typeAuth)
    {
        $newUser = new User();
        $newUser->fill([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => Hash::make('qwerty'),
            'id_in_soc' => $user->getId(),
            'type_auth' => $typeAuth,
            'avatar' => $user->getAvatar(),
        ])->save();
        $newUser->assignRole('user');

        return $newUser;
    }

    public static function updateUserSocial($oldUser, $user, $typeAuth)
    {
        $oldUser->update([
            'id_in_soc' => $user->getId(),
            'type_auth' => $typeAuth,
        ]);
        return $oldUser;
    }

    public static function updateUser($data)
    {
        $password = Hash::make($data['password']);
        $data->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
        ]);
        return true;
    }
}
