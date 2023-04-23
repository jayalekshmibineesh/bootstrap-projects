<?php
include 'connection.php';
$id1=$_GET['id'];
$data=mysqli_query($con,"select * from bootstrap_tb1 where id='$id1'");
$row=mysqli_fetch_assoc($data);

$Gender=$row['Gender'];

$Qualificationn=$row['Qualification'];
$Qua=explode(',',$Qualificationn); 

if(isset($_POST['Save']))
{
    $Firstname=$_POST['Firstname'];
    $Lastname=$_POST['Lastname'];
    $Age=$_POST['Age'];
   // $Gender=$_POST['Gender'];
     $Contactnumberr=$_POST['Contactnumber'];
     $DOB=$_POST['DOB'];
    $Qualificationn=implode(',',$_POST['Qualification']);
    //  $Qualificationn=$_POST['Qualification[]'];
//     $Qualificationn=$row['Qualification'];
// $Qua=explode(',',$Qualificationn); 

    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    
    $State=$_POST['State'];
    $Username=$_POST['Username'];
 $pic=$_FILES['f1']['name'];
    if($pic!="")
    {

      $filearray=pathinfo($_FILES['f1']['name']);
      $file1=rand();
      $file_ext=$filearray["extension"];
      $filenew=$file1.".".$file_ext;
      move_uploaded_file($_FILES['f1']['tmp_name'],"images/".$filenew);
    }

    mysqli_query($con,"UPDATE`bootstrap_tb1`SET`FirstName`='$Firstname',`Lastname`='$Lastname',`Age`='$Age',`Gender`='$Gender',`Contactnumber`='$Contactnumberr',`DOB`='$DOB',`Qualification`='$Qualificationn',`Email`='$Email',`Password`='$Password',`State`='$State',`Image`='$filenew',`Username`='$Username' WHERE id='$id1'");
    mysqli_query($con,"UPDATE`login` SET`Username` ='$Username',`Password`='$Password' ,`type`='admin' where id='$id1'");
    echo"<script> alert('UPDATED successfully')</script>" ;
    echo" <script> window.location.href-'viewboot1.php';  </script>";

}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM EDIT  BOOTSTRAP</title>

            <form method="POST" enctype="multipart/form-data"> <!--to upload image enctype=multipart/form-data-->

                   <table>
                    <tr><td>Firstname</td>
                   <td> <input type="text"  name="Firstname"  value=<?php echo $row['Firstname'];?>> /></td>
                 
                 <tr>  <td> LastName</td>
                    <td><input type="text" id="LastName"  name="Lastname" value=<?php echo $row['Lastname'];?>></td>
                      
                    </tr>
                   <tr> <td> Age</td>
                    <td><input type="number" id="Age" name="Age" value=<?php echo $row['Age'];?>  /></td>                      
                    </tr>
 <tr><td>Gender</td>
   <td><input type="radio" name="Gender"   value='Female'<?php if($Gender=='Female') echo 'checked="checked"'?>>Female 
        
   <input type="radio" name="Gender" value='Male'<?php if($Gender=='Male') echo 'checked="checked"'?>>male</td>
   </tr> 
   <tr><td>Contactnumber</td>           
  <td><input type="text" name="Contactnumber"value=<?php echo $row['Contactnumber'];?> /></td>
  </tr>   
<tr><td>$Qualificationn</td>
 <td><input type="checkbox" name="Qualification[]" value='SSLC'<?php if(in_array("SSLC",$Qua)){echo "checked";}?>>SSLC 
 
 <input type="checkbox" name="Qualification[]" value='Graduation'<?php if(in_array("Graduation",$Qua)){echo "checked";}?>>Graduation </td>
</tr>
<tr><td>Date of birth</td>
<td>  <input type="date"  name="DOB" value=<?php echo $row['DOB'];?>/></td>
</tr>
<tr> <td>Email</td>  
<td>  <input type="email"  name="Email" value=<?php echo $row['Email'];?> /></td>
</tr>
<tr><td> Password</td>
<td>  <input type="text" name="Password"value=<?php echo $row['Password'];?> /></td> 
</tr>
<tr><td> State</td>
 <td> <select  name="State" value> 
    <option value="select your state" disabled>select your state</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Tamilnadu">Tamilnadu</option>
                    <option value="Karnadaka">Karnadaka</option>
                    <option value="Andra">Andra</option>
                  </select></td>
  </tr>                
                  
 <tr><td>$Username</td>
  <td><input type="text" name="Username"value=<?php echo $row['Username'];?>> </td>   
  </tr>
 
 <tr><td>Upload Image</td>
  <td> <input type="file" name="f1" value=<img src="./images/<?php echo $row['Image'];?>"  height="20"  width="20" alt="img notfound">></td> 
  </tr>
</table>

             <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" name="Save" />
</form>
  </body>
</html>        