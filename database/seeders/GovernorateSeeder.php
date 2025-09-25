<?php

namespace Database\Seeders;

use App\Modules\UserManagement\Models\Governorate;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            ['name' => 'القاهرة', 'code' => '01', 'is_active' => true],
            ['name' => 'الجيزة', 'code' => '02', 'is_active' => true],
            ['name' => 'الإسكندرية', 'code' => '03', 'is_active' => true],
            ['name' => 'الدقهلية', 'code' => '04', 'is_active' => true],
            ['name' => 'البحر الأحمر', 'code' => '05', 'is_active' => true],
            ['name' => 'البحيرة', 'code' => '06', 'is_active' => true],
            ['name' => 'الفيوم', 'code' => '07', 'is_active' => true],
            ['name' => 'الغربية', 'code' => '08', 'is_active' => true],
            ['name' => 'الإسماعيلية', 'code' => '09', 'is_active' => true],
            ['name' => 'المنوفية', 'code' => '10', 'is_active' => true],
            ['name' => 'المنيا', 'code' => '11', 'is_active' => true],
            ['name' => 'القليوبية', 'code' => '12', 'is_active' => true],
            ['name' => 'الوادي الجديد', 'code' => '13', 'is_active' => true],
            ['name' => 'سوهاج', 'code' => '14', 'is_active' => true],
            ['name' => 'أسيوط', 'code' => '15', 'is_active' => true],
            ['name' => 'بني سويف', 'code' => '16', 'is_active' => true],
            ['name' => 'بورسعيد', 'code' => '17', 'is_active' => true],
            ['name' => 'دمياط', 'code' => '18', 'is_active' => true],
            ['name' => 'جنوب سيناء', 'code' => '19', 'is_active' => true],
            ['name' => 'كفر الشيخ', 'code' => '20', 'is_active' => true],
            ['name' => 'مطروح', 'code' => '21', 'is_active' => true],
            ['name' => 'الأقصر', 'code' => '22', 'is_active' => true],
            ['name' => 'أسوان', 'code' => '23', 'is_active' => true],
            ['name' => 'شمال سيناء', 'code' => '24', 'is_active' => true],
            ['name' => 'سويس', 'code' => '25', 'is_active' => true],
            ['name' => 'جنوب سيناء الجديدة', 'code' => '26', 'is_active' => true],
            ['name' => 'الفيوم الجديدة', 'code' => '27', 'is_active' => true],
        ];

        foreach ($governorates as $gov) {
            Governorate::updateOrCreate(
                ['code' => $gov['code']],
                $gov
            );
        }
    }
}
