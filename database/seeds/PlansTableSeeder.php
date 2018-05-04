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
                    'name' => 'Platinum',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Gold',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Silver',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Bronze',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Limited',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            ]
        );
    }
}
