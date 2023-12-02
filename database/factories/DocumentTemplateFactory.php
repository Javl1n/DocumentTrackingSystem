<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocumentTemplate>
 */
class DocumentTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = fake()->unique()->catchPhrase(),
            'update_cycle' => fake()->numberBetween(1, 12),
            'slug' =>  Str::slug($name, '-'),
            // 'link' => Storage::copy('seederTemplate.xlsx', 'templates/' . $slug . '.xlsx'),
            'description' => fake()->text(),
        ];
    }
}
