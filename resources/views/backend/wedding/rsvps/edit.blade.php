@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('layouts.panel', [
				'title' => "Edit a RSVP"
			])
                @slot('backButton')
                    @component('layouts.backButton', [
                        'text' => 'Show all RSVPs',
                        'url' => route('rsvps.index')
                    ])
                        
                    @endcomponent
                @endslot
				@slot('body')
					<form action="{{ route('rsvps.update', ['rsvp' => $rsvp->id ]) }}" method="POST">
						{{ method_field('PATCH') }}
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
										value="{{ $rsvp->name }}"
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
										value="{{ $rsvp->email }}"
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
										value="{{ $rsvp->total_invitation }}"
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
										value="{{ $rsvp->phone }}"
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
										value="{{ $rsvp->table_name }}"
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