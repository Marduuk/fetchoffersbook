<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model as Model;

class Offer extends Model
{
    use Notifiable;

    protected $table = 'offers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'admin_name', 'categories', 'positions', 'cities', 'url', 'apply_url', 'code'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getOffers($provider)
    {
        return $this->where('provider', $provider)->get();
    }
}
