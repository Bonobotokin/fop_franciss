<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'im_personnel' => 0001,
            'nom_personnel' => 'Tokin',
            'fonction_personnel' => 'directeur',
            'telephone_personnel' => 261346697188
        ];
    }
}
