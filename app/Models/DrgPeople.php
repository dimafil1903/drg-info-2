<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DrgPeople
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_lt
 * @property string|null $date_of_birthday
 * @property string|null $passport
 * @property string|null $passport_id
 * @property string|null $photo
 * @property string|null $address
 * @property mixed|null $phones
 * @property \datetime|null $created_at
 * @property \datetime|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople whereDateOfBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople whereNameLt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople wherePassportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople wherePhones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgPeople whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
