<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>QGROUP ONLINE APPLICATIONS SYSTEM - ADMIN</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Favicon -->
		<!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

		<!-- Switchery css -->
		<link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
		
		<!-- Bootstrap CSS -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome CSS -->
		<link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- Custom CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />	
		
		<!-- BEGIN CSS for this page -->
                         <!-- custom CSS -->
                         <style type="text/css">
                                .headerbar {
                                    background-color: white;
                                }
                                .headerbar .headerbar-left {
                                    /* background: #4980b5; */
                                     background-color: rgba(234, 64, 12, 0.8);
                                    float: left;
                                    text-align: center;
                                    height: 50px;
                                    position: relative;
                                    width: 250px;
                                    z-index: 1;
                                    }
                                     .navbar-custom {
                                  background-color: rgba(234, 64, 12, 0.8);
                                  border-radius: 0;
                                  margin-bottom: 0;
                                  padding: 0 10px;
                                  margin-left: 250px;
                                  min-height: 50px;
                                  }
                                  #sidebar-menu .subdrop {
                                color: #fff !important;
                                background-color: #414d58;
                                background-color: rgba(234, 64, 12, 0.8);
                                /* border-left: 2px solid #608ab3; */
                                }
                                #sidebar-menu > ul > li > a:hover {
                                  
                                    border-left: none;
                                  } 
                                  #sidebar-menu > ul > li > a.active {
                                  
                                 background-color: rgba(234, 64, 12, 0.8);
                                  }
                                  #sidebar-menu .subdrop {
                                    
                                     border-left: none; 
                                    }#sidebar-menu .subdrop {
                                    
                                     border-left: none; 
                                    }
                         </style>
		<!-- END CSS for this page -->
				
</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
            <!-- <a href="index.html" class="logo"><img alt="logo" src="assets/images/logo.png" /> <span>Admin</span></a> -->
	<a href="{{ route('applications.all') }}" class="logo"><span><b>QOAS Admin</b></span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('assets/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Hello, {{ auth()->user()->name }}</small> </h5>
                                </div>

                                <!-- item-->
                               <!--  <a href="pro-profile.html" class="dropdown-item notify-item">
                                    <i class="fa fa-user"></i> <span>Profile</span>
                                </a> -->

                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item" 
                                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                    <i class="fa fa-power-off"></i>
                                   
                                            Logout
                                        

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
			<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a href="{{ route('applications.all')}}"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>
					
                    <li class="submenu">
                        <a href="#" class="active"><span> Applications </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">		
                                <li><a href="{{route('applications.new')}}">New Application <i class="fa fa-users-plus"></i></a></li>               						
                                <li><a href="{{route('applications.all')}}">All Applications</a></li>
                                
                                <li><a href="{{route('applications.all', ['status' => 'Interviewed'])}}">Interviewed <i class="fa fa-users-plus"></i></a></li>               
                                <li><a href="{{route('applications.all',  ['status' => 'Hired'])}}"> Hired <i class="fa fa-users-plus"></i></a></li>               
                                <li><a href="{{route('applications.all',  ['status' => 'Wait-list'])}}">Waiting List <i class="fa fa-users-plus"></i></a></li>								
                          
                            </ul>
                    </li>
					
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
                                            @yield('content')
                                    </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">QCell LTD</a>
		</span>
		<span class="float-right">
		Developed by <a  href="#"><b>QCell SWAT</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>

<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/detect.js') }}"></script>
<script src="{{ asset('assets/js/fastclick.js') }}"></script>
<script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/pikeadmin.js') }}"></script>

<!-- BEGIN Java Script for this page -->
<script type="text/javascript">
    $('#filter').on('click',function (e) {
        e.preventDefault();
        $("#searchFilter").toggle();       
    });
    $( "#company" ).change(function() {

            var company = $('#company').val();
            console.log(company);
            $.ajax({
                  method: "GET",
                 
                  url: "/api/companies/"+company,
                })
                  .done(function( msg ) {
                        console.log(msg.data);
                       
                        var departments = msg;
                        var firstOption = $("#department option:first-child");
                        $('#department').empty().append(firstOption);
                        $.each(departments.data, function(key, value) {
                        // console.log(value); 
                        $('#department')
                             .append($("<option></option>")
                                        .attr("value",value.id)
                                        .text(value.name)); 
                        });
                        
            });

        });
</script>
<!-- END Java Script for this page -->

</body>
</html>