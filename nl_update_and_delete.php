<?php 
$title = "Update your info";
include "header.php";
?>
<h2><br><br>Update your information or unsubscribe from our newsletter</h2>


<?php
$email = $_GET['email'];
    include 'test_db.php';

    $result = mysqli_query($conn,
    "Select * from newsletter 
    where email = '$email' "); 

    $row = mysqli_fetch_array($result); 
?>

<form name = "buttons" method = "post" action = ""> 
    <input type = "submit" value = "Update" name = "upd">
    <input type = "submit" value = "Unsubscribe" name = "delete"> 
</form>

<?php
if (isset($_POST['upd']))
{
    ?> <h2>Update your information below</h2>

    <form name = "update" method = "post" action = "">
        <input type = "text" name = "fname" placeholder = "First name" value = "<?php echo $row['fname']; ?>"><br><br>
        <input type = "text" name = "lname" placeholder = "Last name" value = "<?php echo $row['lname']; ?>"><br><br>
        <input type = "text" name = "new_email" placeholder = "Email" required value = "<?php echo $row['email']; ?>"><br><br>
                                    
        <input type = "submit" value = "Update your info" name = "update"><br><br>
    </form> <?php

    if (isset($_POST['update']))
    {
    
    
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $new_email = $_POST['new_email'];
        $query = mysqli_query($conn, 
        "UPDATE newsletter 
        set fname = '$fname', lname = '$lname', email = '$new_email' 
        where email = '$email' "); 

        if ($query)
        {
            echo "<h2> Your information updated successfully. </h2>"; 
        }
        else 
        { 
            echo "Information not modified"; 
        }
    }  
} 
else if (isset($_POST['delete']))
{
    ?> <h2>Update your information below</h2>

    <form name = "delete" method = "post" action = "">
        <input type = "text" name = "new_email" placeholder = "Email" required value = "<?php echo $row['email']; ?>"><br><br>
        <input type = "submit" value = "Unsubscribe" name = "ubsub"><br><br>
    </form> <?php

    if (isset($_POST['unsub']))
    {
        $query = mysqli_query($conn, 
        "DELETE from studentinfo
        where email = '$email'");

        if ($query)
        {
            echo "<h2> You have successfully unsubscribed from our newsletter. </h2>"; 
        }
        else 
        { 
            echo "Information not modified"; 
        }
    }
    
    
}

?>