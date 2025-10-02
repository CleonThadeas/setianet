<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','speed'];

    // relasi many-to-many ke users lewat pivot user_subscriptions
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subscriptions', 'product_id', 'user_id')
                    ->withTimestamps();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'product_id');
    }
}
