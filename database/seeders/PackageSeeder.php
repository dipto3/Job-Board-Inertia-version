<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'name' => 'Free',
            'limit' => 3,
            'price' => 0,
        ]);

        Package::create([
            'name' => 'Premium',
            'limit' => 'Unlimited',
            'price' => 500,
        ]);
    }
}
