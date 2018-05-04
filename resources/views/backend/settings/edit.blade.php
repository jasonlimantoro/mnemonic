@extends('layouts.submaster')

@section('content')
  @component('layouts.panel', ['title' => 'Settings'])
    @slot('body')
			{{ Form::open(['route' => 'settings.update', 'method' => 'PATCH']) }}
				{{-- admin_email field --}}
				<div class="form-group">
					{{ Form::label('admin_email', 'Admin Email:') }}
					{{ Form::text('admin_email', $settings->admin_email, ['class' => 'form-control', 'placeholder' => 'Enter Admin Email']) }}
				</div>

				{{-- site_title field --}}
				<div class="form-group">
					{{ Form::label('site_title', 'Site Title:') }}
					{{ Form::text('site_title', $settings->site_title, ['class' => 'form-control', 'placeholder' => 'Enter Site Title']) }}
				</div>
				
				{{-- site_description field --}}
				<div class="form-group">
					{{ Form::label('site_description', 'Description:') }}
					{{ Form::textarea('site_description', $settings->site_description, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
				</div>

				{{-- contact_email field --}}
				<div class="form-group">
					{{ Form::label('contact_email', 'Email:') }}
					{{ Form::textarea('contact_email', $settings->contact->email, ['class' => 'form-control', 'placeholder' => 'Enter Emails (one email per row)']) }}
				</div>

				{{-- contact_phone field --}}
				<div class="form-group">
					{{ Form::label('contact_phone', 'Phone Number:') }}
					{{ Form::textarea('contact_phone', $settings->contact->phone, ['class' => 'form-control', 'placeholder' => 'Enter Phone Number']) }}
				</div>

				{{-- contact_mobile field --}}
				<div class="form-group">
					{{ Form::label('contact_mobile', 'Mobil Phone:') }}
					{{ Form::textarea('contact_mobile', $settings->contact->mobile, ['class' => 'form-control', 'placeholder' => 'Enter Mobile Phone']) }}
				</div>

				{{-- contact_address field --}}
				<div class="form-group">
					{{ Form::label('contact_address', 'Address:') }}
					{{ Form::text('contact_address', $settings->contact->address, ['class' => 'form-control', 'placeholder' => 'Enter address']) }}
				</div>

				{{-- contact_region field --}}
				<div class="form-group">
					{{ Form::label('contact_region', 'Region:') }}
					{{ Form::text('contact_region', $settings->contact->region, ['class' => 'form-control', 'placeholder' => 'Enter Region']) }}
				</div>


				{{-- contact_city field --}}
				<div class="form-group">
					{{ Form::label('contact_city', 'City:') }}
					{{ Form::text('contact_city', $settings->contact->city, ['class' => 'form-control', 'placeholder' => 'Enter City']) }}
				</div>


				{{-- contact_country field --}}
				<div class="form-group">
					{{ Form::label('contact_country', 'Country:') }}
					{{ Form::text('contact_country', $settings->contact->country, ['class' => 'form-control', 'placeholder' => 'Enter Country']) }}
				</div>

				{{-- contact_zip_code field --}}
				<div class="form-group">
					{{ Form::label('contact_zip_code', 'Zip Code:') }}
					{{ Form::text('contact_zip_code', $settings->contact->zip_code, ['class' => 'form-control', 'placeholder' => 'Enter Zip Code']) }}
				</div>

				{{-- Submit Button --}}
				<div class="form-group">
					{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
				</div>

			{{ Form::close() }}
	
    @endslot
    
	@endcomponent

@endsection
