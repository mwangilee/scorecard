<?php
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Parameters::class, function ($faker) {
 $category_id = factory(App\Categories::class)->create()->id;
     return [  
        'category_id'=> $category_id,
        'parametername' => $faker->word,
        'paramtype_bool'=> $faker->boolean(50),
        'status'=> 'ACTIVE',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\ScoreCardWeights::class, function ($faker) {
    
    $param_id = factory(App\Parameters::class)->create()->id;
    $category_id = factory(App\Categories::class)->create()->id;
     return [ 
        'parameter_id' => $param_id,
        'category_id'=> $category_id,
        'min' => $faker->numberBetween(0,50),
        'max' => $faker->numberBetween(51,100),
        'score' => $faker->numberBetween(0,10),
        'value' => $faker->word,
        'status'=> 'ACTIVE',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        
    ];
});

$factory->define(App\ScoreCard::class, function (Faker\Generator $faker) {
    $category_id = factory(App\Categories::class)->create()->id;
    return [
        'category_id'=> $category_id,
        'name' => $faker->stateAbbr,
        'description' => $faker->streetName,
        'score' => $faker->numberBetween(0,10),
        'status'=> 'ACTIVE',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Categories::class, function ($faker) {
     return [       
        'name'=> $faker->company,
        'status'=> 'ACTIVE',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});


 



