<?php

namespace Database\Seeders;

use App\Models\Member;

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
        public function run(): void
        {
            Member::query()->insert([
                [
                    'name' => 'Elias Nasir',
                    'email' => 'elias.nasir@outlook.de',
                    'membership_date' => now()->subYears(2),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Kyberna Gmbh',
                    'email' => 'test@kyberna.de',
                    'membership_date' => now()->subYears(1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);

        }
}
