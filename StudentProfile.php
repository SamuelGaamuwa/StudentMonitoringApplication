 <?php
    include 'DefaultPage.php';
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = 'samuel1234';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    if(!$conn){
        die('Could not connect: '.mysql_error);
    }
    echo 'successful connection';
    $sql = 'SELECT idStudents, FirstName, LastName, Sex FROM students';
    mysql_select_db('sma_db');
    $retval = mysql_query($sql, $conn);
    if(!$retval){
        die('could not retrieve the required data: '.mysql_error());
    }
    while($row  = mysql_fetch_assoc($retval)){
        if({$row['idStudents']} == 212){
            echo "Name: {$row['FirstName']} {$row['LastName']}<br>".
                 "Student: {$row['idStudents']}<br>".
                 "Sex: {$row['Sex']}";
        }
    }
    mysql_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <img src="/samples/Cover.jpg" class="img-thumbnail" alt="image unavailable">
                </div>
                <div class="col-md-9 col-lg-9">
                    <h1>Samuel Gaamuwa<br><br><small>21200019<br><br>S6</small></h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                 <tr>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Recent</th>
                                 </tr>
                                 <tr>
                                    <td>Mathematics</td>
                                 </tr>
                                <tr>
                                    <td>Physics</td>
                                 </tr>
                                <tr>
                                    <td>English</td>
                                 </tr>
                                <tr>
                                    <td>Biology</td>
                                 </tr>
                                <tr>
                                    <td>Chemistry</td>
                                 </tr>
                                <tr>
                                    <td>History</td>
                                 </tr>
                                <tr>
                                    <td>Geography</td>
                                 </tr>
                                <tr>
                                    <td>Languages</td>
                                 </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.onload = function () {
                $('#student').addClass('active');
            };
        </script>
    </body>
</html>
