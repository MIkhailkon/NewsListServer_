<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = ['Музыка', 'Хобби', 'Финансы', 'Жизнь', 'Климат', 'Воздух', 'Текст', 'Учеба', 'Код', 'Автомобили'];
        return [
            'text' => $this->faker->sentence(5),
            'author' => $this->faker->unique()->name,
            'tags' => $this->faker->randomElements($tags, 3),
        ];
    }
}
