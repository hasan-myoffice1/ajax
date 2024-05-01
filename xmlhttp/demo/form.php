<?php
   $serverName = "localhost";
   $userName = "root";
   $password = '';
   $dbName = 'users';

   $connection = new mysqli($serverName, $userName, $password, $dbName);

   // check connection
   // if(!$connection){
   //     die("connection failed" . mysqli_connect_error($connection));
   // }
   // echo "connection successful";
   

   // $sql = "SELECT * FROM customer WHERE ID = 1";
   // $query = mysqli_query($connection, $sql);
   
   if ($connection->connect_error){
      exit("Could not connect");
   }
   
   $sql = "SELECT * FROM customer WHERE ID = ?";
   
   $stmt = $connection->prepare($sql);
   $stmt->bind_param("s",$_GET['q']);
   $stmt-> execute();
   $stmt->store_result();
   $stmt->bind_result($id, $name, $email, $address, $phoneNum);
   $stmt->fetch();
   $stmt->close();

   echo "<table>";
   echo "<tr>";
   echo "<th>CustomerID</th>";
   echo "<td>" . $id . "</td>";
   echo "<th>Name</th>";
   echo "<td>" . $name . "</td>";
   echo "<th>Email</th>";
   echo "<td>" . $email . "</td>";
   echo "<th>Address</th>";
   echo "<td>" . $address . "</td>";
   echo "<th>Phone NUmber</th>";
   echo "<td>" . $phoneNum . "</td>";
?>