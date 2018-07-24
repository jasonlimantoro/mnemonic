@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'Couple'])
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Couple Information'
  ])

    @slot('body')
      {{ Form::open(['route' => 'vip.update', 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) }}
      @foreach($vips as $vip)
        @php
          $role = $vip->gender === 'male' ? 'groom' : 'bride';
        @endphp
        <div class="col-xs-12 {{ $mode === 'birthday' ? 'col-md-12' : 'col-md-6' }}">
          {{-- name field --}}
          <div class="form-group">
            {{ Form::label($role . '_name', 'Name:') }}
            {{ Form::text($role . '_name', $vip->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
          </div>

          {{-- father field --}}
          <div class="form-group">
            {{ Form::label($role . '_father', 'Father:') }}
            {{ Form::text($role . '_father', $vip->father, ['class' => 'form-control', 'placeholder' => 'Enter Father']) }}
          </div>

          {{-- mother field --}}
          <div class="form-group">
            {{ Form::label($role . '_mother', 'Mother:') }}
            {{ Form::text($role . '_mother', $vip->mother, ['class' => 'form-control', 'placeholder' => 'Enter Mother']) }}
          </div>


          <div class="form-group">
            <p>
              <strong>Current Image</strong>
            </p>
            <div class="current-image">
              @isset($vip->image)
                <img src="{{ url('/imagecache/vip/'. $vip->image) }}" alt="vip" class="img-responsive">
              @else
                <p class="no-current-image">No image uploaded</p>
              @endisset
            </div>
          </div>
          <div class="form-group">
            <div data-component="FancyInput"
                 data-prop-input-name="{{ $role }}_image"
                 data-prop-initial-input-value="{{ isset($vip->image) ? $vip->image : '' }}"
                 data-prop-template="vip"
            >
            </div>
          </div>
        </div>
      @endforeach

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
