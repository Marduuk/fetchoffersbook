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
        'id', 'admin_name', 'categories', 'positions', 'cities', 'url', 'apply_url', 'code', 'provider'
    ];
}
