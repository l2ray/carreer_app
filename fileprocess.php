 <?php
 $cv_resume = "";
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
                        $fileNameNew = str_replace(' ','-',strtolower($fullname)) . '-' . $mobileNumber . '-cv-' . date('Ymd') . '.' . $fileActualExt; 
                        
                        $fileDestination = 'admin\\storage\\app\\public\\cv_docs\\'. $fileNameNew;
                       
                       move_uploaded_file( $fileTmpName,$fileDestination);

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


?>