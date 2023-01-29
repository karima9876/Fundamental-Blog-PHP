<?php  include "header.php";?>

<?php
include "config.php";

if(isset($_GET['msgid']) && !empty($_GET['msgid'])){
    $id=$_GET['msgid'];
    $query="SELECT * FROM contact WHERE id={$id}";
    $result=mysqli_query($conn,$query) or die("Query failed.");
    $row = mysqli_fetch_assoc($result); 
}
?>




        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Reply Message</h2>



                <?php 
                if($_SERVER['REQUEST_METHOD']=='POST'){
$to=$_POST['toEmail'];
$from=$_POST['fromEmail'];
$subject=$_POST['subject'];
$body=$_POST['body'];
$sendmail=mail($to,$from,$subject,$body);
print_r($sendmail);
if($sendmail){
    echo "<span class='success'>Message sent successfull.</span>";
}else{

     echo "<span class='error'>Something went wrong.</span>";
}


                }





                ?>
               <div class="block copyblock">
               
                 <form method="POST">
                    <input type="hidden" name="id" value="" placeholder="">

                    <table>

                
                <tr>
                    <td>To:</td>
                    <td>
                    <input type="email" readonly name="toEmail" value="<?php if(!empty( $row['email'])) echo $row['email'];?>" placeholder="Enter Email Address" required="1"/>
                    </td>
                </tr>
                <tr>
                    <td>From:</td>
                    <td>
                    <input type="email" name="fromEmail" placeholder="Enter Email Address" required="1"/>
                    </td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td>
                    <input type="text" name="subject" placeholder="Enter Your Subject" required="1"/>
                    </td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td>
                    <textarea name="body"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <input type="submit" name="submit" value="Send"/>
                    </td>
                </tr>
        </table>
                    </form>
                    <?php
              //   }
              // }
              ?>
                    </div>
            </div>
        </div>
                 <?php  include "footer.php";?>