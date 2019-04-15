<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Product\Product;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    protected $fillable = ['name', 'last_name', 'email', 'password', 'status', 'role', 'verify_token'];
    protected $hidden = ['password', 'remember_token'];
    
    public static function register(string $name, string $email, string $password)
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'verify_token' => Str::uuid(),
            'role' => self::ROLE_USER,
            'status' => self::STATUS_WAIT,
        ]);
    }

    public function verify(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('Ваша почта уже подтверждена');
        }

        $this->update([
            'status' => self::STATUS_ACTIVE,
            'verify_token' => null,
        ]);
    }

    public static function new($name, $email)
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt(Str::random()),
            'role' => self::ROLE_USER,
            'status' => self::STATUS_WAIT,
        ]);
    }
    /**
     * Изменение профиля в кабинете
     */
    public function edit($fields)
    {   
        if($fields['name']      != null) { $this->name = $fields['name'];} 
        if($fields['last_name'] != null) { $this->last_name = $fields['last_name'];} 
        if($fields['email']     != null) { $this->email = $fields['email'];} 
        if($fields['password']  != null) { $this->password = bcrypt($fields['password']);}
        $this->save();
    } 
    
    public function addToCard($productId)
    {
        if($productId == null) {return;}
        if ($this->hasInCard($productId)) {
            throw new \DomainException('Этот продукт уже в корзине');
        }
        $this->cards()->attach($productId);
        $this->save();
    }

    public function cartCount()
    {
        return $this->cards()->count();
    }
    
    public function removeFromCard($productId)
    {
        $this->cards()->detach($productId);
    }

    public function hasInCard($id)
    {
        return $this->cards()->where('id', $id)->exists();
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
    
    public function cards()
    {
        return $this->belongsToMany(Product::class, 'card');
    }
}
