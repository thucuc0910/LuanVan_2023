<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizeRecords = [
            [
                'id' => 1,
                'name' => 'Size 36',
                'code' => '36',
                'status' => '1',
                
            ],
            [
                'id' => 2,
                'name' => 'Size 37',
                'code' => '37',
                'status' => '1',
                
            ],
            [
                'id' => 3,
                'name' => 'Size 38',
                'code' => '38',
                'status' => '1',
                
            ],
            [
                'id' => 4,
                'name' => 'Size 39',
                'code' => '39',
                'status' => '1',
                
            ],
            [
                'id' => 5,
                'name' => 'Size 40',
                'code' => '40',
                'status' => '1',
                
            ],
            [
                'id' => 6,
                'name' => 'Size 41',
                'code' => '41',
                'status' => '1',
                
            ],
            [
                'id' => 7,
                'name' => 'Size 42',
                'code' => '42',
                'status' => '1',
                
            ],
            [
                'id' => 8,
                'name' => 'Size 43',
                'code' => '43',
                'status' => '1',
                
            ]
        ];

        Size::insert($sizeRecords);
    }
}
