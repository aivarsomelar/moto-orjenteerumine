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

		DB::table('avatar')->delete();
		DB::table('avatar')->insert(
            [
                [
                    'file_name' => 'a01.png',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'A7Dy18f.png',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'd05.png',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'fh04.png',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'g04.png',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'mrc2.png',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'peng42.png',
                    'reusable' => 1
                ],
                [
                    'file_name' => 'tbn42.jpg',
                    'reusable' => 1
                ]
            ]
        );
	}
}
