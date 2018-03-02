@extends('layouts.submaster')

@section('content')
	<div class="row">
		<div class="col-md-12"> @component('layouts.panel', ['backButton' => '', 'addButton' => '']) 
				@slot('title') Groom and Bride Information
				@endslot
			
				@slot('body')
				<div class="row">
					<form action="{{ route('couple.update') }}" method="POST"> 
						{{ method_field('PATCH') }}
						<div class="col-md-6 col-xs-12">
							Groom
							<div class="form-group">
								<label for="groomName">Name</label> 
								<input type="text" name="groom_name" class="form-control" id="groomName" value="{{ $groom->name }}">
							</div>
							<div class="form-group">
								<input type="text" name="groom_relation" class="form-control" value="a son of" disabled>
							</div>
							<hr>

							Father
							<div class="form-group">
								<label for="fatherGroomName">Name</label> 
								<input type="text" name="father_groom_name" class="form-control" id="fatherGroomName" value="{{ $groom->father }}">
							</div>
							<hr>

							Mother
							<div class="form-group">
								<label for="motherGroomName">Name</label> 
							<input type="text" name="mother_groom_name" class="form-control" id="motherGroomName" value="{{ $groom->mother }}">
							</div>

						</div>
						<div class="col-md-6 col-xs-12">
							Bride
							<div class="form-group">
								<label for="brideName">Name</label> 
								<input type="text" name="bride_name" class="form-control" id="brideName" value="{{ $bride->name }}">
							</div>
							<div class="form-group">
								<input type="text" name="bride_relation" class="form-control" value="a daughter of" disabled>
							</div>
							<hr>

							Father
							<div class="form-group">
								<label for="fatherBrideName">Name</label> 
								<input type="text" name="father_bride_name" class="form-control" id="fatherBrideName" value="{{ $bride->father }}">
							</div>
							<hr>

							Mother
							<div class="form-group">
								<label for="motherBrideName">Name</label> 
								<input type="text" name="mother_bride_name" class="form-control" id="motherBrideName" value="{{ $bride->mother }}">
							</div>

						</div>
						<div class="col-md-12 col-xs-12">
							<button class="btn btn-primary" type="submit">Submit</button> 
						</div>
					</form>
				</div> 
				@endslot
			@endcomponent
		</div>
	</div>
@endsection