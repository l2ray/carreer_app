<?php
session_start();
// $error = array($nameErr, $mobileNumberErr, )
$fullname = $email = $dateOfBirth = $mobileNumber = $address = $highestQualification = $fieldOfWork = $areaOfInterest = $additionalComments = $agree = $cv_resume = "";
   if (array_key_exists('upload', $_POST)) {
       $fullname = test_input($_POST["full_name"]);
       if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
           $nameErr = "Error in Full-Name: Only letters and white space allowed.";
           echo $nameErr;
           exit();
       }
       $email = test_input($_POST["email"]);
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $emailErr = "Invalid email format";
           echo $emailErr;
           exit();
       }
       $dateOfBirth = test_input($_POST["date_of_birth"]);
       $mobileNumber = test_input($_POST["mobile_number"]);
       if (!preg_match("/^[2,3,6,7,9]\d{6}$/", $mobileNumber)) {
           $mobileNumberErr = "Invalid Number";
           echo $mobileNumberErr;
           exit();
       }
       $address = test_input($_POST["address"]);
       $highestQualification = test_input($_POST["highest_qualification"]);
       $fieldOfWork = test_input($_POST["field_of_work"]);
       $areaOfInterest = test_input($_POST["area_of_interest"]);
       $additionalComments = test_input($_POST["additional_comments"]);
       $agree = test_input($_POST["agree"]);
       // $cv_resume = test_input($_POST["cv_resume"]);
       if (isset($_FILES['cv_resume'])) {
           $file = $_FILES['cv_resume'];

           $fileName = $file['name'];

           $fileTmpName = $file['tmp_name'];
           // die($fileName);
           $fileError = $file['error'];
           $fileSize = $file['size'];

           $fileExt = explode('.', $fileName);
           $fileActualExt = strtolower(end($fileExt));
           // die($fileActualExt);

           $allowed = ['jpg', 'jpeg', 'pdf', 'docx'];

           if (in_array($fileActualExt, $allowed)) {
               if ($fileError === 0) {
                   if ($fileSize < 8000000) {
                       $fileNameNew = str_replace(' ', '-', strtolower($fullname)) . '-' . $mobileNumber . '-cv-' . date('Ymd') . '.' . $fileActualExt;

                       $fileDestination = 'admin\\storage\\app\\public\\cv_docs\\'. $fileNameNew;

                       move_uploaded_file($fileTmpName, $fileDestination);
                   } else {
                       echo "File is too big";
                       exit();
                   }
               } else {
                   echo "Error in file upload";
                   exit();
               }
           } else {
               echo "Wrong File Format";
               exit();
           }
       }

       echo $_POST["full_name"] . "<h4>";
       echo $_POST["email"] . "<h4>";
       echo $_POST["date_of_birth"] . "<h4>";
       echo $_POST["mobile_number"] . "<h4>";
       echo $_POST["address"] . "<h4>";
       echo $_POST["highest_qualification"] . "<h4>";
       echo $_POST["field_of_work"] . "<h4>";
       echo $_POST["area_of_interest"] . "<h4>";
       echo $_POST["additional_comments"] . "<h4>";
       echo $_POST["agree"] . "<h4>";
//    echo $_POST["cv_resume"] . "<h4>";
   } else {
       echo "You have not submitted the form";
   }

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$servername = "localhost";
$username = "dev";
$password = "Dev@123j";

try {
    $conn = new PDO("mysql:host=$servername;dbname=application_form", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $stmt = $conn->prepare("INSERT INTO applications (`full_name`, email, date_of_birth, mobile_number, `address`, highest_qualification, field_of_work, area_of_interest, comments, cv_resume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fullname, $email, $dateOfBirth, $mobileNumber, $address, $highestQualification, $fieldOfWork, $areaOfInterest, $additionalComments, $fileNameNew]);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



   $_SESSION['acknowledgement'] = 'Thank You for submitting your application.';
  header('Location: ' . $_SERVER['HTTP_REFERER']);
