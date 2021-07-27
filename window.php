<?php
session_start();

if (isset($_POST['submit'])) {
$_SESSION['post-data'] = $_POST;
}


function curlRequest($endpoint){

    $url = "http://localhost/career-app/admin/public/api/$endpoint";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $companies = curl_exec($ch);
    curl_close($ch);

    return json_decode($companies, true);
}


$companies = curlRequest('companies');

// var_dump($companies);
// exit;
$departments = curlRequest('companies/1');


include("captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();


if (isset($_SESSION['response_data'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    // print_r($responseData);
    unset($_SESSION['response_data']);
}


?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Application Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name= "author" content= "Ablie Foon"

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="http://qcell.gm/themes/demo/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link href="http://qcell.gm/themes/demo/assets/css/style.css" rel="stylesheet">

        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
                
        </script>
        

        <style>
                    body {
                            background-color:#FAFAFA;
                            color: #636b6f;
                            font-family: 'Raleway', sans-serif;
                            font-weight: bold;
                            height: 100vh;
                            margin: 0;
                        }
                    .q_logo {
                            
                            /* /* margin-left: 570px; */
                            width: 100px; 
                            /* flex-wrap: wrap; */
                            

                        }

                    hr {
                            border-color: orange;
                        }
                    label {
                        font-size: 15px;
                    }
                    .header {
                        display: flex;
                        background: #f78f1e;
                        flex-wrap: wrap;
                        margin-bottom: 100px;
                        justify-content: center;
                        height: 100px;
                    }
                    /* .alert-success {
                        
                        margin-bottom: 100px;
                        margin-left: auto;
                        margin-right: auto;
                        width: 50%;
                    } */
                    #applyBtn {
                        display: flex;
                        flex-wrap: wrap;
                        width: 100px;
                        justify-content: center;
                    }
                    .well {
                        border-color: #f78f1e;
                    }
                    

                    </style>
    </head>
    <body>


                        <div class = "header">
                         <img src="http://qcell.gm/themes/demo/assets/img/logo.jpg" alt="" class= "q_logo">
                        </div>


                    
                           
                             
                            <div class="container mt-5">
                                <div class="alert alert-info alert-dismissible" role="alert" style="background-color: #d9edf7; border-color: #bce8f1; color: #31708f;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <p id = "disclaimer">Please be informed that due to the high volume of applications we recieve, only shortlisted candidates will be contacted. Good Luck!</p>
                                </div>
                                <?php
                               if(isset($_SESSION['captcha_error'])){
                                //   print_r($_SESSION['captcha_error']);                

                                   echo '<div class="alert alert-danger alert-dismissible" role="alert">'.$_SESSION['captcha_error'].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <ul>';
                                     
                                    echo '</div>'; 
                                    unset($_SESSION['captcha_error']);
                                    $oldData = $_SESSION['old_data'];
                                    //unset($_SESSION['old_data']);
                                    


                               }
                                
                                if(isset($_SESSION['response_data'])){
                                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <ul>';
                                        
                                        foreach ($_SESSION['response_data'] as $key => $value) {
                                            echo "<li>" . $value[0] . "</li>";
                                        }
                                        //print_r($responseData);

                                        
                                    echo '</ul>
                                </div>';
                                }elseif(isset($_SESSION['acknowledgement'])){
                                   $acknowledgement= $_SESSION['acknowledgement'];
                                echo "<div class='alert alert-success' role='alert'style=\"text-align: center;\">$acknowledgement</div>" ;
                                unset($_SESSION['acknowledgement']);
                                }
                                
                                

                                ?>
                            
                            <div class="well">
                        <form class="" method="POST" action="process_file_upload.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-5 col-sm-12">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" class="form-control"name="full_name" placeholder="e.g Kebba Jasseh" value= "<?= $oldData['full_name']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-5 col-sm-12">
                                        <label for="Email">E-Mail</label>
                                        <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="e.g ali.salieu@aol.com" value= "<?= $oldData['email']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="DateOfBirth">Date of Birth</label>
                                        <input type="date" class="form-control" id="exampleInputPassword1" name="date_of_birth" placeholder="19/19/1996" value= "<?= $oldData['date_of_birth']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="Phone Number">Primary Mobile Number</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="mobile_number" placeholder="e.g 3333666" value= "<?= $oldData['mobile_number']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="Phone Number">Secondary Mobile Number</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="secondary_mobile" placeholder="e.g 3333333" value= "<?= $oldData['secondary_mobile']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-7 col-sm-12">
                                        <label for="Address">Address</label>
                                        <textarea class="form-control" name="address" placeholder="e.g 6 SWAT, Kairaba Road, KMC." required><?= $oldData['address']; ?></textarea>
                                    </div>
                                    
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="exampleInputFile">What is your Company of Interest?</label>
                                        <select name="company_of_interest" class="form-control" id="company"  required >
                                            <option value="">Select</option>
                                            <!-- <option value="<?= $oldData['company_of_interest']; ?>"><?= $companies['data']['company_of_interest']; ?></option> -->
                                           <?php
                                           
                                                $selected = '';
                                                foreach ($companies['data'] as $company) {
                                                    if($oldData['company_of_interest'] == $company['id']){
                                                        $selected = 'selected';
                                                        // break;
                                                    }
                                                    $name = $company['name'];
                                                    $id = $company['id'];
                                                    echo "<option value = '$id' $selected> $name</option>";
                                                    $selected = '';
                                                 } 
                                                
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="exampleInputFile">What is your highest qualification?</label>
                                        <select name="highest_qualification" class="form-control " id="highest_qualification" required>
                                            <option value="">Select</option>
                                            <?php
                                            if($oldData['highest_qualification']){
                                                $highestQualification = $oldData['highest_qualification'];
                                                echo "<option value=\"$highestQualification\" selected>$highestQualification</option>";
                                            }
                                            ?>
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
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="Certification">Field of work</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="e.g System Administrator" name="field_of_work" value= "<?= $oldData['field_of_work']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="exampleInputFile">What is your area of interest?</label>
                                        <select name="area_of_interest" class="form-control" id="department" required >
                                            <option value="">Select</option>
                                             <?php
                                                
                                                $selected = '';
                                                
                                                foreach ($departments['data'] as $department) {
                                                    if($oldData['area_of_interest'] == $department['id']){
                                                        $selected = 'selected';

                                                    }
                                                    $name = $department['name'];
                                                    $id = $department['id']; 
                                                    echo "<option value = '$id' $selected> $name </option>";
                                                    $selected = '';

                                                 } 
                                                
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label class="control-label"> Additional Comments (Cool Stuff you want us to know? :) </label>
                                        <textarea class="form-control" rows="8" name="additional_comments" value= "<?= $oldData['additional_comments']; ?>" ></textarea>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <label for="exampleInputFile"></label>
                                    <input type="file" id="exampleInputFile" name="cv_resume" value= "<?= $oldData['cv_resume']; ?>" required>
                                    <p class="help-block">Upload Your CV/Resume</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"></label>
                                    <input type="file" value= "<?= $oldData['support_docs1']; ?>" name="support_docs1">
                                    <p class="help-block">Supporting Documents(Optional)</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"></label>
                                    <input type="file" value= "<?= $oldData['support_docs2']; ?>" name="support_docs2">
                                    <p class="help-block">Supporting Documents(Optional)</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"></label>
                                    <input type="file" value= "<?= $oldData['support_docs3']; ?>" name="support_docs3" >
                                    <p class="help-block">Supporting Documents(Optional)</p>
                                    
                                </div>
                                    

                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree" required> Check to agree to our terms and conditions.
                                    </label>
                                    <div>
                                    <input type="text" name="captcha">

                                    
                                        <?php
                                            echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
                                            echo '<input type="hidden" name="captcha_hidden" value="'. $_SESSION['captcha']['code'] .'">'
                                        ?>
                                    </div>
                                    
                                    </div>

                                    <input type="submit" class="container btn btn-primary" name="upload" value="Apply" id = 'applyBtn'>
                                
                            </form>
                        </div>
                        </div/
                    </div>
    </body>
    </html>

 <!-- Scripts -->
    <script src="http://qcell.gm/themes/demo/assets/js/app.js"></script>
    <script src="http://qcell.gm/themes/demo/assets/js/script.js"></script>

    <!-- <script src="/modules/system/assets/js/framework.js"></script> -->
    <script src="/modules/system/assets/js/framework.extras.js"></script>
    <!-- <link rel="stylesheet" property="stylesheet" href="/modules/system/assets/css/framework.extras.css"> -->
    <script type="text/javascript">
        $( "#company" ).change(function() {

            var company = $('#company').val();
            
            //alert( "You have triggered a change event " + company );
            $.ajax({
                  method: "GET",
                  url: "get_data.php?company="+company,
                  //data: { name: "John", location: "Boston" }
                })
                  .done(function( msg ) {
                        // console.log(JSON.parse(msg));
                        var departments = JSON.parse(msg);
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