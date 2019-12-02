<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AppProfile;
use Faker\Generator as Faker;

$factory->define(AppProfile::class, function (Faker $faker) {
    return [

    	    'titre'=>$faker->sentence(2,true),
            'description'=>$faker->paragraph(),
            'url'=>$faker->sentence(2,true),
        //
    ];
});
