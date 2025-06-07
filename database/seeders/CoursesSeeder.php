<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            'Lập trình PHP cơ bản',
            'Lập trình Laravel nâng cao',
            'Cơ sở dữ liệu MySQL',
            'Thiết kế Web HTML/CSS',
            'JavaScript & DOM',
            'Node.js & Express',
            'ReactJS cơ bản',
            'Python cho người mới bắt đầu',
            'Kỹ năng mềm cho lập trình viên',
            'Kiểm thử phần mềm',
        ];

        foreach ($courses as $name) {
            DB::table('courses')->insert([
                'name' => $name,
                'syllabus' => rand(2, 3), // hoặc chỉ '2' nếu bạn muốn cố định
                'duration' => '3', // thời lượng ngẫu nhiên từ 4 đến 12 tuần
            ]);
        }
    }
}
