<?php

namespace Database\Seeders;

use App\Models\Commission;
use Illuminate\Database\Seeder;

class CommissionsTableSeeder extends Seeder
{
    public function run()
    {
        $commissions = [
            [
                'key' => 'free',
                'name' => 'Free',
                'type' => 'percentage',
                'value' => 0
            ],
            [
                'key' => '5_percent',
                'name' => '5% Commission',
                'type' => 'percentage',
                'value' => 5
            ],
            [
                'key' => '20_fixed',
                'name' => '20 Fixed',
                'type' => 'fixed',
                'value' => 20
            ],
        ];

        Commission::insert($commissions);
    }
}
