@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('backend.layouts.breadcrumb', ['current' => 'Couple'])
      @endcomponent
      @component('backend.layouts.panel', [
        'title' => "Couple Information"
      ])

        @slot('body')
          <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#groom" aria-controls="groom" role="tab"
                                                        data-toggle="tab">Groom</a>
              </li>
              <li role="presentation"><a href="#bride" aria-controls="bride" role="tab"
                                         data-toggle="tab">Bride</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content clearfix">
              <div role="tabpanel" class="tab-pane active" id="groom">
                {{ Form::model($groom, ['route' => ['couple.update', $groom->id ], 'method' => 'PATCH']) }}
                <div class="col-md-6">
                  {{-- name field --}}
                  <div class="form-group">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
                  </div>

                  {{-- father field --}}
                  <div class="form-group">
                    {{ Form::label('father', 'Father:') }}
                    {{ Form::text('father', null, ['class' => 'form-control', 'placeholder' => 'Enter Father']) }}
                  </div>

                  {{-- mother field --}}
                  <div class="form-group">
                    {{ Form::label('mother', 'Mother:') }}
                    {{ Form::text('mother', null, ['class' => 'form-control', 'placeholder' => 'Enter Mother']) }}
                  </div>

                  {{-- Submit Button --}}
                  <div class="form-group">
                    @can('update', App\Couple::class)
                      {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    @else
                      <button class="btn btn-default" disabled>Unauthorized</button>
                    @endcan
                  </div>

                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <p>
                      <strong>Current Image</strong>
                    </p>
                    <div class="current-image">
                      @isset($groom->image)
                        <img src="{{ $groom->image->url_cache }}" alt="groom" class="img-responsive">
                      @else
                        <p class="no-current-image">No image uploaded</p>
                      @endisset
                    </div>
                  </div>

                  <div class="form-group">
                    <div data-component="FancyInput"
                         data-prop-i={{ $groom->id }}
                    >
                    </div>
                  </div>
                </div>
                {{ Form::close() }}
              </div>

              <div role="tabpanel" class="tab-pane" id="bride">
                {{ Form::model($bride, ['route' => ['couple.update', $bride->id ], 'method' => 'PATCH']) }}
                <div class="col-md-6">
                  {{-- name field --}}
                  <div class="form-group">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
                  </div>

                  {{-- father field --}}
                  <div class="form-group">
                    {{ Form::label('father', 'Father:') }}
                    {{ Form::text('father', null, ['class' => 'form-control', 'placeholder' => 'Enter Father']) }}
                  </div>

                  {{-- mother field --}}
                  <div class="form-group">
                    {{ Form::label('mother', 'Mother:') }}
                    {{ Form::text('mother', null, ['class' => 'form-control', 'placeholder' => 'Enter Mother']) }}
                  </div>

                  {{-- Submit Button --}}
                  <div class="form-group">
                    @can('update', App\Couple::class)
                      {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    @else
                      <button class="btn btn-default" disabled>Unauthorized</button>
                    @endcan
                  </div>

                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <p>
                      <strong>Current Image</strong>
                    </p>
                    <div class="current-image">
                      @isset($bride->image)
                        <img src="{{ $bride->image->url_cache }}" alt="groom" class="img-responsive">
                      @else
                        <p class="no-current-image">No image uploaded</p>
                      @endisset
                    </div>
                  </div>

                  <div class="form-group">
                    <div data-component="FancyInput"
                         data-prop-i={{ $bride->id }}
                    >
                    </div>
                  </div>
                </div>
                {{ Form::close() }}
              </div>
            </div>

          </div>

        @endslot
      @endcomponent
    </div>
  </div>
@endsection
