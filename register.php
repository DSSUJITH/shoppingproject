<?php
include 'config.php';
include 'header.php';

?>
<?php
if(isset($_REQUEST['save']))
{
	//start of of varibale and value setting
	$name  = $_REQUEST['name'];
	$mobileno = $_REQUEST['mobileno'];
	$password   = $_REQUEST['password'];
  $cpassword   = $_REQUEST['cpassword'];
  $duplicate =mysqli_query($conn,"SELECT * FROM `register` WHERE name='$name'");
  if(mysqli_num_rows($duplicate)>0){
    echo"<script>alert('already taken');</script>";
  }
  else{
    if($password == $cpassword)
      {
	     $query = "INSERT INTO `register`( `name`, `mobileno`, `password`) VALUES ('$name','$mobileno','$password')";  
       mysqli_query($conn,$query);
       echo"<script>alert('register successful');</script>";
      }
      else
      {
        echo"<script>alert('pass not matched');</script>";
      }
  
    }
  
}
?>
<form method="post">
  <!-- start of updataion of the form field and database fields-->
                  
  <table class="table table-striped table-bordered table-hover">
  <tr>
  <td align="right"><b>name</b></td>
  <td>
   <input type="text" name="name" id="name" class="form-control"  placeholder="Name" required="required" autofocus="autofocus">
  </td>
  </tr>
  <tr>
  <td align="right"><b>mobileno</b></td>
  <td>
  <input type="number" name="mobileno" class="form-control"   required="required">
  </td>
  </tr>
  <tr>
  <td align="right"><b>password<b></td>
  <td>
   <input type="password" name="password" class="form-control"  required="required">
   </td>
  </tr>
  <tr>
  <td align="right"><b>conformpassword<b></td>
  <td>
   <input type="password" name="cpassword" class="form-control"  required="required">
   </td>
  </tr>
  <tr>
  <td colspan="2" align="center">
  
    <button type="submit" class="btn btn-success" name="save" >Save</button>
    
  </td>
  </tr>
  <tr>
  <td colspan="2" align="center">
  
    Already have aaccount&nbsp<a href="login.php"> login</a>
    
  </td>
  </tr>
  </table>
  </form>
  <?php
  include 'foter.php';
  ?>