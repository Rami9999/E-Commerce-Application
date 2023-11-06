<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email'=>'rami.aboajeeb.99@gmail.com',
            'phone'=>'+963938390067',
            'phone2'=>'N/A',
            'address'=>'Syria, Tartus, Alqadmous',
            'map' => 'Syria, Tartus, Alqadmous',
            'twiter'=>'N/A',
            'facebook'=>'rami abo ajeeb',
            'pinterest'=>'N/A',
            'instagram'=>'@rami9999',
            'youtube'=>'N/A',

        ];
    }
}
