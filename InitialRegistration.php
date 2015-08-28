<?php
    if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['cpassword'])&&isset($_POST['sex'])&&isset($_POST['instance'])){
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $username = $_POST['username'];
       $password = $_POST['password'];
       $cpassword = $_POST['cpassword'];
       $sex = $_POST['sex'];
       $instance = $_POST['instance'];

       if($password!=$cpassword){
           die('the passwords do not match');
       }
   }
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'samuel1234';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   //check if the connection is active
   if(!$conn){
       die('Could not connect: '.mysql_error());
   }
   $sql = 'CREATE DATABASE sma_db';
   //function to decide if the person is a teacher or a parent 
   function select(){
       if($instance=='teacher'){
           echo'teachers';
       }elseif($instance=='parent'){
           echo'parents';
       }
   }
   //create the database if it doesnt exist 
   if(!mysql_select_db('sma_db', $conn)){
       $create = mysql_query($sql, $conn);
       if(!$create){
           die('Could not create database: '.mysql_error());
       }
       echo'Database created';
       //create a table for the new database 
       mysql_select_db('sma_db', $conn);
       $tsql = 'CREATE TABLE '.select().'('.
              'first_name VARCHAR(30) NOT NULL,'.
              'last_name VARCHAR(30) NOT NULL,'.
              'username VARCHAR(30) NOT NULL'.
              'password VARCHAR(30) NOT NULL'.
              'join_date timestamp(14) NOT NULL'.
              'primary key (username))';
       $table = mysql_query($tsql, $conn);
       //check if the table has been created 
       if(!$table){
           die('could not create table: '.mysql_error());
       }
       echo'Table '.select().' created';
   }
   //error here that i will need to fix, giving me a headache 
   $isql = "INSERT INTO ".select()." (first_name, last_name, username, password) VALUES('$fname', '$lname', '$username', '$password');";
   mysql_select_db('sma_db');
   //insert information into the new database or the existing one
   $insert = mysql_query($isql, $conn);
   if(!$insert){
       die('could not insert data: '.mysql_error());
   }
   echo 'entered successfully';
   mysql_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device=width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
        <form name="initRegi" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" role="form">
            <div class="form-group">
                Enter your details here 
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter your firstname">
                <label for="lname">Second Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter your lastname">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword">
            </div>
            <div class="radio">
                <label for="name">Sex</label>
                <label class="checkbox-inline">
                    <input type="radio" name="sex" id="sex1" value="male"> Male
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="sex" id="sex2" value="female"> Female
                </label>
            </div>
            <div class="form-group">
                <label for="instance">Select category</label>
                <select class="form-control" name="instance" onchange="enableselectionbox();">
                    <option value="teacher">Teacher</option>
                    <option value="parent">Parent</option>
                </select>
            </div>
             <script type="text/javascript">
                    function enableselectionbox() {
                        if (document.getElementById('instance').value === 'teacher') {
                            document.getElementById('subject').disable = false;
                        } else {
                            document.getElementById('subject').disable = true;
                        }
                    }
                </script>
            <div class="form-group">
                <label for="subject">Subjects taught</label>
                <select class="form-control" multiple="multiple" id="subject">
                    <option value="math">Mathematics</option>
                    <option value="phys">Physics</option>
                    <option value="chem">Chemistry</option>
                    <option value="biol">Biology</option>
                    <option value="engl">English</option>
                    <option value="geog">Geography</option>
                    <option value="hist">History</option>
                    <option value="lang">Languages</option>
                </select>
               
            </div>
            <input type="submit" value="Submit">
        </form>
        </div>
        </div>
    </body>
</html>
