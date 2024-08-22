<?php

namespace Database\Seeders;

use App\Models\License;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $licenses =[
                'B',
                'A1',
                'A2'
            ];

            foreach ($licenses as $license) {
                License::create([
                    'name' => $license,
                ]);
            }


        }
    }
}
