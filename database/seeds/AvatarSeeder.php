<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Seed cover table with picture names
 */
class AvatarSeeder extends Seeder {

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
                    'file_name' => 'a01.png',
                    'level' => 'avatar',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'A7Dy18f.png',
                    'level' => 'avatar',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'd05.png',
                    'level' => 'avatar',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'fh04.png',
                    'level' => 'avatar',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'g04.png',
                    'level' => 'avatar',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'mrc2.png',
                    'level' => 'avatar',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'peng42.png',
                    'level' => 'avatar',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'tbn42.jpg',
                    'level' => 'avatar',
                    'reusable' => 1
                ]
            ]
        );
	}
}
