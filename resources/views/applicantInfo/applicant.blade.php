@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
    .center_div{
    width: 80px;
    margin-right: 100px;
    margin: 0 15%;
    width:80%;
    
}
body {
    background-color: #f78f1e;
    color: #636b6f;
    font-family: 'Roboto', sans-serif;
    font-weight: bold;
    height: 100vh;
    margin: 0;
} 
#status {
    margin-left: 15px;
}
#updatebtn {
    margin-left: 500px;
    margin-bottom: 45px;
}
input[type=text] {
    border: 2px solid black;
    border-radius: 4px;
}


</style>
<div class = "container" style = "margin-left: 210px;">
<div class="card text-white bg-dark mb-3" style="max-width: 50rem;">
  <div class="card-header" style = "text-align: center;">Applicant Details</div>
  <div class="card-body">
    <form class = "center_div card-body" method="POST" action="{{ url('/applicants', $applicant->id)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" name="id" value = "{{$applicant->id}}">
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Full Name</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value = "{{ $applicant->full_name }}">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Date of Birth</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->date_of_birth }}">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Mobile Number</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->mobile_number }}">
        </div>
    </div>
    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Secondary Mobile Number</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->secondary_mobile }}">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->address }}">
        </div>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Company of Interest</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value= "{{ $applicant->company->name }}">
        </div>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Qualification</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value= "{{ $applicant-> highest_qualification }}">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Field of Work</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->field_of_work }}">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Area of Interest</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value= "{{ $applicant->department->name }}">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Comments</label>
        <div class="col-sm-10">
        <textarea name="" id=""  cols="40" rows="10" placeholder= "{{ $applicant->additional_comments }}"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">CV/Resume</label>
        <div class="col-sm-10">
        <!-- <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->cv_resume }}"> -->
         <button><a href="{{ url('applicants/download', $applicant->id) }}">Download CV  </a></button>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Supporting Documents</label>
        <div class="col-sm-10">
         <button><a href="{{ url('applicants/download/support_docs1', $applicant->id) }}">Download Support Document  </a></button>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Supporting Documents</label>
        <div class="col-sm-10">
         <button><a href="{{ url('applicants/download/support_docs2', $applicant->id) }}">Download Support Document  </a></button>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Supporting Documents</label>
        <div class="col-sm-10">
         <button><a href="{{ url('applicants/download/support_docs3', $applicant->id) }}">Download Support Document  </a></button>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Applied On</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" name="applied_at" id="staticEmail" value="{{ $applicant->created_at }}">
        </div>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Best Match</label>
        <div class="col-sm-10">
        <input type="text" id="staticEmail" class="form-control" name = "best_match" value="{{ $applicant->best_match or null }}">
        </div>
    </div>
    <label for="Status" id= "status">Status
    <div class = "radio">

        <label><input type="radio" name="status"  {{ ($applicant->status == 'not-hired') ? 'checked':''}}  value= "not-hired">Not Hired   </label>
    </div>
    <div class = "radio">
        <label><input type="radio" name="status"  {{ ($applicant->status == 'interviewed') ? 'checked':''}} value="interviewed">Interviewed</label>
    </div>
    <div class = "radio">
        <label><input type="radio" name="status"  {{ ($applicant->status == 'hired') ? 'checked':''}} value="hired">Hired</label>
    </div>
    <div class = "radio">
        <label><input type="radio" name="status"  {{ ($applicant->status == 'Wait-list') ? 'checked':''}} value="Wait-List">Wait-List</label>
    </div>
    </label>
    
        <div class="form-group">
        <label for="staticEmail" class="col-lg-4 col-form-label"> HR Comments</label>
        <div>
        <textarea  cols="35" rows="5" name="hr_comments" placeholder= "{{$applicant->hr_comments or null}}"></textarea>
    </div>
        </div>
    
   <button type= "submit" class="btn btn-primary btn-lg" id="updatebtn" >Update</button>
    </form>
  </div>
</div>
</div>
<!-- <div class= "container center_div "> -->
    <!-- <form class = "center_div card-body" method="POST" action="{{ url('/applicants', $applicant->id)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" name="id" value = "{{$applicant->id}}">
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Full Name</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value = "{{ $applicant->full_name }}">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Date of Birth</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->date_of_birth }}">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Mobile Number</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->mobile_number }}">
        </div>
    </div> -->

    <!-- <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->address }}">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Qualification</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value= "{{ $applicant-> highest_qualification }}">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Field of Work</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->field_of_work }}">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Area of Interest</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value= "{{ $applicant->area_of_interest }}">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Comments</label>
        <div class="col-sm-10">
        <textarea name="" id="" readonly cols="40" rows="10" placeholder= "{{ $applicant->comments }}"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">cv_resume  </label>
        <div class="col-sm-10">
        <!-- <input type="text" readonly class="form-control" id="staticEmail" value="{{ $applicant->cv_resume }}"> -->
         <!-- <button><a href="{{ url('applicants/download', $applicant->id) }}">Download CV  </a></button>
    </div> --> 

    <!-- <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Applied On</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control" name="applied_at" id="staticEmail" value="{{ $applicant->created_at }}">
        </div>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Best Match</label>
        <div class="col-sm-10">
        <input type="text" id="staticEmail" class="form-control" name = "best_match" value="{{ $applicant->best_match or null }}">
        </div>
    </div>
    <label for="Status" id= "status">Status
    <div class = "radio">

        <label><input type="radio" name="status"  {{ ($applicant->status == 'not-hired') ? 'checked':''}}  value= "not-hired">Not Hired   </label>
    </div>
    <div class = "radio">
        <label><input type="radio" name="status"  {{ ($applicant->status == 'interviewed') ? 'checked':''}} value="interviewed">Interviewed</label>
    </div>
    <div class = "radio">
        <label><input type="radio" name="status"  {{ ($applicant->status == 'hired') ? 'checked':''}} value="hired">Hired</label>
    </div>
    </label>
   <button type= "submit" class="btn btn-primary btn-lg" id="updatebtn" >Update</button>
    </form> -->
<!-- </div> -->

     

  @endsection