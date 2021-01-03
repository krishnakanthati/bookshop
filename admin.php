
<?php
error_reporting(0); 
?> 
<?php
  $msg = ""; 
  
  // If upload button is clicked ... 
  if (isset($_POST['upload'])) { 
    $filename = "";
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "books/".$filename; 
          
    $db = mysqli_connect("localhost", "root", "", "bookshop"); 
  
        // Get all the submitted data from the form 
        $sql = "INSERT INTO image (filename) VALUES ('$filename')"; 
  
        // Execute query 
        mysqli_query($db, $sql); 
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 
  } 
  $result = mysqli_query($db, "SELECT * FROM image");
?> 
  
<!DOCTYPE html> 
<html> 
<head> 
<title>Image Upload</title> 
<style>
table, th, td {
  border: 2px solid black;
  padding: 5px;
}
td {
  padding:15px;
}
table {
  border-spacing: 0 15px;
  border-collapse: collapse;
}
</style>

</head>
<div id="content"> 
  
  <form method="POST" action="" enctype="multipart/form-data"> 
      <input type="file" name="uploadfile" value=""/> 
      <button type="submit" name="upload">UPLOAD</button> 

<table style="width:100%" class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>
                     <tr><td>

 <?php  
                $query = "SELECT * FROM image ORDER BY id DESC";  
                $result = mysqli_query($db, $query);
                while($row = mysqli_fetch_array($result))  
                {  

                      $image = 'books/'.$row['filename'];
                     echo "<img height='300' width='220' class='img-thumnail' src=$image >";



                }
                ?></td>

 
                     </tr>
                </table>  
  </form> 
</div>

</body> 
</html> 
