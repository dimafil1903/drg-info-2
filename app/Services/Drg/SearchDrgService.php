<?php

namespace App\Services\Drg;

use App\Models\DrgCar;
use App\Models\DrgPeople;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

class SearchDrgService
{

    #[ArrayShape(['drg_people' => "array", 'cars' => "array"])]
    public static function find($text): array
    {


        $drgPeople = DrgPeople::whereRaw('LOWER(name_ru) like ?', array('%' . mb_strtolower($text) . '%'))
            ->orWhereRaw('LOWER(name_lt) like ?', array('%' . mb_strtolower($text) . '%'))
            ->orWhereRaw('LOWER(date_of_birthday) like ?', array('%' . mb_strtolower($text) . '%'))
            ->orWhereRaw('LOWER(passport) like ?', array('%' . mb_strtolower($text) . '%'))
            ->orWhereRaw('LOWER(passport_id) like ?', array('%' . mb_strtolower($text) . '%'))
            ->orWhereRaw('LOWER(address) like ?', array('%' . mb_strtolower($text) . '%'))
            ->orWhereRaw('LOWER(phones) like ?', array('%' . mb_strtolower($text) . '%'))->limit(10)->get();

        $drgCars = DrgCar::whereRaw('LOWER(description) like ?', array('%' . mb_strtolower($text) . '%'))
            ->orWhereRaw('LOWER(number) like ?', array('%' . mb_strtolower($text) . '%'))
            ->limit(10)->get();


        return [
            'drg_people' => $drgPeople->toArray(),
            'cars' => $drgCars->toArray(),
        ];

    }


}
