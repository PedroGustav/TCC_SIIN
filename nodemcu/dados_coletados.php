<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karma:wght@300;400;500;600;700&family=Livvic:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,900&family=Rhodium+Libre&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styleDadosColetados.css">
    <link rel="stylesheet" href="styles/global.css">
    <title>Dados coletados</title>
</head>
<body>
<header>
        <ul class="navBar">
            
            <li class="navOptions first">
                    <img src="assets/SIA_b.svg" alt="SIA">
                    <p>SIA</p>
            </li>

            <li class="navOptions ">
                <a href="index.php">
                    Página Inicial
                </a>
            </li>

            <li class="navOptions active">
                <a>
                    Dados Coletados
                </a>
            </li>

            <li class="navOptions">
                <a href="sobre_sistema.php">
                    Sobre o Sistema
                </a>
            </li>

        </ul>
    </header>

    <section class="infoCalendarSection">
        <div class="leftSide">
            <h1 class="title">Dados Coletados</h1>
            <p> Todas as informações sobre as leituras realizadas 
            pelo sensor de umidade conectado ao sistema estarão
            disponíveis nesta página.</br>
            </br>
                Por padrão, a tabela mostra as leituras do mês atual,
            caso você deseje ver leituras mais específicas, é só 
            escolher no calendário ao lado a data que você deseja 
            realizar a pesquisa :&#41; </p>
        </div>
        <div class="rightSide">
            
            <div class="calendar">
                <div class="monthYear">
                    <button onClick="VoltarMes()">&#60;</button>
                    <div>
                        <p id= "month" class = "month">Março</p>
                        <p id= "year" class = "year" >2021</p>
                    </div>
                    <button onClick="AvancarMes()">&#62;</button>
                </div>
                <div class="daysNames">
                        <p>DOM</p>
                        <p>SEG</p>
                        <p>TER</p>
                        <p>QUA</p>
                        <p>QUI</p>
                        <p>SEX</p>
                        <p>SAB</p>
                </div>

                <div class="days">
                    <button id='1' class = "notActive"></button>
                    <button id='2' class = "notActive"></button>
                    <button id='3' class = "notActive"></button>
                    <button id='4' class = "notActive"></button>
                    <button id='5' class = "notActive"></button>
                    <button id='6' class = "notActive"></button>
                    <button id='7' class = "notActive"></button>
                    <button id='8' class = "notActive"></button>
                    <button id='9' class = "notActive"></button>
                    <button id='10' class = "notActive"></button>
                    <button id='11' class = "notActive"></button>
                    <button id='12' class = "notActive"></button>
                    <button id='13' class = "notActive"></button>
                    <button id='14' class = "notActive"></button>
                    <button id='15' class = "notActive"></button>
                    <button id='16' class = "notActive"></button>
                    <button id='17' class = "notActive"></button>
                    <button id='18' class = "notActive"></button>
                    <button id='19' class = "notActive"></button>
                    <button id='20' class = "notActive"></button>
                    <button id='21' class = "notActive"></button>
                    <button id='22' class = "notActive"></button>
                    <button id='23' class = "notActive"></button>
                    <button id='24' class = "notActive"></button>
                    <button id='25' class = "notActive"></button>
                    <button id='26' class = "notActive"></button>
                    <button id='27' class = "notActive"></button>
                    <button id='28' class = "notActive"></button>
                    <button id='29' class = "notActive"></button>
                    <button id='30' class = "notActive"></button>
                    <button id='31' class = "notActive"></button>
                    <button id='32' class = "notActive"></button>
                    <button id='33' class = "notActive"></button>
                    <button id='34' class = "notActive"></button>
                    <button id='35' class = "notActive"></button>
                    <button id='36' class = "notActive"></button>
                    <button id='37' class = "notActive"></button>
                    <button id='38' class = "notActive"></button>
                    <button id='39' class = "notActive"></button>
                    <button id='40' class = "notActive"></button>
                    <button id='41' class = "notActive"></button>
                    <button id='42' class = "notActive"></button>
                    
                    
                </div>
            </div>
            <form action="" method="POST">
                <input  id="day" type="text" name="dia" value= ''>
                <input  id="month" type="text" name="mes" value= ''>
                <input  id="year" type="text" name="ano" value= ''>
                <input type="submit" name="submit" value="PESQUISAR">
            </form>

            <button onClick="alterarValor()">muda ano</button>
        </div>
    </section>

    <section class="tableSection">
            <?php

        include('conexao.php');

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //Se o usuário não escolher nenhuma data, o sistema retorna as leituras realizadas no mês atual automaticamente.

            if(($_POST['dia'] == "") && ($_POST['mes'] == "") && ($_POST['ano'] == "")){
            
                $dataHoje = date('Y-m');
                
                $sql = "SELECT * FROM registrosUmidade WHERE data_leitura LIKE '%" . $dataHoje . "%'"; 
            
            //Se o usuário definir um mês e um ano, sem definir um dia, o sistema mostra as leituras feitas durante todo o mês selecionado.

            }else if(($_POST['dia'] == "") && ($_POST['mes'] != "") && ($_POST['ano'] != "")){
                
                $data1 = $_POST['ano'] . '-' . $_POST['mes'] . '-1';
                
                $data2 = $_POST['ano'] . '-' . $_POST['mes'] . '-31';
                
                $sql = "SELECT * from registrosUmidade WHERE data_leitura >= '" . $data1 . "' AND data_leitura <= '" . $data2 . " ' ;";
                
            //Se o usuário definir um dia específico, o sistema retorna os dados obtidos durante o mesmo.
            
            }else if(($_POST['dia'] != "") && ($_POST['mes'] != "") && ($_POST['ano'] != "")){

                $data = $_POST['ano'] . '-' . $_POST['mes'] . '-' . $_POST['dia'];
            
                $sql = "SELECT * FROM registrosUmidade WHERE data_leitura = '" . $data . "'";
            }



            $stmt = $PDO->prepare($sql);
            $stmt->execute();

            echo"<div class=\"table\">
                    <div class=\"tableTitles\">
                        <div class=\"tTitle\">
                            Nível de umidade&#40;&#37;&#41;	 
                        </div>
                        <div class=\"tTitle\">
                            Data da leitura 
                        </div>
                        <div class=\"tTitle\">
                            Hora da leitura 
                        </div>
                    </div>";
            echo"<div class=\"tableGrid\">";
            
            $cont = 0;
            while($linha = $stmt->fetch(PDO::FETCH_OBJ)){
                    
                    if(($cont % 2) == 0){
                        $aux = 1;
                    }else{
                        $aux = 2;
                    }
                
                    echo "<div class=\"values line" . $aux . "\">" . $linha->nivelUmidade . "</div>
                          <div class=\"values line" . $aux . "\">" . $linha->data_leitura . "</div>
                          <div class=\"values line" . $aux . "\">" . $linha->hora_leitura . "</div>";
            
                    
                    $cont = $cont + 1;
            }
            echo "</div>
               </div>";
        }
        ?>
    </section>
    <script src="script.js"></script>
</body>

</html>