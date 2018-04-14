@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Create a new vendor"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all vendors',
                        'url' => route('vendors.index')
                    ])
                        
                    @endcomponent
                @endslot
				@slot('body')
					<form action="{{ route('vendors.store') }}" method="POST">
						<div class="form-group">
							<label for="formControlName">Vendor Name</label>
							<input 
								type="text" 
								class="form-control" 
								id="formControlName" 
								name="name"
								placeholder="Enter name"
							>
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