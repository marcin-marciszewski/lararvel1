<?php

use Illuminate\Database\Seeder;

use App\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Sport' => 'primary',
            'Hot hatch' => 'secondary',
            'Coupe' => 'warning',
            'German' => 'success',
            'Japanese' => 'light',
            'Muscle Car' => 'info',
            'Luxury' => 'danger'
        ];

        foreach($tags as $key => $value){
            $tag = new Tag(
                [
                    'name' => $key,
                    'style' => $value
                ]
                );
            $tag->save();
        }
    }
}
