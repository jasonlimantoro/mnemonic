@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'VIP'])
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Couple Information'
  ])

    @slot('body')
      {{ Form::open(['route' => ['vip.update',env('APP_SUBDOMAIN') ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) }}
      @php
        $role = 'groom';
      @endphp
      <div class="col-xs-12 col-md-6">
        {{-- name field --}}
        <div class="form-group">
          {{ Form::label($role . '_name', 'Name:') }}
          {{ Form::text($role . '_name', $vip->groom->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
        </div>

        {{-- father field --}}
        <div class="form-group">
          {{ Form::label($role . '_father', 'Father:') }}
          {{ Form::text($role . '_father', $vip->groom->father, ['class' => 'form-control', 'placeholder' => 'Enter Father']) }}
        </div>

        {{-- mother field --}}
        <div class="form-group">
          {{ Form::label($role . '_mother', 'Mother:') }}
          {{ Form::text($role . '_mother', $vip->groom->mother, ['class' => 'form-control', 'placeholder' => 'Enter Mother']) }}
        </div>


        <div class="form-group">
          <p>
            <strong>Current Image</strong>
          </p>
          <div class="current-image">
            @isset($vip->groom->image)
              <img src="{{ url('/imagecache/vip/'. $vip->groom->image) }}" alt="vip" class="img-responsive">
            @else
              <p class="no-current-image">No image uploaded</p>
            @endisset
          </div>
        </div>
        <div class="form-group">
          <div data-component="FancyInput"
               data-prop-input-name="{{ $role }}_image"
               data-prop-initial-input-value="{{ isset($vip->groom->image) ?: $vip->groom->image }}"
               data-prop-template="vip"
          >
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-md-6">
        @php
          $role = 'bride'
        @endphp
        {{-- name field --}}
        <div class="form-group">
          {{ Form::label($role . '_name', 'Name:') }}
          {{ Form::text($role . '_name', $vip->bride->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
        </div>

        {{-- father field --}}
        <div class="form-group">
          {{ Form::label($role . '_father', 'Father:') }}
          {{ Form::text($role . '_father', $vip->bride->father, ['class' => 'form-control', 'placeholder' => 'Enter Father']) }}
        </div>

        {{-- mother field --}}
        <div class="form-group">
          {{ Form::label($role . '_mother', 'Mother:') }}
          {{ Form::text($role . '_mother', $vip->bride->mother, ['class' => 'form-control', 'placeholder' => 'Enter Mother']) }}
        </div>


        <div class="form-group">
          <p>
            <strong>Current Image</strong>
          </p>
          <div class="current-image">
            @isset($vip->bride->image)
              <img src="{{ url('/imagecache/vip/'. $vip->bride->image) }}" alt="vip" class="img-responsive">
            @else
              <p class="no-current-image">No image uploaded</p>
            @endisset
          </div>
        </div>
        <div class="form-group">
          <div data-component="FancyInput"
               data-prop-input-name="{{ $role }}_image"
               data-prop-initial-input-value="{{ isset($vip->bride->image) ?: $vip->bride->image }}"
               data-prop-template="vip"
          >
          </div>
        </div>
      </div>

      <div class="col-xs-12">
        {{-- Submit Button --}}
        <div class="form-group">
          @can('update', App\VIP::class)
            {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
          @else
            {{ Form::unauthorizedButton() }}
          @endcan
        </div>
      </div>
      {{ Form::close() }}
    @endslot
  @endcomponent
@endsection
