<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $features = [
            [
                'key' => 'enable_tax',
                'description' => 'Controls if customer should be charged for tax',
                'value' => 'true'
            ],
            [
                'key' => 'tax_percentage',
                'description' => 'The percentage that will be added to the booking total amount as a tax',
                'value' => '5'
            ],
            [
                'key' => 'enable_commission',
                'description' => 'Controls if admin should take commission from bookings',
                'value' => 'true'
            ],
            [
                'key' => 'enable_paypal_payments',
                'description' => 'Controls if customer can pay using PayPal',
                'value' => 'true'
            ]
        ];

        Setting::insert($features);
    }
}
