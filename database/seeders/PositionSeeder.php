<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'Marketing Staff',
                'is_medical' => false,
                'employment_status' => 'TKWT',
                'directorate' => 'Direktorat Marketing',
                'vacancy_count' => 2,
                'progress' => 5
            ],
            [
                'title' => 'Brand Strategist',
                'is_medical' => false,
                'employment_status' => 'TKWT',
                'directorate' => 'Direktorat Marketing',
                'vacancy_count' => 2,
                'progress' => 4
            ],
            [
                'title' => 'Digital Marketing Lead',
                'is_medical' => false,
                'employment_status' => 'Karyawan Tetap',
                'directorate' => 'Direktorat Marketing',
                'vacancy_count' => 2,
                'progress' => 3
            ],
            [
                'title' => 'Social Media Manager',
                'is_medical' => false,
                'employment_status' => 'KDMP',
                'directorate' => 'Direktorat Marketing',
                'vacancy_count' => 2,
                'progress' => 4
            ],
            [
                'title' => 'Medical Staff',
                'is_medical' => true,
                'employment_status' => 'Karyawan Tetap',
                'directorate' => 'Direktorat Marketing',
                'vacancy_count' => 2,
                'progress' => 5
            ],
        ];

        foreach ($data as $item) {
            Position::create($item);
        }
    }
}
