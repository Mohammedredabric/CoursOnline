<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'video_url'=> 'youtube.com/' .rand(10,200),
            'description'=>$this->faker->paragraphs(3,true),
            'course_id'=> \App\Models\Course::all()-> random()->id
        ];
    }
}
