<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            ['comment' => 'Comment 1', 'user_id' => 1],
            ['comment' => 'Comment 2', 'user_id' => 1],
            ['comment' => 'Comment 3', 'user_id' => 2]
        ]);
    }
}
