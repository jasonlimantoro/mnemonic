<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GenericController as Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Image;

class EventsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$events = Event::all();
		return view('backend.wedding.events.index', compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('backend.wedding.events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = [
			'name' => 'required',
			'datetime' => 'required|date|after:today'
		];

		$this->validate($request, $rules);
		$event = Event::create(
			request(['name', 'description', 'location', 'datetime'])
		);
		if ($eventImage = Image::handleUpload($request)) {
			$eventImage->addTo($event);
		}

		$this->flash('success_msg', 'Event is successfully created!');

		return back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function show(Event $event)
	{
		return view('backend.wedding.events.show', compact('event'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Event $event)
	{
		$eventImage = $event->image ? $event->image->url_cache : null;
		return view('backend.wedding.events.edit', compact('event', 'eventImage'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Event $event)
	{
		$rules = [
			'name' => 'required',
			'datetime' => 'required|date|after:today'
		];
		$this->validate($request, $rules);

		if ($eventImage = Image::handleUpload($request)) {
			$eventImage->addTo($event);
		}
		$event->update(
			request(['name', 'description', 'location', 'datetime'])
		);

		$this->flash('success_msg', 'Event is successfully updated!');

		return back();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Event $event)
	{
		$event->image()->delete();
		$event->delete();
		$this->flash('success_msg', 'Event is successfully deleted!');
		return back();
	}
}
