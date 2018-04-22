@component('mail::message')
# Good Day!

Dear {{ $rsvp->name }}, <br>
You are invited to the wedding of <br>
<h1>{{ $groom->name }}</h1>
and
<h1>{{ $bride->name }}</h1>

<h3>Your RSVP information</h3>
@component('mail::panel', ['url' => ''])
	Table: {{ $rsvp->table_name }}	<br>
	Total Invitation(s): {{ $rsvp->total_invitation }}
@endcomponent

@component('mail::button', ['url' => $url ])
	Confirm RSVP
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
