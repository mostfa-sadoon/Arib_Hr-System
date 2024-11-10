<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Department};

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            Department::create(
                [
                    'ar' => [
                        'name'    => 'التطوير',
                    ],
                    'en' => [
                        'name'    => 'development',
                    ],

                ]
            );

            Department::create(
                [
                    'ar' => [
                        'name'    => 'المبيعات',
                    ],
                    'en' => [
                        'name'    => 'salles',
                    ],

                ]
            );


            Department::create(
                [
                    'ar' => [
                        'name'    => 'العمليات',
                    ],
                    'en' => [
                        'name'    => 'opreations',
                    ],

                ]
            );
    }
}
