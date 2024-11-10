<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskStatus;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TaskStatus::create(
            [
                'ar' => [
                    'name'    => 'للقيام به',
                ],
                'en' => [
                    'name'    => 'To Do',
                ],
                'department_id'  => 1
            ]
        );

        TaskStatus::create(
            [
                'ar' => [
                    'name'    => 'قيد التنفيذ',
                ],
                'en' => [
                    'name'    => 'in progress',
                ],
                'department_id'  => 1
            ]
        );



        TaskStatus::create(
            [
                'ar' => [
                    'name'    => 'جاهز لاختبار',
                ],
                'en' => [
                    'name'    => 'ready for test',
                ],
                'department_id'  => 1
            ]
        );




        TaskStatus::create(
            [
                'ar' => [
                    'name'    => 'اعاده فتح',
                ],
                'en' => [
                    'name'    => 'reopen ',
                ],
                'department_id'  => 1
            ]
        );




        TaskStatus::create(
            [
                'ar' => [
                    'name'    => 'نشر',
                ],
                'en' => [
                    'name'    => 'deployment',
                ],
                'department_id'  => 1
            ]
        );


        TaskStatus::create(
            [
                'ar' => [
                    'name'    => 'التطوير',
                ],
                'en' => [
                    'name'    => 'development',
                ],
                'department_id'  => 1
            ]
        );


    }
}
