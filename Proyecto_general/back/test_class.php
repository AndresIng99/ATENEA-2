<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php
            echo '
                <ul>
                    <li>
                        <i>'.$names.'</i>
                    </li>
                    <li>
                        <i>'.$lastname.'</i>
                    </li>
                    <li>
                        <i>'.$birth.'</i>
                    </li>
                    <li>
                        <i>'.$id_person.'</i>
                    </li>
                    <li>
                        <i>'.$email.'</i>
                    </li>
                    <li>
                        <i>'.$pass.'</i>
                    </li>
                </ul>



                <ol>
                    <li>
                        <i>'.$names.'</i>
                    </li>
                    <li>
                        <i>'.$lastname.'</i>
                    </li>
                    <li>
                        <i>'.$birth.'</i>
                    </li>
                    <li>
                        <i>'.$id_person.'</i>
                    </li>
                    <li>
                        <i>'.$email.'</i>
                    </li>
                    <li>
                        <i>'.$pass.'</i>
                    </li>
                </ol>



                <table class="table">
                    <tr>
                        <td>Nombres: </td>
                        <td>Apellidos: </td>
                        <td>Fecha de Nacimiento: </td>
                        <td>Número de Identificación: </td>
                        <td>Email</td>
                        <td>Constraseña: </td>
                    </tr>
                    <tr>
                        <td>'.$names.'</td>
                        <td>'.$lastname.'</td>
                        <td>'.$birth.'</td>
                        <td>'.$id_person.'</td>
                        <td>'.$email.'</td>
                        <td>'.$pass.'</td>
                    </tr>
                </table>

            ';
    ?>

</body>
</html>
