<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create()
        ->each(function($user){
            factory(App\Car::class, rand(1,3))->create(
                [
                    'user_id' => $user->id
                ]
            )
            ->each(function($car){
                $tag_ids = range(1,7);
                shuffle($tag_ids);
                $assignments = array_slice($tag_ids, 0, rand(0,7));
                foreach($assignments as $tag_id){
                    DB::table('car_tag')
                        ->insert(
                            [
                                'car_id' => $car->id,
                                'tag_id' => $tag_id,
                                'created_at' => Now(),
                                'updated_at' => Now()
                            ]
                            );
                }
            });
        });
    }
}
