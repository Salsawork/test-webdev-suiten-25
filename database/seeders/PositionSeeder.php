<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            'Staff',
            'Supervisor',
            'Manager',
            'Admin',
            'HRD',
            'Finance',
        ];

        foreach ($positions as $pos) {
            Position::create([
                'name' => $pos
            ]);
        }
    }
}
