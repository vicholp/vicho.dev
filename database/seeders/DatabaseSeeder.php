<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Tag;
use App\Models\TagGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('make:user', [
            '--admin' => true,
            '--default' => true,
        ]);

        Product::factory()
            ->count(50)
            ->hasVariations(5)
            ->create();

        TagGroup::get()->each(function (TagGroup $group) {
            Tag::factory()->for($group)->count(5)->create()->each(function (Tag $tag) {
                $tag->products()->attach(Product::inRandomOrder()->take(5)->pluck('id'));
            });
        });

        for ($i = 0; $i < 10; ++$i) {
            $this->call([
                OrderSeeder::class,
            ]);
        }
    }
}
