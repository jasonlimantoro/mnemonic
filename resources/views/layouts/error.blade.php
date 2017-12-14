@if($errors->any())
    <div class="form-group">
        {{--  <div class="col-md-offset-2 col-md-8">  --}}
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        {{--  </div>  --}}
    </div>
@endif