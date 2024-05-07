<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function show(User $user)
    {
        return view('detail-user', [
            'user'=>$user
        ]);
    }
    // public static function addSampleUser()
    // {
    //     $user = new self();
    //     $user->id = 1;
    //     $user->name = 'Admin';
    //     $user->email = 'adminl@example.com';
    //     $user->password = \Illuminate\Support\Facades\Hash::make('password');
    //     $user->save();
    // }
}
