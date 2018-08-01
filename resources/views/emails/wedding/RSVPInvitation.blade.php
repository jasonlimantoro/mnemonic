@component('mail::message')

<p>Hello {{ $rsvp->name }}, </p>
<p>We would like to invite you to our wedding celebration</p>

# {{ $groom->name }}
and
# {{ $bride->name }}

<h3>Your RSVP details:</h3>

@component('mail::table')
  | Holy Matrimony        | Wedding Reception                         |
  |:--------------------- |:----------------------------------------- |
  |                       | {{ $event->present()->prettyDatetime() }} |
  |                       | {!! strip_tags($event->location, "<p>") !!}|
@endcomponent

@component('mail::table')
| Information           | Data                          |
|:--------------------- |:------------------------------|
| Table                 | {{ $rsvp->table_name }}       |
| Total Invitation      | {{ $rsvp->total_invitation }} |
| Status                | {{ $rsvp->status }}           |
@endcomponent

@component('mail::button', ['url' => $url ])
	Confirm RSVP
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
