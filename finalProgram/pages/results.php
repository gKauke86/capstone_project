<html>

<head>

 <title>Book Search Results</title>
 <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
 <script src="../vendors/js/bootstrap.bundle.min.js"></script>
 

</head>

<body>
<center>
<h2>Book Search Results</h2>
</center>





<?php

 // create short variable names

  $searchtype=$_POST['searchtype'];

 $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
echo "<center>";
echo 'You have not entered search details. Please go back and try again.';
 echo "<br />";

 echo "<a href='search.html' class='btn btn-info text-white' role='button'>BACK</a>";
echo"</center>";
 

 exit;

 }

 if (!get_magic_quotes_gpc()){

  $searchtype = addslashes($searchtype);

  $searchterm = addslashes($searchterm);

}

 @ $db = new mysqli('localhost', 'root', 'usbw', 'books');

  if (mysqli_connect_errno()) {

 echo 'Error: Could not connect to database. Please try again later.';

 exit;

  }

 $query = "select * from books where ".$searchtype." like '%".$searchterm."%'";

 $result = $db->query($query);

$num_results = $result->num_rows;
echo"<center>";
echo "<p>Number of books found: ".$num_results."</p>";

 for ($i=0; $i <$num_results; $i++) {

 $row = $result->fetch_assoc();

  echo "<p><strong>".($i+1).". Title: ";

 echo htmlspecialchars(stripslashes($row['title']));

 echo "</strong><br />Author: ";

 echo stripslashes($row['author']);

 echo "<br />ISBN: ";

 echo stripslashes($row['isbn']);

 echo "<br />Edition: ";

 echo stripslashes($row['edition']);
 echo "<br />Publication: ";

 echo stripslashes($row['publication']);

 echo "</p>";
echo "<br />";

 
 }
 

 echo "<a href='search.html' class='btn btn-info text-white' role='button'>BACK</a>";
echo"<center/>";

  

 $result->free();

 $db->close();

?>



</body>

</html>