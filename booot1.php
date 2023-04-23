<?php
include 'connection.php';
if(isset($_POST['Save']))
{


    $Firstname=$_POST['Fname'];
   // var_dump($Firstname);
   // exit();
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $pic=$_FILES['f1']['name'];
   // var_dump($pic);
      //exit();
    if($pic!="")
    {

      $filearray=pathinfo($_FILES['f1']['name']);
      $file1=rand();
      $file_ext=$filearray["extension"];
      $filenew=$file1.".".$file_ext;
      move_uploaded_file($_FILES['f1']['tmp_name'],"images/".$filenew);


    }
    else
    {
       echo"<script> alert('try again please')</script>";
    }
     
    mysqli_query($con,"INSERT INTO `bt1`( `Fname`, `Username`, `Password`, `Image`) VALUES ('$Firstname','$Username','$Password','$filenew')");
    mysqli_query($con,"INSERT INTO `login`( `Username`, `Password`,`type`) VALUES ('$Username','$Password', 'admin')");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <!-- Navbar content -->


  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
         </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<form method="POST"enctype="multipart/form-data">
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm" >Firstname</span>
  <input type="text"name="Fname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>



<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm" >Username</span>
  <input type="text"name="Username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>

<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm" >Password</span>
  <input type="text" name="Password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">upload file</label>
  <input class="form-control" type="file" id="image" name="Image">
</div>
<div>
<input class="btn btn-primary" type="submit" name="Save">
</div>
</Form>         
</body>
</html>