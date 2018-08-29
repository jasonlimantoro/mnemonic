<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Image;
use App\Filters\EventFilter;
use App\Http\Requests\EventsRequest;
use App\Http\Controllers\GenericController as Controller;

class EventsController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:read,App\Models\Event');
		$this->middleware('can:create,App\Models\Event')->only(['create', 'store']);
		$this->middleware('can:update,App\Models\Event')->only(['edit', 'update']);
		$this->middleware('can:delete,App\Models\Event')->only('destroy');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::filtersSearch(request(['search', 'order', 'method']))
                        ->latest()
                        ->get();
        return view('backend.day.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.day.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventsRequest $request)
    {
        $file = $request->gallery_image;

        $event = Event::create(
            $request->only(['name', 'description', 'location', 'datetime'])
		);

        $event->addImage($file);

        $this->flash('Event is successfully created!');

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('backend.day.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $eventImage = optional($event->image())->urlCache("event");

        return view('backend.day.events.edit', compact('event', 'eventImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventsRequest $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventsRequest $request, Event $event)
    {

        $file = $request->gallery_image;

        $image = Image::whereName($file)->first();

        tap($event)
            ->update(
			    $request->only(['name', 'description', 'location', 'datetime'])
            )
            ->images()->sync([$image->id]);

        $this->flash('Event is successfully updated!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->deleteRecord();

        $this->flash('Event is successfully deleted!');

        return back();
    }
}
