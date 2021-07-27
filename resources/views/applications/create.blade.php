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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
  <div class="card-header">
        <h3>Create a New Applicant</h3>
   </div>
  <div class="card-body" >
    <form class = "form-horizontal" method="POST" action="{{ url('/applicants')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">First Name</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "first_name">
        </div>
    </div>
    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Middle Name</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "middle_name">
        </div>
    </div>
    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Last Name</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "last_name">
        </div>
    </div>
    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "email">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Date of Birth</label>
        <div class="col-sm-10">
        <input type="date"  id="staticEmail" class="form-control" name = "date_of_birth">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Mobile Number</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "mobile_number">
        </div>
    </div>
    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Secondary Mobile Number</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "secondary_mobile">
        </div>
    </div>

    <div class="form-group ">
        <label for="staticEmail" class="col-lg-6 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "address">
        </div>
    </div>

    <div class="form-group col-lg-10 col-sm-12">
        <label for="exampleInputFile" >What is your Company of Interest?</label>
        <select name="company_of_interest" class="form-control" id="company" required >
            <option value="">Select Company</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
               
            @endforeach
        </select>
    </div>

    <div class="form-group">
    <label for="staticEmail" class="col-lg-6 col-form-label">Qualification</label>
    <div class="form-group col-lg-10 col-sm-12">
        <select name="highest_qualification" class="form-control " id="highest_qualification" required>
            <option value=""></option>
            <option value="Elementary">Elementary</option>
            <option value="Foundation">Foundation</option>
            <option value="WASSCE">WASSCE</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Certificate">Certificate</option>
            <option value="Diploma">Diploma</option>
            <option value="Advanced Diploma">Advanced Diploma</option>
            <option value="Higher National Diploma">Higher National Diploma</option>
            <option value="Graduate Diploma">Graduate Diploma</option>
            <option value="Bachelors Degree">Bachelors Degree</option>
            <option value="Masters Degree">Masters Degree</option>
            <option value="PHD">Phd</option>
    </select>
</div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Field of Work</label>
        <div class="col-sm-10">
        <input type="text"  id="staticEmail" class="form-control" name = "field_of_work">
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Area of Interest</label>
        <div class="col-sm-10">
        <select name="area_of_interest" class="form-control" id="department" required>
            <option value="">Select Department</option>
             @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
               
            @endforeach
            
        </select>
        </div>
    </div>

    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Comments</label>
        <div class="col-sm-10">
        <textarea name="comments" id="" cols="40" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group files" i>
        <label>CV</label> <br>
        <input type="file"  name="cv_resume">
        <p></p>
    </div>
    <div class="form-group files">
        <label for="exampleInputFile"></label>
        <input type="file" id="exampleInputFile" name="support_docs1">
        <p>Supporting Documents(Optional)</p>
    </div>
    <div class="form-group files">
        <label for="exampleInputFile"></label>
        <input type="file" id="exampleInputFile" name="support_docs2">
        <p class="help-block">Supporting Documents(Optional)</p>
    </div>
    <div class="form-group files">
        <label for="exampleInputFile"></label>
        <input type="file" id="exampleInputFile" name="support_docs3" >
        <p class="help-block">Supporting Documents(Optional)</p>
        
    </div> 


    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Applied On</label>
        <div class="col-sm-10">
        <input type="text"  name="applied_at" id="staticEmail" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="col-lg-6 col-form-label">Best Match</label>
        <div class="col-sm-10">
            <input type="text" id="staticEmail" class="form-control" name = "best_match">
        </div>
        
    </div>
                <div class="d-flex justify-content-center">
                      <button type= "reset" class="btn btn-secondary btn-sm mr-5" id="updatebtn" name = "reset" >Reset Form</button>
                     <button type= "submit" class="btn btn-primary btn-sm ml-5" id="updatebtn" name = "add" >Submit Application</button>
                </div>
                   

                
               
    </form>
</div>
    
  </div>
    </div>
</div>

@endsection 