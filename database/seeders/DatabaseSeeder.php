<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->user();

        $this->engines();

    }
    
    public function user() {

        return \App\Models\User::create([
            'name' => "Max",
            'email' => "maxattianesekr94@gmail.com",
            'password' => \Illuminate\Support\Facades\Hash::make("Hunters2023"),
        ]);
    }

    public function engines() {

        \App\Models\Engine::create(['name' => "Benzina"]);
        \App\Models\Engine::create(['name' => "Diesel"]);
        \App\Models\Engine::create(['name' => "Elettrico"]);
        \App\Models\Engine::create(['name' => "Gpl"]);

    }

}
