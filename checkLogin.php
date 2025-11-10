<?php @session_start();
$a=$_REQUEST["txtUser"];
$b=$_REQUEST["txtPassword"];

include("dbconnect.php");

$rscust=mysqli_query($con,"select * from customer_info where user_name='$a'");

if(mysqli_num_rows($rscust)==0)
{
    header("location:LoginForm.php?resmsg=1");
}
else 
{
      $row=mysqli_fetch_array($rscust);
      if($row["user_pass"]==$b)
      {
             $_SESSION["uname"]=$a;
             if($row["user_type"]=="admin")
             {
                $_SESSION["utype"]="admin";
                header("location:adminChoice.php");
             }
             else 
             {
                $_SESSION["utype"]="user";
                header("location:userChoice.php");
             }
      }
      else 
      {
         header("location:LoginForm.php?resmsg=2");
      }
}

?>