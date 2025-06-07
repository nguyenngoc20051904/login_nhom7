<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeachersSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Danh sách họ, tên đệm, tên phổ biến ở Việt Nam
        $lastNames = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Huỳnh', 'Phan', 'Vũ', 'Võ', 'Đặng'];
        $middleNames = ['Văn', 'Thị', 'Hữu', 'Đức', 'Ngọc', 'Gia', 'Minh', 'Xuân'];
        $firstNames = ['An', 'Bình', 'Chi', 'Dũng', 'Hà', 'Hạnh', 'Hùng', 'Khoa', 'Lan', 'Linh', 'Nam', 'Nga', 'Phúc', 'Quân', 'Thảo', 'Trang', 'Tuấn', 'Vy'];

        for ($i = 0; $i < 10; $i++) {
            $fullName = $faker->randomElement($lastNames) . ' ' .
                        $faker->randomElement($middleNames) . ' ' .
                        $faker->randomElement($firstNames);

            DB::table('teachers')->insert([
                'name' => $fullName,
                'address' => $faker->address,
                'mobile' => '0' . $faker->numerify('9########'),
            ]);
        }
    }
}
