@extends('layouts.master')

@section('content')
<div class="row">
                <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                                            <h1 class="main-title float-left">Applications Dashboard</h1>
                                            <ol class="breadcrumb float-right">
                                                <li class="breadcrumb-item">Home</li>
                                                <li class="breadcrumb-item active">Dashboard</li>
                                            </ol>
                                            <div class="clearfix"></div>
                        </div>
               </div>
 </div>
  <div class="row">
  <div class="col-sm-8 offset-sm-2">       
<div class="card">
  <div class="card-header">
  	<h3>Applicant Details</h3>
   </div>
  <div class="card-body">
    <form class = "center_div card-body" method="POST" action="{{ url('/applicants', $applicant->id)}}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" readonly class="form-control"  name="id" value = "{{$applicant->id}}">
   
    
    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Full Name</label>
        <div class="col-sm-10 d-flex">
            <input type="text" readonly class="form-control mr-2"  value = "{{ $applicant->first_name }}">
            <input type="text" readonly class="form-control mr-2"  value = "{{ $applicant->middle_name }}">
            <input type="text" readonly class="form-control "  value = "{{ $applicant->last_name }}">
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
</div>


@endsection