<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profil;

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
        'name', 'email','phone', 'address', 'password', 'role', 'user_slug','image_path', // role: 'seller' atau 'buyer'
    ];

    // Relasi: kalau user adalah penjual
    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    // Relasi: kalau user adalah pembeli
    public function orders()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }

    // Cek apakah user penjual
    public function isSeller()
    {
        return $this->role === 'seller';
    }

    // Cek apakah user pembeli
    public function isBuyer()
    {
        return $this->role === 'buyer';
    }

}
