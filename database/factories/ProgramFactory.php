<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition()
    {
        return [
            'sumber_dana' => $this->faker->randomElement(['Dana Pemerintah', 'Swasta']),
            'program' => $this->faker->sentence(3),
            'keterangan' => $this->faker->paragraph(2),
        ];
    }
}
