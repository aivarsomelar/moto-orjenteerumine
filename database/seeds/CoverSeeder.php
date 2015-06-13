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

		DB::table('pictures')->delete();
		DB::table('pictures')->insert(
            [
                [
                    'file_name' => 'Audi_R8_city.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'Black_BMW_E46.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'bmw-m5-car.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'car-rims.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'dodge2.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'Dodge-Viper-SRT_desert.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'drift1.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'lamborghini_aventador2.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'mercedes-slr.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'nissanZ.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'scirocco-front.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'Subaru_en2.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'subaru_impreza2.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'subaru_impreza_wrx1.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'wall24.jpg',
                    'level' => 'cover',
                    'reusable' => 1
                ]
            ]
        );
	}
}
