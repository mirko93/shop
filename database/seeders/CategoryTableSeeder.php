<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        // $now = Carbon::resetToStringFormat();

        // dd($now);

        Category::insert([
            ['name' => 'Laptop', 'slug' => 'laptop', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tv', 'slug' => 'tv', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Game', 'slug' => 'game', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
