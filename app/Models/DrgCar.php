<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DrgCar
 *
 * @property int $id
 * @property string|null $number
 * @property string|null $photo
 * @property string|null $description
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar query()
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DrgCar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DrgCar extends Model
{
}
