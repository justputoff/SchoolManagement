<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    public function run()
    {

        $classRooms = [
            [
                'name' => 'Class Room 1',
            ],
            [
                'name' => 'Class Room 2',
            ],
            [
                'name' => 'Class Room 3',
            ],
            [
                'name' => 'Class Room 4',
            ],
            [
                'name' => 'Class Room 5',
            ],
        ];

        foreach ($classRooms as $classRoom) {
            ClassRoom::create($classRoom);
        }
    }
}
