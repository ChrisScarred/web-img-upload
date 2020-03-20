<?php
	$dir = 'setYourDirHere'
    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $exts = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($exts));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="Wrong file type";
      }
      
      if($file_size > 2097152){
         $errors[]='File must be smaller than 2MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$dir.$file_name);
         echo "file uploaded";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image"/>
         <input type="submit"/>
      </form>
      
   </body>
</html>