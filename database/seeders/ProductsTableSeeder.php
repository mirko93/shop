<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // laptops
        for ($i = 1; $i < 5; $i++) {
            Product::create([
                'name' => 'Laptop ' .$i,
                'slug' => 'laptop-' . $i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32GB ram',
                'price' => rand(999, 1999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        // tv-s
        for ($i = 1; $i < 10; $i++) {
            Product::create([
                'name' => 'tv ' .$i,
                'slug' => 'tv-' . $i,
                'details' => [27, 32, 45][array_rand([27, 32, 45])] . ' inch.',
                'price' => rand(199, 499),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            ])->categories()->attach(2);
        }

        // games
        for ($i = 1; $i < 15; $i++) {
            Product::create([
                'name' => 'game ' .$i,
                'slug' => 'game-' . $i,
                'details' => ['PC', 'XBOX', 'PS4'][array_rand(['PC', 'XBOX', 'PS4'])] . ' games.',
                'price' => rand(9, 299),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            ])->categories()->attach(3);
        }
    }
}
