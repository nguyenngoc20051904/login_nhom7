<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'name' => 'Nguyễn Văn An',
                'address' => '12 Nguyễn Trãi, Hà Nội',
                'mobile' => '0912345678',
                'avatar' => 'avatars/avatar1.jpg',
            ],
            [
                'name' => 'Trần Thị Bình',
                'address' => '34 Lê Lợi, TP.HCM',
                'mobile' => '0987654321',
                'avatar' => 'avatars/avatar2.jpg',
            ],
            [
                'name' => 'Lê Hữu Dũng',
                'address' => '56 Trần Phú, Đà Nẵng',
                'mobile' => '0909123456',
                'avatar' => 'avatars/avatar3.jpg',
            ],
            [
                'name' => 'Phạm Ngọc Hà',
                'address' => '78 Lý Thường Kiệt, Huế',
                'mobile' => '0938123456',
                'avatar' => 'avatars/avatar4.jpg',
            ],
            [
                'name' => 'Hoàng Gia Linh',
                'address' => '90 Nguyễn Huệ, Cần Thơ',
                'mobile' => '0967123456',
                'avatar' => 'avatars/avatar5.jpg',
            ],
            [
                'name' => 'Huỳnh Minh Khoa',
                'address' => '23 Bạch Đằng, Hải Phòng',
                'mobile' => '0971123456',
                'avatar' => 'avatars/avatar6.jpg',
            ],
            [
                'name' => 'Phan Thị Trang',
                'address' => '45 Hai Bà Trưng, Vũng Tàu',
                'mobile' => '0922123456',
                'avatar' => 'avatars/avatar7.jpg',
            ],
            [
                'name' => 'Vũ Hữu Quân',
                'address' => '67 Điện Biên Phủ, Buôn Ma Thuột',
                'mobile' => '0943123456',
                'avatar' => 'avatars/avatar8.jpg',
            ],
            [
                'name' => 'Võ Đức Phúc',
                'address' => '89 Phạm Văn Đồng, Nha Trang',
                'mobile' => '0935123456',
                'avatar' => 'avatars/avatar9.jpg',
            ],
            [
                'name' => 'Đặng Xuân Vy',
                'address' => '101 Cách Mạng Tháng 8, Bình Dương',
                'mobile' => '0916123456',
                'avatar' => 'avatars/avatar10.jpg',
            ],
        ];

        DB::table('students')->insert($students);
    }
}
