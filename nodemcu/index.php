<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>NODEMCU e MySql</title>
    <link rel="stylesheet" href="styles/styleIndex.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karma:wght@300;400;500;600;700&family=Livvic:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,900&family=Rhodium+Libre&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    
    <header>
        <ul class="navBar">
            
            <li class="navOptions first">
                    <img src="assets/SIA_b.svg" alt="SIA">
                    <p>SIA</p>
            </li>

            <li class="navOptions active">
                <a >
                    Página Inicial
                </a>
            </li>

            <li class="navOptions">
                <a href="dados_coletados.php">
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

    <section class="welcomeSection">
        
        <div class="leftSide">
            <h1 class="title">Bem Vindo :&#41;</h1>
            <p>Olá, esta é a página inicial do nosso sistema, o SIA ou Sistema de Irrigação Automatizada. para saber mais detalhes sobre este projeto incrível, clique na sessão  ‘Sobre o sistema’ ou se preferir, <a href="#">clique aqui mesmo!</a>
            </br>
            </br>
            Confira as fotos tiradas durante o desenvolvimento do nosso sistema, desde os protótipos, até a instalação do hardware no solo.</p>
        </div>

        <div class="rightSide">

            <div class="photos">
            </div>
        
        </div>
    </section>

    <section class="tableSection">
        <h1 class="title">Últimos Registros</h1>
        
        <div class="table">
            <div class="tableTitles">
                <div class="tTitle">
                    Nível de umidade&#40;&#37;&#41;	 
                </div>
                <div class="tTitle">
                    Data da leitura 
                </div>
                <div class="tTitle">
                    Hora da leitura 
                </div>
            </div>
            <div class="tableGrid">
                <div class="values line1">75,4%</div>
                <div class="values line1">20/05/2021</div>
                <div class="values line1">15:30:21</div>
                <div class="values line2">59,27%</div>
                <div class="values line2">20/05/2021</div>
                <div class="values line2">16:05:21</div>
                <div class="values line1">62,24%</div>
                <div class="values line1">20/05/2021</div>
                <div class="values line1">16:40:21</div>
                <div class="values line2">65,43%</div>
                <div class="values line2">20/05/2021</div>
                <div class="values line2">17:15:21</div>
                <div class="values line1">66,94%</div>
                <div class="values line1">20/05/2021</div>
                <div class="values line1">17:50:21</div>
            </div>
        </div>
 
    </section>

    <footer style="background-image: url(assets/footer.png)";>
        <div class="footerLeft">
            <img src="assets/SIA_w.svg" alt="SIA">
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
                    <a href="#"><img src="assets/icons/github.svg" alt="github"></a>
                    <a href="#"><img src="assets/icons/instagram.svg" alt="instagram"></a>
                    <a href="#"><img src="assets/icons/linkedin.svg" alt="linkedin"></a>
                </div>
            </section>
            <section class="contactDevelopers">
                <h2>Fale Com os Desenvolvedores</h2>
                <div class="contactContainer">
                    <div class="contact">
                        <h3>Joalison Matheus</h3>
                        <div>
                            <a href="#"><img src="assets/icons/github.svg" alt="github"></a>
                            <a href="#"><img src="assets/icons/instagram.svg" alt="instagram"></a>
                            <a href="#"><img src="assets/icons/linkedin.svg" alt="linkedin"></a>
                        </div>
                        <p>joalison@email.com</p>
                    </div>
                    <div class="contact">
                        <h3>Pedro Gustavo</h3>
                        <div>
                            <a href="#"><img src="assets/icons/github.svg" alt="github"></a>
                            <a href="#"><img src="assets/icons/instagram.svg" alt="instagram"></a>
                            <a href="#"><img src="assets/icons/linkedin.svg" alt="linkedin"></a>
                        </div>
                        <p>pedro@email.com</p>
                    </div>
                </div>
            </section>
        </div>
    </footer>
    <!--
        <form action="" method="POST">
        <input type="date" name="data">
        <input type="submit" name="submit" value="Buscar">
    </form>
    !-->

    <?php
        include('conexao.php');
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if($_POST['data'] == ""){
                echo "<h1> Não recebeu nada </h1>";
            }else{
                echo "<h1> Recebeu a data: " . $_POST['data'] . "</h1>";
            }
        } else{
            ;

        }

    ?>
   <!-- <table>
        <tr>
            <th>Sensor1</th>
            <th>Sensor2</th>
            <th>Sensor3</th>
            <th>Data-Hora</th>
        </tr>
        <tr>
            <td>55</td>
            <td>65</td>
            <td>75</td>
            <td>2017-10-20 04:40:32</td>
        </tr>
    </table> !-->
</body>
</html>