<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\BookmarkGroup;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Stringable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $bg = BookmarkGroup::factory()->count(3)->create();

        $groups = DB::table('bookmark_groups')
            ->select('name')
            ->limit(3)
            ->pluck('name')
            ->toArray();
        $other = BookmarkGroup::all()->random(3)->toArray();
        var_dump($other);
        var_dump($groups);

        $first = $groups[0];
        $second = $groups[1];

        Bookmark::factory()
            ->count(9)

            ->sequence(
                ['bookmark_group' => $groups[0]],
                ['bookmark_group' => $groups[1]],
                ['bookmark_group' => $groups[2]],
            )

            ->create();
    }
}
