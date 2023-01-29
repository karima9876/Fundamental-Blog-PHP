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
                <h2>View Message</h2>
                
               <div class="block copyblock">
               
                 <!-- <form method="post" action="inbox.php"> -->
                 <form>
                    <input type="hidden" name="id" value="" placeholder="">

                    <table>
                <tr>
                    <td>Name:</td>
                    <td>
                    <input type="text" readonly value="<?php if(!empty( $row['firstname'])) echo $row['firstname']; if(!empty( $row['lastname'])) echo $row['lastname'];?>"  placeholder="Enter first name" required="1"/>
                    </td>
                </tr>


                
                <tr>
                    <td>Email:</td>
                    <td>
                    <input type="email" readonly value="<?php if(!empty( $row['email'])) echo $row['email'];?>" placeholder="Enter Email Address" required="1"/>
                    </td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>
                    <input type="text" readonly value="<?php if(!empty( $row['date'])) echo $row['date'];?>" placeholder="Enter Email Address" required="1"/>
                    </td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td>
                    <textarea readonly name="body"><?php if(!empty($row['body'])) echo $row['body'];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <input type="button" onclick="goBack()" value="Ok"/>
                    </td>
                </tr>
        </table>
                    </form>
                    
                    </div>
            </div>
        </div>
        <script>
        function goBack() {
          window.history.back();
        }
        </script>
                 <?php  include "footer.php";?>