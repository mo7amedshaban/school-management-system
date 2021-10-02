<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'French', 'ar'=> 'فرنسى'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'Social Studies', 'ar'=> 'دراسات اجتماعيه'],
            ['en'=> 'أistory', 'ar'=> 'تاريخ'],
            ['en'=> 'chemistry', 'ar'=> 'كيمياء'],
            ['en'=> 'Biology', 'ar'=> 'احياء'],
            ['en'=> 'Algebra', 'ar'=> 'جبر'],
            ['en'=> 'Engineering', 'ar'=> 'هندسه'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
