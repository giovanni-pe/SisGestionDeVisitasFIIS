<?php

namespace Database\Seeders;
use App\Models\Ministerio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MinisterioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Ministerio::factory()->count(20)->create();
    }
}
