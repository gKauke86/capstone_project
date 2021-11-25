<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Display Books</title>
	<link rel="stylesheet" href="../vendors/css/bootstrap.min.css">

	<style type="">
		table{
//border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
		}
		th{
			background-color:#d96459;
			color: white;
		}
		tr:nth-child(even){
background-color: #f2f2f2;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<th>ID</th>
		<th>ISBN</th>
		<th>AUTHOR</th>
		<th>TITLE</th>
		<th>EDITION</th>
		<th>PUBLICATION</th>
	</tr>
	<?php
  $host = 'localhost';
  $user = 'root';
  $pass = 'usbw'; 
  $dbname = 'books';
   $conn = mysqli_connect($host, $user, $pass,$dbname); 
   if ($conn-> connect_error){
   	die("Connection failed:". $conn-> connect_error);
   }

$sql = "SELECT id, isbn, author, title, edition, publication FROM books";
$result = $conn-> query($sql);

if ($result-> num_rows > 0){
	while ($row =$result-> fetch_assoc()){
	echo "<tr><td>". $row["id"] . "</td><td>". $row["isbn"] . "</td><td>" .$row["author"]. "</td><td>" .$row["title"]. "</td><td>".$row["edition"] ."</td><td>".$row["publication"] . "<tr><td>";
	}
  echo"</table>";
  }
else{
	echo "0 result";
	
}

$conn-> close();
?>
<br>
<br>
<center> <a href="home.html" class="btn btn-primary">Back</a></center>
</table>


<script src="../vendors/js/bootstrap.bundle.min.js"></script>
</body>
</html>