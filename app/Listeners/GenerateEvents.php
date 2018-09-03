<?php

namespace App\Listeners;

use App\Models\Event;
use Carbon\Carbon;
use App\Events\ModeChanged;

class GenerateEvents
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ModeChanged  $event
     * @return void
     */
    public function handle(ModeChanged $event)
    {
		Event::truncate();
        if ($event->mode === 'birthday') {
			Event::create([
			    'name' => 'Birthday',
				'description' => '<p>My Sweet 17<sup>th</sup> Birthday</p>',
				'location' => '<h1>Ciputra Hall</h1>
				<p><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5333354647355!2d112.64923681484791!3d-7.293813473719349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fdb8e8945a79%3A0x51e8391b9e46d18f!2sCiputra+Hall!5e0!3m2!1sen!2ssg!4v1532399155696" width="600" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>',
                'datetime' => Carbon::now()->subMonth(),
			]);
		} else {
			Event::create([
			    'name' => 'Wedding',
				'description' => '<p>"Wherefore they are no more twain, but one flesh.</p>
				<p>What therefore God hath joined together, let no man put asunder"</p>
				<p>Matthew 19:6</p>',

				'location' => '<h2>Hotel Harris Gubeng, Surabaya.</h2>
				<h3>Jl. Bangka No. 08-18, Gubeng, Surabaya.</h3>
				<p></p>
				<p><iframe style="border: 0px initial initial;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7915.442131025527!2d112.74935700000002!3d-7.272548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x960b5d759b88e7b4!2sHARRIS+Hotel+%26+Conventions+Gubeng+-+Surabaya!5e0!3m2!1sen!2sid!4v1493141186058" width="800" height="600" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>',
				
				'datetime' => Carbon::now()->subMonth(),
			]);

			Event::create([
			    'name' => 'Holy Matrimony',
				'description' => '<p>"Wherefore they are no more twain, but one flesh.</p>
				<p>What therefore God hath joined together, let no man put asunder"</p>
				<p>Matthew 19:6</p>',

				'location' => '<h2>Gereja Bethany Nginden, Surabaya</h2>
				<h3>Jl. Nginden Intan Timur I / 29</h3>
				<p><iframe style="border: 0px initial initial;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.4214299242194!2d112.77170299570933!3d-7.3064604992101945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7faf85d4c8dc5%3A0xc8357d3435240462!2sGraha+Bethany+Nginden!5e0!3m2!1sen!2sid!4v1493280801903" width="600" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>',

                'datetime' => Carbon::now()->subMonths(2),
			]);
		}
    }
}
