@extends('layouts.app')

@section('content')
<style>
  a {
    color: white;
} 
  body {
    background-color: #f78f1e;
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: bold;
    height: 100vh;
    margin: 0;
} 
#new_app {
    float: right;
}
#btnsearch {
    margin-left: 5px;
    float: right;
    margin-bottom: 6px;
}
#inputsearch {
    margin-left:15px;
}
.size {
    margin-left: 10px;

}
input[type = "text"] {
    width: 150px;
}
.cv-style {
    text-align: center;
}
#filter {
    float: right;
    margin-left: 315px;
}
#filter {
    margin-right: 10px;
    margin-top: 1px;
}

    
</style>
<div class="container">

@if (Session::has('message'))

   <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Applicant Information Updated</strong>.
</div>
    @endif
  <div class="card text-white bg-dark  mb-3">
  <div class="card-header">
    Applicants
    <a href ="{{url ('/applicants/new')}}" class = "btn btn-primary" id="new_app" > New Applicant </a>
    <button id = "filter" class="btn btn-success">Filter Applicants</button>
  </div>
  <div class="table-responsive">
  <div class="card-body">
  <div class="col-sm-8">
<form class="form-inline row" method = "GET" action = "{{url('/query-applicants')}}">
<div class="form-group" id = "searchFilter" style="display:none;" >
    <label for="inputPassword2" class="sr-only"></label>
    <input type="text" class="mb-2 mr-sm-2" placeholder="Name" name = "full_name">
    <label for="inputPassword2" class="sr-only"></label>
    <input type="text" class="mb-2 mr-sm-2"  placeholder="Qualification" name = "highest_qualification">
    <label for="inputPassword2" class="sr-only"></label>
    <input type="text" class="mb-2 mr-sm-2"  placeholder="Interest" name = "area_of_interest">
    <label for="inputPassword2" class="sr-only"></label>
    <input type="text" class="mb-2 mr-sm-2" placeholder="Mobile Number" name = "mobile_number">
    <label for="inputPassword2" class="sr-only"></label>
    <select name="status" class="mb-2 mr-sm-2">
      <option placeholder = "Status"></option>
      <option>Interviewed</option>
      <option>Wait-List</option>
      <option>Hired</option>
      <option>Not-Hired</option>
    </select>
    <select name="status" class="mb-2 mr-sm-2">
      <option placeholder = "Status"></option>
      <option>Interviewed</option>
      <option>Wait-List</option>
      <option>Hired</option>
      <option>Not-Hired</option>
    </select>
    <select name="status" class="mb-2 mr-sm-2">
      <option placeholder = "Status"></option>
      <option>Interviewed</option>
      <option>Wait-List</option>
      <option>Hired</option>
      <option>Not-Hired</option>
    </select>
    <!-- <input type="text" class="mb-2 mr-sm-2" placeholder="Status" name = "status"> -->
    <button type="submit" class="btn btn-flat btn-outline-success btn-sm input-group-btn" id = "btnsearch">Search</button>
     
</div>

</form>

</div>

   <table class="table table-sm">
    <thead>
        <td>Id</td>
        <td>Full Name</td>
        <td>Email</td>
        <td>Date Of Birth</td>
        <td>Mobile Number</td>
        <!-- <td>Address</td> -->
        <td>Qualification</td>
        <!-- <td>Field of Work</td> -->
        <td>Area of Interest</td>
        <!-- <td>Comments</td> -->
        <td class = "cv-style">CV</td>
        <td class = "cv-style">Action</td>
        <!-- <td>Applied On</td> -->
        <!-- <td><input type="button" value="see_more"></td> -->                   
    </thead>
  <tbody>
    @foreach($applicants as $applicant)
    <tr>
        <td>{{$loop->iteration + (($applicants->currentPage() -1) * $applicants->perPage()) }}</td>
        <td>{{$applicant->full_name }}</td>
        <td>{{$applicant->email}}</td>
        <td>{{$applicant->date_of_birth}}</td>
        <td>{{$applicant->mobile_number}}</td>
        <!-- <td>{{$applicant->address}}</td> -->
        <td>{{$applicant->highest_qualification}}</td>
        <!-- <td>{{$applicant->field_of_work}}</td> -->
        <td>{{$applicant->department->name}}</td>
        <!-- <td>{{$applicant->comments}}</td> -->
        <td><a href="{{ url('applicants/download', $applicant->id) }}" class = "btn btn-primary">Download CV</a></td>
        <!-- <td>{{$applicant->created_at}}</td> -->
        <td><div class="container">
	<a href = "{{url('/applicants', $applicant->id)}}" class="btn btn-warning" >Details</a>

	</td>
        
    </tr>
    @endforeach


</tbody>
</table>
{{$applicants->links()}}
</div>
  </div>
</div>
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Applicants</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <!-- You are logged in! -->
                    <!-- <table class= "table table-hover table-condensed">
                        <thead>
                            <td>#</td>
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>Date Of Birth</td>
                            <td>Address</td>
                            <td>Qualification</td>
                            <td>Field of Work</td>
                            <td>Area of Interest</td>
                            <td>Comments</td>
                            <td>CV_resume</td>
                            <td>created at</td>
                            <td>created at</td>
                        </thead>

                        <tbody>
                          @foreach($applicants as $applicant)
                            <tr class= "table-success">
                              <td>{{$applicant->id}}</td>
                              <td>{{ $applicant->full_name }}</td>
                              <td>{{$applicant->email}}</td>
                              <td>{{$applicant->date_of_birth}}</td>
                              <td>{{$applicant->mobile_number}}</td>
                              <td>{{$applicant->address}}</td>
                              <td>{{$applicant->highest_qualification}}</td>
                              <td>{{$applicant->field_of_work}}</td>
                              <td>{{$applicant->area_of_interest}}</td>
                              <td>{{$applicant->comments}}</td>
                              <td>{{$applicant->cv_resume}}</td>
                              <td>{{$applicant->created_at}}</td>
                              
                          </tr>
                          @endforeach -->
                            
                          <!-- <tr class="table-danger">
                              <th scope="row">2</th>
                              <td>Ya Asantewaa</td>
                              <td>Asantewaa4ever@gmail.com</td>
                              <td>1/1/1990</td>
                              <td>Heavens Gate</td>
                              <td>Everything</td>
                              <td>True</td>
                              <td>Afrika</td>
                              <td>OK</td>
                              <td>5/14/2018</td>
                          </tr> -->
                        </tbody>



                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
   
