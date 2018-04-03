<?php  
session_start();
 if($_FILES['file']['name'] != '')  
 {  
     $name=$_FILES['file']['name'];
     $name=explode(".", $name);
     $extension = end($name);
     echo "<script>alert(".$extension.");</script>";  
     $allowed_type = array("jpg");  
      if(in_array($extension, $allowed_type))  
      {  
           $new_name = $_SESSION['regno'].".". $extension;  
           $path = "img/std_img/". $new_name;  
           if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
           {  
                echo "<script>
                        alert(\"Image Uploaded Sucessfully\");
                    </script>";  
           }  
      }  
      else  
      {  
           echo '<script>alert("Invalid File Format,Use \'.jpg\' extension only")</script>';  
      }  
 }  
 else  
 {  
      echo '<script>alert("Please Select File")</script>';  
 }
 ?>  