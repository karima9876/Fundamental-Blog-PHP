<?php  include "header.php";?>


<?php
include "config.php";
    $id=$_SESSION['user_id'];
    $query="SELECT * FROM users WHERE user_id={$id}";
    $result=mysqli_query($conn,$query) or die("Query failed.");
    $row = mysqli_fetch_assoc($result); 


?>



        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>User Profile</h2>
               <div class="block copyblock">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                      <input type="hidden" name="user_id" value="" placeholder="">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>First Name</label><br>
                                <input type="text" value="<?php if(!empty( $row['first_name'])) echo $row['first_name'];?>" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Last Name</label><br>
                                <input type="text"   value="<?php if(!empty( $row['last_name'])) echo $row['last_name'];?>"  required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label><br>
                                <input type="text"  value="<?php if(!empty( $row['username'])) echo $row['username'];?>"    class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Role</label><br>
                                <input class="medium"  value="<?php if(!empty( $row['role'])) echo $row['role'];?>">
          
                          
                                
                                
                            </td>
                        </tr>
                        
                        <!-- <tr> 
                            <td>
                                <input type="submit" name="save" Value="Save" />
                            </td>
                        </tr> -->
                    </table>  
                    </form>
                </div>
            </div>
        </div>
        <?php  include "footer.php";?>

        

