<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrgPeople extends Model
{
    protected $fillable=[
        'name_ru',
        'name_lt',
        'date_of_birthday',
        'address',
        'phones',
        'passport',
        'passport_id',
        'photo'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',

    ];

    protected $dateFormat = "Y-m-d H:i";
}
