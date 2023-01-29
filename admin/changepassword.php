<?php  include "header.php";?>
<?php 
if(isset($_POST['submit'])){
include 'config.php';

$username=$_SESSION['username'];
$Old=$_POST['old'];
$New=$_POST['pass1'];
$Con=$_POST['pass2'];
$query="SELECT username,password FROM users WHERE username='$username' AND password='$Old'";
$result=mysqli_query($conn,$query);
$count=mysqli_fetch_array($result);
if($count>0){

    if($New==$Con){
        $query1="UPDATE users SET password='$New' WHERE username='$username'";
        $result=mysqli_query($conn,$query1);
        $_SESSION['msg1']="Password Change Successfully";
    }else{
        $_SESSION['msg1']="New Password and Confirm Password does not match";
    }

}else{
    $_SESSION['msg1']="Password does not match";

}
}
?>





        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block"> 
                <p style="color:red;"><?php if(!empty($_SESSION['msg1'])) echo $_SESSION['msg1'];?><?php  if(!empty($_SESSION['msg1'])) $_SESSION['msg1']="";?></p>          
                 <form action="" method="post" onSubmit="return valid();">
                    <table class="form">	
                    		
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="old" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>

                                <input type="password" placeholder="Enter New Password..." name="pass1" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Confirm Password</label>
                            </td>
                            <td>
                                
                                <input type="password" placeholder="Enter Confirm Password..." name="pass2" class="medium" />
                            </td>
                        </tr>
                         
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
            </div>
        </div>
                <?php  include "footer.php";?>