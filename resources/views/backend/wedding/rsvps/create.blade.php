@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Create a new RSVP"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all RSVPs',
                        'url' => route('rsvps.index')
                    ])
                        
                    @endcomponent
                @endslot
				@slot('body')
					<form action="{{ route('rsvps.store') }}" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="formControlName">Name</label>
									<input 
										type="text"
										class="form-control"
										id="formControlName"
										name="name"
										placeholder="Enter name"
									>
								</div>
								<div class="form-group">
									<label for="formControlEmail">Email</label>
									<input 
										type="email"
										class="form-control"
										id="formControlEmail"
										name="email"
										placeholder="Enter email"
									>
								</div>
								<div class="form-group">
									<label for="formControlTotalInvitation">Total Invitation</label>
									<input 
										type="number"
										class="form-control"
										id="formControlTotalInvitation"
										name="total_invitation"
										placeholder="Enter Total Invitation"
									>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="formControlPhone">Phone Number</label>
									<input 
										type="text"
										class="form-control"
										id="formControlPhone"
										name="phone"
										placeholder="Enter Phone Number"
									>
								</div>
								<div class="form-group">
									<label for="formControlTableName">Table Name</label>
									<input 
										type="text"
										class="form-control"
										id="formControlTableName"
										name="table_name"
										placeholder="Enter Table Name"
									>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection