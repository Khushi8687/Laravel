<?php

namespace Database\Seeders;

use App\Models\EmployeeDetail;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);

        EmployeeDetail::factory(20)->create();
    }
}