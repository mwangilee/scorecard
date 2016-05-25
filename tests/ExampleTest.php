<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
   
    
    
    public function testDatabase()
{
        //
        //$users = factory(App\User::class, 5)->create();
         $weights = factory(App\ScoreCardWeights::class, 5)->create();         
         $ScoreCard = factory(App\ScoreCard::class, 5)->create();
         $categories = factory(App\Categories::class, 5)->create();
    
         
         //dd($users);
       


    // Use model in tests...
}
}
