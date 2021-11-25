
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>View Books</title>
  <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
  <style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}
}
</style>
  
</head>
<body>


<?php
 $host = 'localhost';
  $user = 'root';
  $pass = 'usbw'; 
  $dbname = 'books';
   $conn = mysqli_connect($host, $user, $pass,$dbname); 
   if(!$conn){ 
   die('Could not connect: '.mysqli_connect_error());
    } //echo 'Connected successfully<br/>'; 
    $sql = 'SELECT * FROM books';
     $retval=mysqli_query($conn, $sql);
      if(mysqli_num_rows($retval) > 0){ 
      while($row = mysqli_fetch_assoc($retval)){ 
        echo"<center>";
        echo "ID :{$row['id']} <br> ".
      "ISBN : {$row['isbn']} <br> ". 
      "AUTHOR : {$row['author']} <br> ". 
      "TITLE : {$row['title']} <br> ". 
      "EDITION : {$row['edition']} <br> ". 
      "PUBLICATION : {$row['publication']} <br> ". 
      "--------------------<br>";
     
    
      
       } //end of while
        }else{ 
        echo "0 results"; 
       } 
       
      echo "<a href='search.html' class='btn btn-info text-white' role='button'>BACK</a>";
         echo"</center>";
       mysqli_close($conn);
  ?>
  


<script src="../vendors/js/bootstrap.bundle.min.js"></script>
</body>
</html>


