@component('mail::message')
# Good Day!

Dear {{ $rsvp->name }}, <br>
You are invited to the wedding ceremony!

<h3>Your RSVP information</h3>
@component('mail::panel', ['url' => ''])
	Table: {{ $rsvp->table_name }}	<br>
	Number of Invitation: {{ $rsvp->total_invitation }}
@endcomponent

@component('mail::button', ['url' => url('/')])
	Confirm RSVP
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
