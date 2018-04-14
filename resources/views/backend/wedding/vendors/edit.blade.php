@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Edit a vendor"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all vendors',
                        'url' => route('vendors.index')
                    ])
                        
                    @endcomponent
                @endslot
				@slot('body')
					<form action="{{ route('vendors.update', ['vendor' => $vendor->id ]) }}" method="POST">
						{{ method_field('PATCH') }}
						<div class="form-group">
							<label for="formControlName">Vendor Name</label>
							<input 
								type="text" 
								class="form-control" 
								id="formControlName" 
								name="name"
								placeholder="Enter name"
								value="{{ $vendor->name }}" 
							>
						</div>
						
						<div class="form-group">
							<label class="control-label">Current Categories</label>
							<ul class="list-unstyled">
								@forelse ($vcategories as $vcategory)
									<li>{{ $vcategory }}</li>
								@empty
									<p><i>none</i></p>									
								@endforelse
							</ul>
						
						</div>
						

						<div class="form-group">
							<p><strong>Select Categories</strong></p>
							@foreach ($categories as $category)
								<label class="checkbox-inline">
									<input type="checkbox" name="category[]" value="{{ $category->id }}"> {{ $category->name }}
								</label>
							@endforeach							
						</div>

						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection