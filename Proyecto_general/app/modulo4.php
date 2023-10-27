<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_app.css">
    <script src="https://kit.fontawesome.com/27010df775.js" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Centavos Sabios</title>
</head>
<body>
    <section id="general_section">
        <div class="left_menu">
            <menu-main></menu-main>
        </div>
        <div class="central">
            <h1>Calculadora de interés compuesto</h1>
            <hr class="sepa">

            <form class="form-group row" action="modulo4.php" method="POST">
                <!--espacio del input con icono-->
                <label for="capital_inicial">Capital Inicial</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <lord-icon class="icons_form"
                                src="https://cdn.lordicon.com/wyqtxzeh.json"
                                trigger="loop"
                                delay="500">
                            </lord-icon>
                        </div>
                    </div>
                    <input type="number" name="cap_ini" class="form-control" id="capital_inicial" placeholder="Capital Inicial" required>
                </div>
                <!--espacio del input con icono-->
                <label for="tasa_interes">Tasa de Interés</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <lord-icon class="icons_form"
                                src="https://cdn.lordicon.com/lqadwfir.json"
                                trigger="loop"
                                delay="500">
                            </lord-icon>
                        </div>
                    </div>
                    <input type="number" step="any" name="tasa_int" class="form-control" id="tasa_interes" placeholder="Tasa de interés" required>
                </div>
                <!--espacio del input con icono-->
                <label for="periodo">Período del ahorro (meses)</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <lord-icon class="icons_form"
                                src="https://cdn.lordicon.com/qvyppzqz.json"
                                trigger="loop"
                                delay="500">
                            </lord-icon>
                        </div>
                    </div>
                    <input type="number" name="periodo" class="form-control" id="periodo" placeholder="Periodo del ahorro" required>
                </div>
                <button type="submit" class="btn btn-info mb-2" name="operar">Calcular</button>
            </form>

            <?php
            
            if (isset($_POST['operar'])) {
                $cap_ini = $_POST['cap_ini'];
                $tasa_int = $_POST['tasa_int'];
                $periodo = $_POST['periodo'];
                $tasa_int = $tasa_int/100;

                echo'
                <div class="cont_table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Capital Inicial</th>
                            <th scope="col">Tasa de interés</th>
                            <th scope="col">periodo del ahorro</th>
                            <th scope="col">Capital Final</th>
                        </tr>
                    </thead>
                    <tbody>';

                for ($i=1; $i <= $periodo; $i++) { 
                    $capital_final = $cap_ini*((1+$tasa_int)**$i);
                    $capital_final = round($capital_final, 2); 

                    $capital_final2 = number_format($capital_final, 0, ',', '.');
                    $cap_ini2 = number_format($cap_ini, 0, ',', '.');
                    echo '    
                        <tr>
                            <td>$ '.$cap_ini2.'</td>
                            <td>'.$tasa_int.'</td>
                            <td>'.$i.'</td>
                            <th scope="row">$ '.$capital_final2.'</th>
                        </tr>';
                }
                echo'
                    </tbody>
                </table>
                </div>
                ';

                
               
            }
            
            ?>

            

        </div>
        <div class="right_menu">
            <div class="profile">
                <img src="https://thispersondoesnotexist.com/" alt="">
                <p>Andrés Pineda</p>
                <span>andres@gmail.com</span>
            </div>
            <hr class="sepa">
            <div class="last_tras">
                <h2>Ultimos movimientos</h2>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
            </div>
        </div>
        
    </section>
    <script src="../js/component_menu.js"></script>
</body>
</html>