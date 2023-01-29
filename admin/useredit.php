<?php
include "config.php";

if(isset($_POST['submit'])){

//print_r($_POST['submit']);
$user_id=mysqli_real_escape_string($conn,$_POST['user_id']);
$fname=mysqli_real_escape_string($conn,$_POST['f_name']);
$lname=mysqli_real_escape_string($conn,$_POST['l_name']);
$user=mysqli_real_escape_string($conn,$_POST['username']);
$role=mysqli_real_escape_string($conn,$_POST['role']);
$query1="UPDATE users SET 

first_name='{$fname}',
last_name='{$lname}',
username='{$user}',
role='{$role}' WHERE user_id ='{$user_id}'";
$result1=mysqli_query($conn,$query1) or die("Query failed.");
if($result1){
  header("location:userlist.php");
}


}
?>

<?php  include "header.php";?>


        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>USER EDIT</h2>
               <div class="block copyblock">
               <?php

$user_id=$_GET['id'];
include 'config.php';
$query="SELECT * FROM users WHERE user_id={$user_id}";
$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);
if($count>0){
while ($row = mysqli_fetch_assoc($result)) { 

 ?> 
                 <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>" placeholder="">

                    <table class="form">                    
                        <tr>
                            <td>
                                <label>First Name</label><br>

                                <input type="text" name="f_name" value="<?php echo $row['first_name']; ?>" placeholder="" required>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Last Name</label><br>
                                <input type="text" name="l_name" value="<?php echo $row['last_name']?>"  placeholder="Enter Last  Name..." class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label><br>
                                <input type="text" name="username" value="<?php echo $row['username']?>"   placeholder="Enter User Name..." class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label><br>
                                <input type="password" name="password" value="<?php echo $row['password']?>"  placeholder="Enter User pass..." class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Role</label><br>
                                    <select class="medium" name="role" value="<?php echo $row['role']; ?>">
<?php
if($row['role']==1){
echo "<option value='0'>Moderator</option>";
echo "<option value='1' selected >Admin</option>";
}else{
echo "<option value='0' selected >Moderator</option>";
echo "<option value='1'>Admin</option>";
}
?> 
                        
                          </select>
                                
                            </td>
                        </tr>
                        
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                }
              }
              ?>
                    </div>
            </div>
        </div>
                 <?php  include "footer.php";?>