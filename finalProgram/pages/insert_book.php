<html>

<head>
 <title> Book Entry Results</title>
 <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
<script src="../vendors/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<center>
<h2> Book Entry Results</h2>
</center>



 
<?php

// create short variable names

$isbn=$_POST['isbn'];

 $author=$_POST['author'];

 $title=$_POST['title'];

 $edition=$_POST['edition'];
 $publication=$_POST['publication'];

  if (!$isbn || !$author || !$title || !$edition || !$publication) {
   echo"<center>";
   echo "You have not entered all the required details.Please try again";
  
   echo "<br/>";
   echo "<br/>";
   echo "<a href='search.html' class='btn btn-info text-white' role='button'>BACK</a>";
  


 exit;

 }

 if ( ! get_magic_quotes_gpc() ) {

  $isbn = addslashes($isbn);

  $author = addslashes($author);

 $title = addslashes($title);

 $edition = addslashes($edition);
 $publication = addslashes($publication);

 }

 @ $db = new mysqli('localhost', 'root', 'usbw', 'books');

 if(mysqli_connect_errno()) {

 echo "Error: Could not connect to database.  Please try again later.";
 echo "<br/>";
 echo "<br/>";
 echo "<a href='search.html' class='btn btn-info text-white' role='button'>BACK</a>";
 exit;

  }

  $query = "insert into books(isbn,author,title,edition,publication) values

 ('".$isbn."', '".$author."', '".$title."', '".$edition."','".$publication."' )";

 $result = $db->query($query);

  if ($result) {

  
    echo"<center>";
   echo  $db->affected_rows." book inserted into database.";
   echo "<br/>";
   echo "<br/>";
   echo "<a href='search.html' class='btn btn-info text-white' role='button'>BACK</a>";
 echo"<center/>";
 } else {

 echo "An error has occurred. The item was not added.";
   
   
  }


 $db->close();

?>


</body>

</html>