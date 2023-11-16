<?php
    include 'db/conexion.php';

    $query = mysqli_query($conexion, "SELECT * FROM users")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>My_database </title>
</head>
<body>
<div class="wrapper">
    <div class="container">
            <div class="filter">
            <div class="row">
                <div class="col-sm-4">
                <div class="show-row">
                    <select class="form-control">
                    <option value="5" selected="selected">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    </select>
                </div>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                <div class="search-row">
                    <input type="text" name="search" class="form-control" placeholder="Enter your keyword">
                </div>
                </div>
            </div>
            </div>
        <table id="music" class="table table-responsive table-hover">
            <thead>
            <tr  class="myHead">
                <th>#</th>
                <th>id</th>
                <th>Names</th>
                <th>lastnames</th>
                <th>birth</th>
                <th>id_person</th>
                <th>email</th>
                <th>pass</th>

            </tr>
            </thead>
            <tbody>

            <?php
            
            while ($datos = mysqli_fetch_array($query)) {
                $id = $datos['id'];
                $names = $datos['names'];
                $lastnames = $datos['lastnames'];
                $birth = $datos['birth'];
                $id_person = $datos['id_person'];
                $email = $datos['email'];
                $pass = $datos ['pass'];


                echo'
                <tr data-url="FQS7i2z1CoA">
                    <td></td>
                    <td>'.$id.'</td>
                    <td>'.$names.'</td>
                    <td>'.$lastnames.'</td>
                    <td>'.$birth.'</td>
                    <td>'.$id_person.'</td>
                    <td>'.$email.'</td>
                    <td>'.$pass.'</td>
                </tr>
                ';
            }

            ?>
            </tbody>
        </table>
        <div class="text-center controller">
            <ul class="pagination"></ul>
            <ul class="pager">
            <li ><a href="#" class="prev">Previous</a></li>
            <li><a href="#" class="next">Next</a></li>
            </ul>
        </div>
    </div>
</div>
    <script src="js/script2.js"></script>
</body>
</html>