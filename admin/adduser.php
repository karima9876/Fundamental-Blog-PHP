<?php 
if(isset($_POST['save'])){
  include 'config.php';
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$user=mysqli_real_escape_string($conn,$_POST['user']);
// $password=mysqli_real_escape_string($conn,md5($_POST['password']));
 $password=mysqli_real_escape_string($conn,$_POST['password']);
$role=mysqli_real_escape_string($conn,$_POST['role']);

$query="SELECT username FROM users WHERE username='$user'";

$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);

if($count>0){
echo "Username already exists.";
}else{
$query1 ="INSERT INTO users(first_name,last_name,username,password,role)
VALUES('$fname','$lname','$user','$password','$role')";
//print_r($query1);
$result=mysqli_query($conn,$query1);

if($result){
  header("location:userlist.php");
}
}
}
?>
<?php  include "header.php";?>


        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New Users</h2>
               <div class="block copyblock"> 
                
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>First Name</label><br>
                                <input type="text" name="fname"  placeholder="Enter First Name..." class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Last Name</label><br>
                                <input type="text" name="lname"  placeholder="Enter Last  Name..." class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label><br>
                                <input type="text" name="user"  placeholder="Enter User Name..." class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label><br>
                                <input type="password" name="password"  placeholder="Enter User pass..." class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Role</label><br>
                                <select class="medium" name="role" >
                                    <option value="0">Moderator</option>
                                    <option value="1">Adnin</option>
                                    
                                </select> 
                                
                            </td>
                        </tr>
                        
                        <tr> 
                            <td>
                                <input type="submit" name="save" Value="Save" />
                            </td>
                        </tr>
                    </table>  
                    </form>
                </div>
            </div>
        </div>
        <?php  include "footer.php";?>

        

