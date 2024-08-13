<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithoutEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
            'email' => 'jonh@gmail.com'
         ]);

         $options = Option::factory(10)->create();
         Property::factory(50)
            ->hasAttached($options->random(3))
            ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
