<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                [
                    'user_id' => 1,
                    'page_id' => 2,
                    'title' => 'Victor Immanuel Rumende, S. Kom',
                    'description' => 'Surabaya, 21 Juni 1990',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'user_id' => 2,
                    'page_id' => 2,
                    'title' => 'Lenny Kurniawati Ligadjaja, S. E',
                    'description' => 'Surabaya, 03 Maret 1992',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]
            ]
        );
        $posts = factory(Post::class, 20)->create();
    }
}
