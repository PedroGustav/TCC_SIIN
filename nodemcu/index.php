<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>NODEMCU e MySql</title>
        <link rel="stylesheet" href="assets/styles/styleIndex.css">
        <link rel="stylesheet" href="assets/styles/global.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Karma:wght@300;400;500;600;700&family=Livvic:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,900&family=Rhodium+Libre&family=Roboto&display=swap" rel="stylesheet">
        
        <script type="text/javascript" src="./assets/js/caroulse.js"></script>

    </head>
    <body>
        
        <header>
            <ul class="navBar">
                
                <li class="navOptions first">
                        <img src="assets/images/SIA_b.svg" alt="SIA">
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
                <p>
                    Olá, esta é a página inicial do nosso sistema, o SIA ou Sistema de Irrigação Automatizada. 
                    para saber mais detalhes sobre este projeto incrível, clique na sessão  ‘Sobre o sistema’ 
                    ou se preferir, <a href="./sobre_sistema.php">clique aqui mesmo!</a>
                    </br>
                    </br>
                    Confira as fotos tiradas durante o desenvolvimento do nosso sistema, desde os protótipos, 
                    até a instalação do hardware no solo.
                </p>
            </div>

            <div class="rightSide">
                <div class="slideshow" id="slideshow">
                    <div class="slidebolinhas" id="slidebolinhas">
                        <div class="bolinha" id="bolinha" onclick=" mudarSlide(0) " ></div>
                        <div class="bolinha" id="bolinha" onclick=" mudarSlide(1) " ></div>
                        <div class="bolinha" id="bolinha" onclick=" mudarSlide(2) " ></div>
                    </div>
                    <div class="slideshowarea">
                        <div class="slide" style="background-image:url('./assets/images/foto-guarabira.jpg')" >
                            <div class="slideinfo">
                                <div class="slideinfo_titulo"> IFPB - GUARABIRA </div>
                                <div class="slideinfo_subtitulo"> Imagem do IFPB Campus Guarabira</div>
                            </div>
                        </div>
                        <div class="slide" style="background-image:url('./assets/images/foto-guarabira.jpg')" >
                            <div class="slideinfo">
                                <div class="slideinfo_titulo"> IFPB - GUARABIRA </div>
                                <div class="slideinfo_subtitulo">Imagem do IFPB Campus Guarabira </div>
                            </div>
                        </div>
                        <div class="slide" style="background-image:url('./assets/images/foto-guarabira.jpg')" >
                            <div class="slideinfo">
                                <div class="slideinfo_titulo"> IFPB - GUARABIRA </div>
                                <div class="slideinfo_subtitulo"> Imagem do IFPB Campus Guarabira</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tableSection">
            <h1 class="title">Últimos Registros</h1>

            <?php

                include('conexao.php');

                $dataAtual = date('Y/m/d');
                $data = $_POST['data_leitura'];
                
                $sql = "SELECT * FROM registrosUmidade WHERE data_leitura = '$dataAtual'";

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
                
                <div class=' alert warning'>Não foram registradas novas informações base de dados</div>
                ";
                }
                else{
                    echo "</div>
                </div>";
                }
            ?>
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
                        <a href="#" target="_blank"><img src="./assets/icons/github.svg" alt="github"></a>
                        <a href="#" target="_blank"><img src="./assets/icons/instagram.svg" alt="instagram"></a>
                        <a href="#" target="_blank"><img src="./assets/icons/linkedin.svg" alt="linkedin"></a>
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
    </body>
</html>