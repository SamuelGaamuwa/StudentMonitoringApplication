<?php
    include 'DefaultPage.php';
    //capture information attained in the form
    if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['sex'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $sex = $_POST['sex'];
        //check if all fields are filled 
        if(!empty($fname)&&!empty($lname)&&!empty($sex)){
            echo 'successful again ';
        }
        else{
            echo'please enter fill all the fields';
        }
    }
    else{
        echo'there is something lacking';
    }

    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = 'samuel1234';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    //check if the connection is active 
    if(!$conn){
        die('Could not connect: '.mysql_error());
    }
    echo 'Successfuly connected';
    mysql_close($conn);
     
    
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" role="form">
            <div class="form-group" >
                Enter the details of the student
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
                <label for="fname">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
            </div>
            <div class="radio">
                <label class="checkbox-inline">
                    <input type="radio" name="sex" value="male"> Male
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="sex" value="female"> Female
                </label>
            </div>
            <input type="submit" value="Submit">
        </form>
        <script type="text/javascript">
            window.onload = function () {
                $('#student').addClass('active');
            };
        </script>
        </div>
    </body>
</html>
