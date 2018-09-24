<?php

namespace App\Listeners;

use App\Models\Post;
use App\Events\ModeChanged;
use App\Repositories\Posts;

class GeneratePosts
{

    public $posts;

    /**
     * Create the event listener.
     *
     * @param Posts $posts
     */
    public function __construct(Posts $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Handle the event.
     *
     * @param  ModeChanged $event
     * @return void
     * @throws \Exception
     */
    public function handle(ModeChanged $event)
    {
        $posts = $this->posts->about()->get();
        foreach ($posts as $post){
            $post->deleteRecord();
        }

        Post::create([
            'user_id' => auth()->user()->id,
            'page_id' => 2,
            'title' => 'Victor Immanuel Rumende, S. Kom',
            'description' => '<p>Surabaya, 21 Juni 1990</p> <p>SMPK Angelus Custos, Surabaya</p> <p>SMAK Frateran Surabaya</p> <p>Multimedia, Universitas Surabaya</p>',
        ]);

         if ($event->mode === 'wedding') {
            Post::create([
                'user_id' => auth()->user()->id,
                'page_id' => 2,
                'title' => 'Lenny Kurniawati Ligadjaja, S. E',
                'description' => '<p>Surabaya, 03 Maret 1992</p> <p>SMPK St. Agnes, Surabaya.</p> <p>SMAK St. Agnes, Surabaya.</p> <p>Pariwisata, Universitas Kristen Petra.</p>'
            ]);
        }
    }
}
