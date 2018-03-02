@extends('layouts.submaster')

@section('content')
    <div class="row">
        <div class="col-md-12"> @component('layouts.panel', ['backButton' => '', 'addButton' => '']) 
                @slot('title') Groom and Bride Information
                @endslot
            
                @slot('body')
                <div class="row">
                    <form> 
                        <div class="col-md-6 col-xs-12">
                            Groom
                            <div class="form-group"> 
                                <label for="groomFirstName">First Name</label> 
                                <input type="text" name="groom_first_name" class="form-control" id="groomFirstName">
                            </div>
                            <div class="form-group">
                                <label for="groomFullName">Full Name</label> 
                                <input type="text" name="groom_full_name" class="form-control" id="groomFirstName">
                            </div>
                            <div class="form-group">
                                <input type="text" name="groom_relation" class="form-control" value="a son of">
                            </div>
                            <hr>

                            Father
                            <div class="form-group">
                                <label for="fatherGroomFullName">Full Name</label> 
                                <input type="text" name="father_groom_full_name" class="form-control" id="fatherGroomFirstName">
                            </div>
                            <hr>

                            Mother
                            <div class="form-group">
                                <label for="motherGroomFullName">Full Name</label> 
                                <input type="text" name="mother_groom_full_name" class="form-control" id="motherGroomFirstName">
                            </div>

                        </div>
                        <div class="col-md-6 col-xs-12">
                            <form> 
                                Bride
                                <div class="form-group"> 
                                    <label for="brideFirstName">First Name</label> 
                                    <input type="text" name="bride_first_name" class="form-control" id="brideFirstName">
                                </div>
                                <div class="form-group">
                                    <label for="brideFullName">Full Name</label> 
                                    <input type="text" name="bride_full_name" class="form-control" id="brideFirstName">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="bride_relation" class="form-control" value="a daughter of">
                                </div>
                                <hr>
    
                                Father
                                <div class="form-group">
                                    <label for="fatherBrideFullName">Full Name</label> 
                                    <input type="text" name="father_bride_full_name" class="form-control" id="fatherBrideFullName">
                                </div>
                                <hr>
    
                                Mother
                                <div class="form-group">
                                    <label for="motherBrideFullName">Full Name</label> 
                                    <input type="text" name="mother_bride_full_name" class="form-control" id="motherBrideFullName">
                                </div>
                                
                            </form>
                        </div>
                    </form>
                </div> 
                @endslot
            @endcomponent
        </div>
    </div>
@endsection