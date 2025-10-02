<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $role
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * ---------- RELATIONSHIPS ----------
 * @property-read \Illuminate\Database\Eloquent\Collection<int,\App\Models\Product> $subscriptions
 * @property-read int|null $subscriptions_count
 *
 * ---------- STATIC METHODS ----------
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
/**
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $subscriptions
 * @method \Illuminate\Database\Eloquent\Relations\BelongsToMany subscriptions()
 */ 
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass assignable fields
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * Fields that should be hidden in arrays
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Many-to-Many relation: A user can subscribe to many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }
        
}
