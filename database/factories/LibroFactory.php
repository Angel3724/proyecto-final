<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'autor' => $this->faker->name(),
            'editorial' => $this->faker->company(),
            'precio' => $this->faker->randomFloat(2, 5, 900),
            'anio_publicacion' => $this->faker->year(),
            'isbn' => $this->faker->isbn13(),
            'paginas' => $this->faker->numberBetween(60, 1000),
            'sinopsis' => $this->faker->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Libro $libro) {
            $cantidadGeneros = $this->faker->numberBetween(1, 4);
            $generos = Genero::all()->random($cantidadGeneros);
            $libro->generos()->attach($generos); 
        });
    }
}
