



<?php
include 'connection.php';
if(isset($_POST['Save']))
{


    $Firstname=$_POST['Firstname'];
   // var_dump($Firstname);
   // exit();
    $Lastname=$_POST['Lastname'];
    $Age=$_POST['Age'];
    $Gender=$_POST['Gender'];
    $Contactnumber=$_POST['Contactnumber'];
    $DOB=$_POST['DOB'];
    
   $Qualificationn=implode(',',$_POST['Qualification']);
   
   
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    
    $State=$_POST['State'];
    $Username=$_POST['Username'];
    
$qua=explode(',',$Qualificationn);// USE IN UPDATEPAGE TORETREIVE DATA AS SEPERATE SSLS,PG ETC


    $pic=$_FILES['f1']['name'];
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
     
    mysqli_query($con,"INSERT INTO `bootstrap_tb1`(`Firstname`, `Lastname`, `Age`, `Gender`, `Contactnumber`, `Qualification`, `DOB`, `Email`, `Password`, `State`, `Image`, `Username`) VALUES ('$Firstname','$Lastname','$Age','$Gender','$Contactnumber','$Qualificationn','$DOB','$Email','$Password','$State','$filenew','$Username')");
    mysqli_query($con,"INSERT INTO `login`( `Username`, `Password`,`type`) VALUES ('$Username','$Password', 'admin')");
}



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM  USING BOOTSTRAP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    

    <section class="h-100 h-custom" style="background-color: Orange;">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3>Registration Form</h3>

            <form method="POST" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="firstName" name="Firstname" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="lastName"  name="Lastname"class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">LastName</label>
                  </div>

                </div>
                <div class="form-outline">
                    <input type="number" id="age" name="Age" class="form-control form-control-lg" />
                    <label class="form-label" for="age">age</label>
                  </div>

              </div>
              <div class="col-md-6 mb-4">

<h6 class="mb-2 pb-1">Gender: </h6>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Gender" id="femaleGender"
    value="female" checked />
  <label class="form-check-label" for="femaleGender">Female</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Gender" id="maleGender"
    value="Male" />
  <label class="form-check-label" for="maleGender">Male</label>
</div>


</div>
<div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" name="Contactnumber" id="phoneNumber" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">contactNumber</label>
                  </div>

                </div>
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox"  name="Qualification[]" id="inlineCheckbox1" value="SSLC" />
  <label class="form-check-label" for="inlineCheckbox1">SSLC</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="Qualification[]" id="inlineCheckbox2" value="Graduation" />
  <label class="form-check-label" for="inlineCheckbox2">GRADUATION</label>
</div>
 
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="date"  name="DOB"class="form-control form-control-lg" id="birthdayDate" />
                    <label for="birthdayDate" class="form-label">DOB</label>
                  </div>

                </div>
               
                

              </div>

/              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="email" name="Email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" id="password" name="Password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">password</label>
                  </div>

                </div>

                
              </div>

              <div class="row">
                <div class="col-12">

                  <select class="select form-control-lg" name="State"> 
                    <option value="select your state" disabled>select your state</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Tamilnadu">Tamilnadu</option>
                    <option value="Karnadaka">Karnadaka</option>
                    <option value="Andra">Andra</option>
                  </select>
                  

                </div>
                                
              </div>
              <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="Username" name="Username" class="form-control form-control-lg" />
                    <label class="form-label" for="Username">Username</label>
                  </div>

                </div>

    <div>          
  
<div class="mb-3">
  <label for="formFile" class="form-label">Upload phto</label>
  <input class="form-control" type="file"  id="formFile" name="f1">
</div>
</div>

</div> 
</div>


              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" name="Save" />
              </div>
             </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

   </form>
      
  




  </body>
</html>