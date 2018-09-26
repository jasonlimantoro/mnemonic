@extends('backend.layouts.master')

@section('content')
	@component('backend.layouts.breadcrumb', ['current' => 'Site Info'])
	@endcomponent
  @component('backend.layouts.panel', ['title' => 'Settings'])
    @slot('body')
			{{ Form::open(['route' => ['siteinfo.update', env('APP_SUBDOMAIN')], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) }}
				{{-- admin_email field --}}
				<div class="form-group">
					{{ Form::label('admin_email', 'Admin Email:') }}
					{{ Form::text('admin_email', optional($settings)->{'admin-email'}, ['class' => 'form-control', 'placeholder' => 'Enter Admin Email']) }}
				</div>

				{{-- site_title field --}}
				<div class="form-group">
					{{ Form::label('site_title', 'Site Title:') }}
					{{ Form::text('site_title', optional($settings)->title, ['class' => 'form-control', 'placeholder' => 'Enter Site Title']) }}
				</div>
				
				{{-- site_description field --}}
				<div class="form-group">
					{{ Form::label('site_description', 'Description:') }}
					{{ Form::textarea('site_description', optional($settings)->description, ['class' => 'form-control show', 'placeholder' => 'Enter Description']) }}
				</div>

				{{-- contact_email field --}}
				<div class="form-group">
					{{ Form::label('contact_email', 'Email:') }}
					{{ Form::textarea('contact_email', optional(optional($settings)->contact)->email, ['class' => 'form-control show', 'placeholder' => 'Enter Emails (one email per row)']) }}
				</div>

				{{-- contact_phone field --}}
				<div class="form-group">
					{{ Form::label('contact_phone', 'Phone Number:') }}
					{{ Form::textarea('contact_phone', optional(optional($settings)->contact)->phone, ['class' => 'form-control show', 'placeholder' => 'Enter Phone Number']) }}
				</div>

				{{-- contact_mobile field --}}
				<div class="form-group">
					{{ Form::label('contact_mobile', 'Mobil Phone:') }}
					{{ Form::textarea('contact_mobile', optional(optional($settings)->contact)->mobile, ['class' => 'form-control show', 'placeholder' => 'Enter Mobile Phone']) }}
				</div>

				{{-- contact_address field --}}
				<div class="form-group">
					{{ Form::label('contact_address', 'Address:') }}
					{{ Form::text('contact_address', optional(optional($settings)->contact)->address, ['class' => 'form-control', 'placeholder' => 'Enter address']) }}
				</div>

				{{-- contact_region field --}}
				<div class="form-group">
					{{ Form::label('contact_region', 'Region:') }}
					{{ Form::text('contact_region', optional(optional($settings)->contact)->region, ['class' => 'form-control', 'placeholder' => 'Enter Region']) }}
				</div>


				{{-- contact_city field --}}
				<div class="form-group">
					{{ Form::label('contact_city', 'City:') }}
					{{ Form::text('contact_city', optional(optional($settings)->contact)->city, ['class' => 'form-control', 'placeholder' => 'Enter City']) }}
				</div>


				{{-- contact_country field --}}
				<div class="form-group">
					{{ Form::label('contact_country', 'Country:') }}
					{{ Form::text('contact_country', optional(optional($settings)->contact)->country, ['class' => 'form-control', 'placeholder' => 'Enter Country']) }}
				</div>

				{{-- contact_zip_code field --}}
				<div class="form-group">
					{{ Form::label('contact_zip_code', 'Zip Code:') }}
					{{ Form::text('contact_zip_code', optional(optional($settings)->contact)->zip_code, ['class' => 'form-control', 'placeholder' => 'Enter Zip Code']) }}
				</div>

				
				<div class="form-group clearfix">
					<div class="col-md-4">
						<p>Favicon</p>
						<strong>Current Image</strong>
						<div class="current-image">
							@if ($favicon = $settings->favicon)
								<img src="{{ url('/imagecache/logo/' . $favicon) }}" alt="favicon" class="img-responsive">
							@else 
								<p>No Image Uploaded</p>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<p>Logo</p>
						<strong>Current Image</strong>
						<div class="current-image">
							@if ($logo = $settings->logo)
								<img src="{{ url('/imagecache/logo/' . $logo) }}" alt="logo" class="img-responsive">
							@else 
								<p>No Image Uploaded</p>
							@endif
						</div>
					</div>
				</div>
				<div class="form-group clearfix">
          <div class="col-md-4">
            <div data-component="FancyInput"
                 data-prop-initial-input-value="{{ $favicon }}"
                 data-prop-input-name="favicon"
            >
            </div>
          </div>
          <div class="col-md-4">
            <div data-component="FancyInput"
                 data-prop-initial-input-value="{{ $logo }}"
                 data-prop-input-name="logo"
            >
            </div>
          </div>
				</div>
				
				{{-- Submit Button --}}
				<div class="form-group">
					@can('update-site-info')
						{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
					@else
						{{ Form::unauthorizedButton() }}
					@endcan
				</div>
			{{ Form::close() }}
	
    @endslot
    
	@endcomponent

@endsection
