<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/global.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karma:wght@300;400;500;600;700&family=Livvic:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,900&family=Rhodium+Libre&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/styleDadosColetados.css">
    <link rel="stylesheet" href="./assets/styles/global.css">
    <title>Dados coletados</title>
</head>
<body>
<header>
        <ul class="navBar">
            
            <li class="navOptions first">
                    <img src="assets/images/SIA_b.svg" alt="SIA">
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
                        <p id= "Month" class = "month">Março</p>
                        <p id= "Year" class = "year" >2021</p>
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
                    <button id='1'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='2'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='3'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='4'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='5'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='6'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='7'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='8'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='9'  class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='10' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='11' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='12' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='13' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='14' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='15' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='16' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='17' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='18' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='19' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='20' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='21' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='22' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='23' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='24' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='25' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='26' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='27' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='28' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='29' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='30' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='31' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='32' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='33' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='34' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='35' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='36' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='37' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='38' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='39' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='40' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='41' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    <button id='42' class = "notActive" onClick="selecionarDia(this.id)"></button>
                    
                </div>
            </div>
            
            <div class="submitSection">
                <p id="DateText" class = ></p>
                <form action="" method="POST">
                    <div class="dateInputs">
                        <input  id="day" type="text" name="dia" value= ''>
                        <p>/</p>
                        <input  id="month" type="text" name="mes" value= ''>
                        <p>/</p>
                        <input  id="year" type="text" name="ano" value= ''>    
                    </div>
                    <input class="submitInput"type="submit" name="submit" value="Pesquisar" >
                </form>
            </div>

        
        </div>
    </section>

    <section class="tableSection">
            <?php

        include('conexao.php');

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $erro = 0;
            //Se o usuário não escolher nenhuma data, o sistema retorna as leituras realizadas no mês atual automaticamente.

            if(($_POST['dia'] == "") && ($_POST['mes'] == "") && ($_POST['ano'] == "")){
            
                $dataHoje = date('Y-m');
                
                $sql = "SELECT * FROM registrosUmidade WHERE data_leitura LIKE '%" . $dataHoje . "%'"; 
            
            //Se o usuário definir um mês e um ano, sem definir um dia, o sistema mostra as leituras feitas durante todo o mês selecionado.

            }else if(($_POST['dia'] == "") && ($_POST['mes'] != "") && ($_POST['ano'] != "")){

                if(intval($_POST['mes']) < 1 || intval($_POST['mes']) > 12){
                    $erro = 1;?>
                    <div class="alert error">Mês Inválido</div>
                <?php    
                }
                $data1 = $_POST['ano'] . '-' . $_POST['mes'] . '-1';
                
                $data2 = $_POST['ano'] . '-' . $_POST['mes'] . '-31';
                
                $sql = "SELECT * from registrosUmidade WHERE data_leitura >= '" . $data1 . "' AND data_leitura <= '" . $data2 . " ' ;";
                
            //Se o usuário definir um dia específico, o sistema retorna os dados obtidos durante o mesmo.
            
            }else if(($_POST['dia'] != "") && ($_POST['mes'] != "") && ($_POST['ano'] != "")){

                if(intval($_POST['mes']) < 1 || intval($_POST['mes']) > 12 ){
                    $erro = 1;?>
                    <div class="alert error">Mês Inválido</div>
                <?php    
                }else if((intval($_POST['mes']) == 2) && (($_POST['ano'] % 4 == 0) && (($_POST['ano'] % 100 != 0) || ($_POST['ano'] % 400 == 0)))){
                    if(intval($_POST['dia']) < 1  || intval($_POST['dia']) > 29){
                        $erro = 1;?>
                        <div class="alert error">Data Inválida</div>
                    <?php
                    }
                }else if(intval($_POST['mes']) == 2){
                    if(intval($_POST['dia']) < 1  || intval($_POST['dia']) > 28){
                        $erro = 1;?>
                        <div class="alert error">Data Inválida</div>
                    <?php
                    }
                }else if((intval($_POST['mes']) == 1) || (intval($_POST['mes']) == 3) ||(intval($_POST['mes']) == 5) || (intval($_POST['mes']) == 7) || (intval($_POST['mes']) == 8) || (intval($_POST['mes']) == 10) || (intval($_POST['mes']) == 12)){
                    if(intval($_POST['dia']) < 1  || intval($_POST['dia']) > 31){
                        $erro = 1;?>
                        <div class="alert error">Data Inválida</div>
                    <?php
                    }

                }else{
                    if(intval($_POST['dia']) < 1  || intval($_POST['dia']) > 31){
                        $erro = 1;?>
                        <div class="alert error">Data Inválida</div>
                    <?php
                    }
                    
                }
                
            
        
                $data = $_POST['ano'] . '-' . $_POST['mes'] . '-' . $_POST['dia'];
            
                $sql = "SELECT * FROM registrosUmidade WHERE data_leitura = '" . $data . "'";
            
            }
        


            if($erro != 1){
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

                    $timestamp = strtotime($linha->data_leitura);
                    $dataTabela = date('d/m/Y', $timestamp);
                
                    echo "<div class=\"values line" . $aux . "\">" . $linha->nivelUmidade . "%" . "</div>
                          <div class=\"values line" . $aux . "\">" . $dataTabela . "</div>
                          <div class=\"values line" . $aux . "\">" . $linha->hora_leitura . "</div>";
            
                    
                    $cont = $cont + 1;
            }
            if($cont == 0){
                echo "</div>
               </div>
               
               <div class=' alert warning'>Sua pesquisa não retornou nenhum resultado</div>
               ";
            }else{
                echo "</div>
               </div>";
            }
            }
            
            
        
        }                ?>       
    </section>

    <footer style="background-image: url(./assets/images/footer.png)";>
        <div class="footerLeft">
            <img src="./assets/images/SIA_w.svg" alt="SIA">
            <div>
                <h1>SIA</h1>
                <p>SISTEMA DE IRRIGAÇÃO AUTOMATIZADO</p>
            </div>
        </div>

        <div class="footerRight">
            <section class="contactProj">
                <h2>Contato</h2>
                <p>emailproj@email.com</p>
                <div>
                    <a href="#" target="_blank"><img src="assets/icons/github.svg" alt="github"></a>
                    <a href="#" target="_blank"><img src="assets/icons/instagram.svg" alt="instagram"></a>
                    <a href="#" target="_blank"><img src="assets/icons/linkedin.svg" alt="linkedin"></a>
                </div>
            </section>
            <section class="contactDevelopers">
                <h2>Fale Com os Desenvolvedores</h2>
                <div class="contactContainer">
                    <div class="contact">
                        <h3>Joalison Matheus</h3>
                        <div>
                            <a href="https://github.com/JoalisonM" target="_blank"><img src="assets/icons/github.svg" alt="github"></a>
                            <a href="https://www.instagram.com/joalison.matheus/" target="_blank"><img src="assets/icons/instagram.svg" alt="instagram"></a>
                            <a href="https://www.linkedin.com/in/joalison-matheus-125781208/" target="_blank"><img src="assets/icons/linkedin.svg" alt="linkedin"></a>
                        </div>
                        <p>joalisonmatheus0@gmail.com</p>
                    </div>
                    <div class="contact">
                        <h3>Pedro Gustavo</h3>
                        <div>
                            <a href="https://github.com/PedroGustav" target="_blank"><img src="assets/icons/github.svg" alt="github"></a>
                            <a href="https://www.instagram.com/pedro.gustavo_/" target="_blank"><img src="assets/icons/instagram.svg" alt="instagram"></a>
                            <a href="#" target="_blank"><img src="assets/icons/linkedin.svg" alt="linkedin"></a>
                        </div>
                        <p>pedro@email.com</p>
                    </div>
                </div>
            </section>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>