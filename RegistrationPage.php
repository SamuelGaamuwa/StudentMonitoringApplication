<?php
    include 'DefaultPage.php';
    //capture information attained in the form
    if(isset($_POST['stnum'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['sex'])){
        $stnum = $_POST['stnum'];
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
        echo'there is something lacking'."\n";
    }

    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = 'samuel1234';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    //check if the connection is active 
    if(!$conn){
        die('Could not connect: '.mysql_error());
    }
    echo 'Successfuly connected'."\n";
    //statement to push values from the form to the database, not working though, syntax error
    $sql = "INSERT INTO students ".
           "(idStudents, FirstName, LastName, Sex) ".
           "VALUES ( $stnum, $fname, $lname, $sex)";
    mysql_select_db('sma_db');
    $retval = mysql_query($sql, $conn);
    if(!$retval){
        die('could not enter data: '.mysql_error()."\n");
    }
    echo 'Entered successfully';
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
                <label for="stnum">Student Number</label>
                <input type="number" class="form-control" name="stnum" placeholder="212******"><br>
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter First Name"><br>
                <label for="fname">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name"><br>
                <!-- include a subjects form group but with only the optional subjects, compulsory ones will be fixed for each sutdent thus not chosen-->
            </div>
            <div class="radio">
                <label class="checkbox-inline">
                    <input type="radio" name="sex" value="male"> Male
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="sex" value="female"> Female
                </label>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select class="form-control" name="class">
                    <option value="S6">S6</option>
                    <option value="S5">S5</option>
                    <option value="S4">S4</option>
                    <option value="S3">S3</option>
                    <option value="S2">S2</option>
                    <option value="S1">S1</option>
                </select>
            </div>
            <div class="form-group">
                <label for="optional">Optional Subjects</label>
                <select class="form-control" multiple="multiple" name="optional">
                    <option value="ee">Electricity and Electronics</option>
                    <option value="cre">Christian Religious Education</option>
                    <option value="comm">Commerce</option>
                    <option value="ent">Entrepreneurship</option>
                    <option value="ww">WoodWork</option>
                    <option value="acc">Accounts</option>
                </select>
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
