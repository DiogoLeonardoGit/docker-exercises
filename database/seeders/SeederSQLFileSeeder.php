<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SeederSQLFileSeeder extends Seeder
{
    public function run()
    {
        // Path to your SQL file inside the container
        $sqlFilePath = database_path('seeds/seeder.sql');

        // Read the SQL file contents
        $sql = File::get($sqlFilePath);

        // Execute the raw SQL
        DB::unprepared($sql);
    }
}
