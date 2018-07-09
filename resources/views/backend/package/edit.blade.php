@extends('backend.layouts.master')

@section('content')

  @component('backend.layouts.breadcrumb', ['current' => 'Package'])
  @endcomponent

  @component('backend.layouts.panel', [
    'title' => 'Package Setting'
  ])
    @slot('body')
      {{ Form::open(['route' => 'package.update', 'method' => 'PATCH']) }}

        {{-- total_post field --}}
        <div class="form-group">
          {{ Form::label('total_posts', 'Total Posts:') }}
          {{ Form::number('total_posts', $settings['resources-limit']->total_posts, ['class' => 'form-control', 'placeholder' => 'Enter Total Posts']) }}
        </div>

        {{-- total_photos field --}}
        <div class="form-group">
          {{ Form::label('total_photos', 'Total Photos:') }}
          {{ Form::number('total_photos', $settings['resources-limit']->total_photos, ['class' => 'form-control', 'placeholder' => 'Enter Total Photos']) }}
        </div>

        {{-- total_albums field --}}
        <div class="form-group">
          {{ Form::label('total_albums', 'Total Albums:') }}
          {{ Form::text('total_albums', $settings['resources-limit']->total_albums, ['class' => 'form-control', 'placeholder' => 'Enter Total Albums']) }}
        </div>

        {{-- total_rsvp field --}}
        <div class="form-group">
          {{ Form::label('total_rsvp', 'Total RSVP:') }}
          {{ Form::number('total_rsvp', $settings['resources-limit']->total_rsvp, ['class' => 'form-control', 'placeholder' => 'Enter Total RSVP']) }}
        </div>

        {{-- total_rsvp_reminder field --}}
        <div class="form-group">
          {{ Form::label('total_rsvp_reminder', 'Total RSVP reminder:') }}
          {{ Form::number('total_rsvp_reminder', $settings['resources-limit']->total_rsvp_reminder, ['class' => 'form-control', 'placeholder' => 'Enter Total RSVP reminder']) }}
        </div>

        {{-- mode field --}}
        <div class="form-group">
          {{ Form::label('mode', 'Choose Mode: ') }}
          <label class="radio-inline">
            <input type="radio" name="mode" id="mode1" value="birthday" {{ $settings['other']->mode === 'birthday' ? 'checked' : '' }}> Birthday
          </label>
          <label class="radio-inline">
            <input type="radio" name="mode" id="mode2" value="wedding" {{ $settings['other']->mode === 'wedding' ? 'checked' : '' }}> Wedding
          </label>
        </div>

        {{-- Submit Button --}}
        <div class="form-group">
          {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
        </div>

      {{ Form::close() }}
    @endslot

  @endcomponent


@endsection