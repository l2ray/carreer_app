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
                            <!-- end row -->

                            
        <div class="row">
                  <div class="col-sm-12">
                  @if (Session::has('message'))

                       <div class="alert alert-dismissible alert-success">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>{{ Session::get('message') }}</strong>.
                        </div>
                    @endif                                   
            <div class="card mb-3">
                                        <div class="card-header">
                                            <h3><i class="fa fa-users"></i> QGroup Applicants</h3>
                                            <div class="d-flex justify-content-end">
                                                <div class="d-flex-inline">
                                                      <a href ="{{url ('/applicants/new')}}" class = "btn btn-primary" id="new_app" > New Applicant </a>
                                                <button id = "filter" class="btn btn-success">Filter</button>
                                                </div>
                                              
                                            </div>
                                        </div>
                                            
                                        <div class="card-body">
                                            
                                            
                                            
                                                
                                           
                                            <form class="form-inline row" method = "GET" action = "{{route('applications.all')}}">
                                                <div class="row" id = "searchFilter" style="display:none;" >
                                                <div class="col-sm-12">
                                                <div class="form-group" >
                                                    
                                                    <input type="text" class="form-control form-control-sm col-sm-2 mr-1 mb-3" placeholder="First Name" name = "first_name">
                                                    <!-- <input type="text" class="form-control form-control-sm col-sm-2 mr-1 mb-1" placeholder="Middlle Name" name = "middle_name"> -->
                                                    
                                                    <input type="text" class="form-control form-control-sm col-sm-2 mr-1 mb-3 placeholder="Last Name" name = "last_name">
                                                    
                                                    <input type="text" class="form-control form-control-sm col-sm-2 mr-1 mb-3"  placeholder="Qualification" name = "highest_qualification">
                                                     <input type="text" class="form-control form-control-sm col-sm-2 mr-1 mb-3"  placeholder="Interest" name = "area_of_interest">
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                    <div class="form-group" >
                                                   
                                                   
                                                    <input type="text" class="form-control form-control-sm col-sm-2 mr-1 mb-3" placeholder="Mobile Number" name = "mobile_number">
                                                    <select name="status" class="form-control form-control-sm col-sm-2 mr-1 mb-3">
                                                      <option value="">Status</option>
                                                      <option>Interviewed</option>
                                                      <option>Wait-List</option>
                                                      <option>Hired</option>
                                                      <option>Not-Hired</option>
                                                    </select>  
                                                    <select name="company" class="form-control form-control-sm col-sm-2 mr-1 mb-3" id="company">
                                                      <option value="">Company</option>
                                                         @foreach($companies as $company)
                                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                            @endforeach
                                                    </select> 
                                                     <select name="area_of_interest"  class="form-control form-control-sm col-sm-2 mr-1 mb-3" id="department" >
                                                            <option value="">Select Department</option>
                                                             @foreach($departments as $department)
                                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    
                                                    <button type="submit" class="btn btn-flat btn-outline-success btn-sm mb-3 col-sm-2">Search</button>
                                                     
                                                </div>
                                                </div>
                                                        </div>
                                                </form>
                                                
                                           <!--  <table class="table table-responsive-xl"> -->
                                              <table class="table table-md table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col" class="text-center">Name &amp; DOB</th>
                                                        <th scope="col" class="text-center">Contact Details</th>
                                                      
                                                        <th scope="col" class="text-center">Area of Interest</th>
                                                        <!-- <th scope="col">Comments</th> -->
                                                        <th scope="col" class="text-center">Applied</th>
                                                        <th scope="col" class="text-center">CV</th>
                                                        
                                                        <th scope="col" class="text-center">Actions</th>
                                                    </tr>         
                                                </thead>
                                              <tbody>
                                               @foreach($applicants as $applicant)
                                                    <tr>
                                                        <th scope="row">{{$loop->iteration + (($applicants->currentPage() -1) * $applicants->perPage()) }}</th>
                                                        <td>
                                                            <div class="d-flex flex-column align-items-center">
                                                                <span class="text-uppercase font-weight-bold">{{$applicant->first_name }} {{$applicant->middle_name }} {{$applicant->last_name }}
                                                                </span>
                                                                <small class="text-muted"><span class="font-weight-bold">DOB:</span> {{ \Carbon\Carbon::parse($applicant->date_of_birth)->toFormattedDateString()}}</small>
                                                            </td>
                                                        <td>
                                                            <div class="d-flex flex-column align-items-center">
                                                                <span>{{$applicant->email}}</span>
                                                                <small class="text-muted">{{$applicant->mobile_number}}</small>
                                                            </div>
                                                        </td>
                                                       
                                                         <td>
                                                            <div class="d-flex flex-column align-items-center">
                                                                <span>{{$applicant->company->name}}</span>
                                                                <small class="text-muted">{{$applicant->department->name}}</small>
                                                            </div>
                                                        </td>
                                                        <td>{{$applicant->created_at->diffForHumans()}}</td>
                                                        <td><a href="{{ url('applicants/download', $applicant->id) }}" class = "btn btn-sm btn-outline-primary">Download CV</a></td>
                                                        
                                                        <td><div class="container">
                                                    <a href = "{{url('/applicants', $applicant->id)}}" class="btn btn-sm btn-outline-secondary" >Details</a>

                                                    </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                              </tbody>
                                            </table>
                                            {{ $applicants->links() }}    

                                        </div>

                                    </div><!-- end card-->      
                                    </div>
                            </div>
@endsection
