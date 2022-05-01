<?php

namespace Database\Seeders;

use App\Models\ConferenceConfig;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::query()->create(['username' => 'admin', 'password' => bcrypt('admin')]);
        ConferenceConfig::query()->create(['name' => 'conference name', 'deadline' => Carbon::now()->toDate()]);
    }
}
