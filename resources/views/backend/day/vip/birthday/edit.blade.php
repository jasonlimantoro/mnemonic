@extends('backend.layouts.master')

@section('content')
  @component('backend.layouts.breadcrumb', ['current' => 'VIP'])
  @endcomponent
  @component('backend.layouts.panel', [
    'title' => 'Birthday Person Information' 
  ])

    @slot('body')
      {{ Form::open(['route' => 'vip.update', 'method' => 'PATCH']) }}
        <div class="col-xs-12">
          {{-- name field --}}
          <div class="form-group">
            {{ Form::label('vip_name', 'Name:') }}
            {{ Form::text('vip_name', $vip->birthday_person->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
          </div>

          {{-- father field --}}
          <div class="form-group">
            {{ Form::label('vip_father', 'Father:') }}
            {{ Form::text('vip_father', $vip->birthday_person->father, ['class' => 'form-control', 'placeholder' => 'Enter Father']) }}
          </div>

          {{-- mother field --}}
          <div class="form-group">
            {{ Form::label('vip_mother', 'Mother:') }}
            {{ Form::text('vip_mother', $vip->birthday_person->mother, ['class' => 'form-control', 'placeholder' => 'Enter Mother']) }}
          </div>


          <div class="form-group">
            <p>
              <strong>Current Image</strong>
            </p>
            <div class="current-image">
              @isset($vip->birthday_person->image)
                <img src="{{ url('/imagecache/vip/'. $vip->birthday_person->image) }}" alt="vip" class="img-responsive">
              @else
                <p class="no-current-image">No image uploaded</p>
              @endisset
            </div>
          </div>
          <div class="form-group">
            <div data-component="FancyInput"
                 data-prop-input-name="vip_image"
                 data-prop-initial-input-value="{{ isset($vip->birthday_person->image) ?: $vip->birthday_person->image }}"
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
