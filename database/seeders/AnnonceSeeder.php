<?php

namespace Database\Seeders;

use App\Models\Annonce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Annonce::create([
            'title' => 'Sample Annonce 1',
            'description' => 'Description of sample annonce 1',
            'image' => 'sample1.jpg',
            'price' => '100',
            'user_id' => 3,
            'category_id' => 1, 
            'accepted_at' => now(),
        ]);

        Annonce::create([
            'title' => 'Sample Annonce 2',
            'description' => 'Description of sample annonce 2',
            'image' => 'sample2.jpg',
            'price' => '150',
            'user_id' => 3, 
            'category_id' => 2, 
            'accepted_at' => now(),
        ]);

        Annonce::create([
            'title' => 'Sample Annonce 3',
            'description' => 'Description of sample annonce 3',
            'image' => 'sample2.jpg',
            'price' => '150',
            'user_id' => 4, 
            'category_id' => 3, 
            'accepted_at' => now(),
        ]);

        Annonce::create([
            'title' => 'Sample Annonce 4',
            'description' => 'Description of sample annonce 4',
            'image' => 'sample2.jpg',
            'price' => '150',
            'user_id' => 4, 
            'category_id' => 4, 
            'accepted_at' => now(),
        ]);

    }
}
