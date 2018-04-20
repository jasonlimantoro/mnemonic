@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Edit a category"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all categories',
                        'url' => route('categories.index')
                    ])
                        
                    @endcomponent
                @endslot
				@slot('body')
					<form action="{{ route('categories.update', ['category' => $category->id ]) }}" method="POST">
						{{ method_field('PATCH') }}
						<div class="form-group">
							<label for="formControlName">Category Name</label>
							<input 
								type="text"
								class="form-control"
								id="formControlName"
								name="name"
								placeholder="Enter name"
								value="{{ $category->name }}"
							>
						</div>

						<div class="form-group">
							<label for="formControlDescription">Category Description</label>
							<textarea 
								name="description"
								id="formControlDescription" 
								cols="30" 
								rows="10" 
								placeholder="Enter Description" 
								class="form-control"
							>{{ $category->description}}</textarea>
						</div>
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection