<?php
include 'config.php';
include 'header.php';
include 'foter.php';
?>
<?php
if(isset($_REQUEST['save']))
{
    $name=$_POST["name"];
    $password=$_POST["password"];    
    
       $sql="SELECT `name`,`password` FROM `register` WHERE  name='$name' ";
       //echo $sql;
       $result = mysqli_query($conn, $sql);
       $data = mysqli_fetch_assoc($result);
       if(mysqli_num_rows($result)>0){
        if($password ==$data["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$data["id"];
            echo"<script>location='home.php'</script>";
           


        }
        else{
            echo"<script>alert('wrong password');</script>";
        }

       }
       else{
        echo"<script>alert('user not registered');</script>";
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
  <td align="right"><b>password<b></td>
  <td>
   <input type="password" name="password" class="form-control"  required="required">
   </td>
  </tr>  
  <tr>
  <td colspan="2" align="center">
  
    <button type="submit" class="btn btn-success" name="save" >login</button>
    
  </td>
  </tr>
  <tr>
  <td colspan="2" align="center">
  
    Don't have an account&nbsp<a href="register.php"> Register</a>
    
  </td>
  </tr>
  </table>
  </form>
  <?php
  include 'foter.php';
  ?>