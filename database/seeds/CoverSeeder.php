<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Seed cover table with picture names
 */
class CoverSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table('cover')->delete();
		DB::table('cover')->insert(
            [
                ['file_name' => 'Audi_R8_city.jpg'],
                ['file_name' => 'Black_BMW_E46.jpg'],
                ['file_name' => 'bmw-m5-car.jpg'],
                ['file_name' => 'car-rims.jpg'],
                ['file_name' => 'dodge2.jpg'],
                ['file_name' => 'Dodge-Viper-SRT_desert.jpg'],
                ['file_name' => 'drift1.jpg'],
                ['file_name' => 'lamborghini_aventador2.jpg'],
                ['file_name' => 'mercedes-slr.jpg'],
                ['file_name' => 'nissanZ.jpg'],
                ['file_name' => 'scirocco-front.jpg'],
                ['file_name' => 'Subaru_en2.jpg'],
                ['file_name' => 'subaru_impreza2.jpg'],
                ['file_name' => 'subaru_impreza_wrx1.jpg'],
                ['file_name' => 'wall24.jpg']
            ]
        );
	}
}
