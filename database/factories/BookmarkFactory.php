<?php

namespace Database\Factories;

use App\Models\BookmarkGroup;
use Dotenv\Util\Regex;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bookmark;
class BookmarkFactory extends Factory
{
    protected $model = Bookmark::class;
    // protected $bookmark = Bookmark::factory()->make();
    public function definition(): array
    {
        return [
            'color' => fake()->safeColorName(),
            'link' => fake()->url(),
            'bookmark_group' => BookmarkGroup::factory(),
        ];
    }


    public function veirfyURL(string $url)
    {
        $ifMatches = Regex::matches('https://*', $url);
        return $ifMatches;
    }
}
