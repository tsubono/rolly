<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('admins')->insert([
                [
                    'name' => 'admin',
                    'email' => 'rolly-rental@daishin.jp.net',
                    'password' => \Hash::make('D3rwRXPC'),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            ]

        );
    }
}
