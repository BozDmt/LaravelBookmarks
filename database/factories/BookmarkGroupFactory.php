<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BookmarkGroup;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookmarkGroup>
 */
class BookmarkGroupFactory extends Factory
{
    protected $model = BookmarkGroup::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
