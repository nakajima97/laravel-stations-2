<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'database/sql/insert-sheet.sql';
        \DB::unprepared(file_get_contents($path));
    }
}
