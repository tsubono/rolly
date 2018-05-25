<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table("plans")->truncate();

        DB::table('plans')->insert([
                [
                    'name' => 'BRONZE',
                    'class' => 'bronze',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'SILVER',
                    'class' => 'silver',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'GOLD',
                    'class' => 'gold',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'PLATINUM',
                    'class' => 'platinum',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'LIMITED',
                    'class' => 'limited',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            ]
        );
    }
}
