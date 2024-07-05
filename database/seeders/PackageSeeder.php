<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\PackagePrice;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Calistung',
                'type' => 'Reguler',
                'level' => 'Calistung',
                'description' => 'Membaca - Menulis - Berhitung Untuk Usia 3 - 7 Tahun',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'Calistung',
                'type' => 'Private',
                'level' => 'Calistung',
                'description' => 'Membaca - Menulis - Berhitung Untuk Usia 3 - 7 Tahun',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 550000],
                    ['duration' => '1 bulan', 'price' => 650000],
                ],
            ],
            [
                'name' => 'Calistung',
                'type' => 'Home Service',
                'level' => 'Calistung',
                'description' => 'Membaca - Menulis - Berhitung Untuk Usia 3 - 7 Tahun',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 650000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'Bimbel SD',
                'type' => 'Reguler',
                'level' => 'Bimbel SD',
                'description' => 'Semua mata pelajaran Kelas 1 - 6 Sekolah Dasar',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 660000],
                ],
            ],
            [
                'name' => 'Bimbel SD',
                'type' => 'Private',
                'level' => 'Bimbel SD',
                'description' => 'Semua mata pelajaran Kelas 1 - 6 Sekolah Dasar',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 660000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'Bimbel SD',
                'type' => 'Home Service',
                'level' => 'Bimbel SD',
                'description' => 'Semua mata pelajaran Kelas 1 - 6 Sekolah Dasar',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 780000],
                    ['duration' => '1 bulan', 'price' => 900000],
                ],
            ],
            [
                'name' => 'Bimbel SMP',
                'type' => 'Reguler',
                'level' => 'Bimbel SMP',
                'description' => 'Matematika - IPA - B.Inggris Kelas 1 - 3 SMP',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 660000],
                ],
            ],
            [
                'name' => 'Bimbel SMP',
                'type' => 'Private',
                'level' => 'Bimbel SMP',
                'description' => 'Matematika - IPA - B.Inggris Kelas 1 - 3 SMP',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 660000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'Bimbel SMP',
                'type' => 'Home Service',
                'level' => 'Bimbel SMP',
                'description' => 'Matematika - IPA - B.Inggris Kelas 1 - 3 SMP',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 780000],
                    ['duration' => '1 bulan', 'price' => 900000],
                ],
            ],
            [
                'name' => 'Bimbel SMA',
                'type' => 'Reguler',
                'level' => 'Bimbel SMA',
                'description' => 'Matematika, Fisika, Kimia, B.Inggris Kelas 1 - 3 SMA',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 660000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'Bimbel SMA',
                'type' => 'Private',
                'level' => 'Bimbel SMA',
                'description' => 'Matematika, Fisika, Kimia, B.Inggris Kelas 1 - 3 SMA',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 780000],
                    ['duration' => '1 bulan', 'price' => 900000],
                ],
            ],
            [
                'name' => 'Bimbel SMA',
                'type' => 'Home Service',
                'level' => 'Bimbel SMA',
                'description' => 'Matematika, Fisika, Kimia, B.Inggris Kelas 1 - 3 SMA',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 900000],
                    ['duration' => '1 bulan', 'price' => 1000000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Reguler',
                'level' => 'Basic',
                'description' => 'English For Pre Kids - Basic',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Private',
                'level' => 'Basic',
                'description' => 'English For Pre Kids - Basic',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 550000],
                    ['duration' => '1 bulan', 'price' => 650000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Home Service',
                'level' => 'Basic',
                'description' => 'English For Pre Kids - Basic',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 650000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Reguler',
                'level' => 'Intermediate',
                'description' => 'English For Pre Kids - Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Private',
                'level' => 'Intermediate',
                'description' => 'English For Pre Kids - Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 550000],
                    ['duration' => '1 bulan', 'price' => 650000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Home Service',
                'level' => 'Intermediate',
                'description' => 'English For Pre Kids - Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 650000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Reguler',
                'level' => 'Upper Intermediate',
                'description' => 'English For Pre Kids - Upper Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Private',
                'level' => 'Upper Intermediate',
                'description' => 'English For Pre Kids - Upper Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 550000],
                    ['duration' => '1 bulan', 'price' => 650000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Home Service',
                'level' => 'Upper Intermediate',
                'description' => 'English For Pre Kids - Upper Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 650000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Reguler',
                'level' => 'Advance',
                'description' => 'English For Pre Kids - Advance',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Private',
                'level' => 'Advance',
                'description' => 'English For Pre Kids - Advance',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 550000],
                    ['duration' => '1 bulan', 'price' => 650000],
                ],
            ],
            [
                'name' => 'English For Pre Kids',
                'type' => 'Home Service',
                'level' => 'Advance',
                'description' => 'English For Pre Kids - Advance',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 650000],
                    ['duration' => '1 bulan', 'price' => 780000],
                ],
            ],
            [
                'name' => 'English For Kids',
                'type' => 'Reguler',
                'level' => 'Basic',
                'description' => 'English For Kids - Basic',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Kids',
                'type' => 'Reguler',
                'level' => 'Intermediate',
                'description' => 'English For Kids - Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Kids',
                'type' => 'Reguler',
                'level' => 'Upper Intermediate',
                'description' => 'English For Kids - Upper Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Kids',
                'type' => 'Reguler',
                'level' => 'Advance',
                'description' => 'English For Kids - Advance',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Teens',
                'type' => 'Reguler',
                'level' => 'Basic',
                'description' => 'English For Teens - Basic',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Teens',
                'type' => 'Reguler',
                'level' => 'Intermediate',
                'description' => 'English For Teens - Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Teens',
                'type' => 'Reguler',
                'level' => 'Upper Intermediate',
                'description' => 'English For Teens - Upper Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For Teens',
                'type' => 'Reguler',
                'level' => 'Advance',
                'description' => 'English For Teens - Advance',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For General',
                'type' => 'Reguler',
                'level' => 'Basic',
                'description' => 'English For General - Basic',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
            [
                'name' => 'English For General',
                'type' => 'Reguler',
                'level' => 'Intermediate',
                'description' => 'English For General - Intermediate',
                'prices' => [
                    ['duration' => '3 bulan', 'price' => 540000],
                    ['duration' => '1 bulan', 'price' => 550000],
                ],
            ],
        ];

        foreach ($packages as $packageData) {
            $package = Package::create([
                'name' => $packageData['name'],
                'type' => $packageData['type'],
                'level' => $packageData['level'],
                'description' => $packageData['description'],
            ]);

            foreach ($packageData['prices'] as $priceData) {
                PackagePrice::create([
                    'package_id' => $package->id,
                    'duration' => $priceData['duration'],
                    'price' => $priceData['price'],
                ]);
            }
        }
    }
}
