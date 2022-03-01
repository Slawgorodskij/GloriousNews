<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $generator)
    {
        for ($i = 1; $i <= 36; $i++) {
            DB::table('news')->insert([
                'category_id' => rand(1, 6),
                'title' => 'News №' . $i,
                'description' => $generator->text(50),
                'news_body' => $generator->text(),
                'source' => $generator->url(),
                'publish_date' => $generator->dateTime(),
            ]);
        }
    }
}
