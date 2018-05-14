@extends('layouts.submaster')

@section('content')
  @component('layouts.panel', ['title' => 'Settings'])
    @slot('body')
			{{ Form::open(['route' => 'settings.update', 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) }}
				{{-- admin_email field --}}
				<div class="form-group">
					{{ Form::label('admin_email', 'Admin Email:') }}
					{{ Form::text('admin_email', $settings->{'admin-email'}, ['class' => 'form-control', 'placeholder' => 'Enter Admin Email']) }}
				</div>

				{{-- site_title field --}}
				<div class="form-group">
					{{ Form::label('site_title', 'Site Title:') }}
					{{ Form::text('site_title', $settings->title, ['class' => 'form-control', 'placeholder' => 'Enter Site Title']) }}
				</div>
				
				{{-- site_description field --}}
				<div class="form-group">
					{{ Form::label('site_description', 'Description:') }}
					{{ Form::textarea('site_description', $settings->description, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
				</div>

				{{-- contact_email field --}}
				<div class="form-group">
					{{ Form::label('contact_email', 'Email:') }}
					{{ Form::textarea('contact_email', optional($settings->contact)->email, ['class' => 'form-control', 'placeholder' => 'Enter Emails (one email per row)']) }}
				</div>

				{{-- contact_phone field --}}
				<div class="form-group">
					{{ Form::label('contact_phone', 'Phone Number:') }}
					{{ Form::textarea('contact_phone', optional($settings->contact)->phone, ['class' => 'form-control', 'placeholder' => 'Enter Phone Number']) }}
				</div>

				{{-- contact_mobile field --}}
				<div class="form-group">
					{{ Form::label('contact_mobile', 'Mobil Phone:') }}
					{{ Form::textarea('contact_mobile', optional($settings->contact)->mobile, ['class' => 'form-control', 'placeholder' => 'Enter Mobile Phone']) }}
				</div>

				{{-- contact_address field --}}
				<div class="form-group">
					{{ Form::label('contact_address', 'Address:') }}
					{{ Form::text('contact_address', optional($settings->contact)->address, ['class' => 'form-control', 'placeholder' => 'Enter address']) }}
				</div>

				{{-- contact_region field --}}
				<div class="form-group">
					{{ Form::label('contact_region', 'Region:') }}
					{{ Form::text('contact_region', optional($settings->contact)->region, ['class' => 'form-control', 'placeholder' => 'Enter Region']) }}
				</div>


				{{-- contact_city field --}}
				<div class="form-group">
					{{ Form::label('contact_city', 'City:') }}
					{{ Form::text('contact_city', optional($settings->contact)->city, ['class' => 'form-control', 'placeholder' => 'Enter City']) }}
				</div>


				{{-- contact_country field --}}
				<div class="form-group">
					{{ Form::label('contact_country', 'Country:') }}
					{{ Form::text('contact_country', optional($settings->contact)->country, ['class' => 'form-control', 'placeholder' => 'Enter Country']) }}
				</div>

				{{-- contact_zip_code field --}}
				<div class="form-group">
					{{ Form::label('contact_zip_code', 'Zip Code:') }}
					{{ Form::text('contact_zip_code', optional($settings->contact)->zip_code, ['class' => 'form-control', 'placeholder' => 'Enter Zip Code']) }}
				</div>

				
				<div class="form-group">
					<div class="col-md-6">
						<p>Favicon</p>
						<strong>Current Image</strong>
						<div class="current-image">
							@if ($favicon = App\Setting::getJSONValueFromKeyField('site-info', 'favicon'))
								<img src="{{ $favicon }}" alt="favicon" class="img-responsive">
							@else 
								<p>No Image Uploaded</p>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<p>Logo</p>
						<strong>Current Image</strong>
						<div class="current-image">
							@if ($logo = App\Setting::getJSONValueFromKeyField('site-info', 'logo'))
								<img src="{{ $logo }}" alt="favicon" class="img-responsive">
							@else 
								<p>No Image Uploaded</p>
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="__react-root" id="IconAndLogoInput"></div>
				</div>
				
				{{-- Submit Button --}}
				<div class="form-group">
					{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}
	
    @endslot
    
	@endcomponent

@endsection
