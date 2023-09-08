<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couponRecords = [
            [
                'id' => 1,
                'coupon_code' => 'test10',
                'coupon_name' => 'Quốc Khánh',
                'coupon_type' => 'Percentage',
                'amount' => 10,
                'start_date' => '2023-08-31',
                'end_date' => '2023-09-10',
                'status' => 1
            ],
            [
                'id' => 2,
                'coupon_code' => 'test20',
                'coupon_name' => 'Quốc Khánh',
                'coupon_type' => 'Percentage',
                'amount' => 20,
                'start_date' => '2023-08-31',
                'end_date' => '2023-09-10',
                'status' => 1
            ]
        ];

        Coupon::insert($couponRecords);
    }
}
