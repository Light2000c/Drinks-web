<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'price',
        'discount',
        'category',
        'quantity',
        'brand',
        'colour',
        'size',
        'image',
        'description'
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function hasCart(User $user)
    {
        return $this->cart->contains('user_id', $user->id);
    }


    public function hasWish(User $user)
    {
        return $this->wish->contains('user_id', $user->id);
    }

    public function cartQuantity(User $user)
    {
        return $this->hasCart($user) ? $this->cart->where('user_id', $user->id)->first()->quantity : 1;
    }


    public function order(){
        return $this->hasMany(Order::class());
    }

    public function wish(){
      return  $this->hasMany(Wishlist::class);
    }
}
