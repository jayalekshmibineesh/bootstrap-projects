<?php
include 'connection.php';
$data=mysqli_query($con, "SELECT * FROM `bootstrap_tb1`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        table,tr,th,td
        {
            border: 2px solid black;
            border-collapse:collapse;
        }
        table
        {
          background-color:Orange
        }
    </style>

</head>
<body >
    <table>


    <tr>
     <th>Firstname</th>
     <th>Lastname</th>
     <th>Age</th>
     <th>Gender</th>
     <th>Contactnumber </th>
     <th>Qualification</th>
     <th>DOB</th>
     <th>Email</th>
     <th>password></th>
     <th>State</th>
     <th>Image</th>
     <th>$Username</th>
    </tr>
    <?php
    while($row=mysqli_fetch_assoc($data))
    {
        ?>
        <tr><td><?php echo $row['Firstname'] ; ?></td>

        <td><?php echo $row['Lastname'];?></td> 
        
        <td><?php echo $row['Age'];?></td>
        
        <td><?php echo $row['Gender'];?></td>
        
        <td><?php echo $row['Contactnumber'];?></td>
               
        <td><?php echo $row['Qualification'];?></td>
 
        <td><?php echo $row['DOB'];?></td>
        
        <td><?php echo $row['Email'];?></td>
        
        <td><?php echo $row['Password'];?></td>
               
        <td><?php echo $row['State'];?></td>

        <td><img src="./images/<?php echo $row['Image'];?>" height="50" width="50" alt="image not found">></td>
        
        <td><?php echo $row['Username'];?></td>
        <td><a href="delete.php?id=<?php echo $row['id']?>">delete</a></td>
<!--       to edit  the table data -->
        <td><a href="updateboot1.php?id=<?php echo $row['id']?>">edit</a></td>
        </tr>
    <?php    
    }
  
    ?>
    
    
    </table>
</body>
</html>