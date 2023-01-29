





<?php
include "config.php";

if(isset($_POST['submit'])){

//print_r($_POST['submit']);
$tid=1;
$title=mysqli_real_escape_string($conn,$_POST['title']);
$slogan=mysqli_real_escape_string($conn,$_POST['slogan']);
$query1="UPDATE slo SET 

title='{$title}',
slogan='{$slogan}' WHERE tid ='{$tid}'";
$result1=mysqli_query($conn,$query1) or die("Query failed.");
if($result1){
   header("location:titleslogan.php");
}


}
?>


<?php  include "header.php";?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">  

                <?php

$tid=1;
//print_r($tid);
include 'config.php';
$query="SELECT * FROM slo limit 1";
$result=mysqli_query($conn,$query) or die("Query failed.");
$row = mysqli_fetch_assoc($result);
 

 ?>              
                 <form action="titleslogan.php" method="POST">
                    
                     <input type="hidden" name="tid" value="<?php if(!empty($row['tid'])) echo $row['tid']; ?>" placeholder="">

                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Title..."  name="title" value="<?php echo $row['title']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Slogan..." name="slogan" value="<?php echo $row['slogan']; ?>" class="medium" />
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