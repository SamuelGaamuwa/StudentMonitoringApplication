<?php
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
         if(!empty($username)&&!empty($password)){
             echo 'thank you';
         }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device=width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <title>LOGIN</title>
    </head>
    <body>
       <div class="container">
           <div class="jumbotron">
               <h1>Welcome to the Students Monitoring App<br> Login here</h1>
               <form action="loginpage.php" method="post" role="form">
                    <div class="form=group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="form=group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
               </form>
                <div>
                    Not Registered? <a href="InitialRegistration.php">Register Here</a>
                </div>  
               </div>
                
            </div>    
    </body>
</html>
