
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Restô Bar</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/slick.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Permanent+Marker|Raleway:400,700" rel="stylesheet">
        <script src="js/vendor/modernizr.js"></script>
    </head>
    
    <body>

        <?php include "header.php"; ?>
    
        <div class="welcome-gallery small-12 columns">



            <div class="photo-section small-12 columns">
                <img class="homepage-main-photo" src="img/main-photo.jpg" alt="slider imagem 1">
            </div>

            <div class="main-section-title small-10 columns">
                <div class="table">
                    <div class="table-cell">
                        <h1>Bem vindo ao Restô Bar</h1>
                        <h2>A cozinha tradicional na Brasa</h2>

                    </div>
                </div>
                
            </div>

            <div class="photo-gradient">
                
            </div>

        </div>


    

        <div class="about-us small-11 large-12 columns no-padding small-centered">

            <div class="global-page-container">
                <div id="about-us" class="about-us-title small-12 columns no-padding">
                <h3>Sobre Nós</h3>
                <hr></hr>
                </div>

                
                    <img src="img/fachada.jpg" alt="fachada do restaurante">
                

                <div class="about-us-text">
                <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus leo mi, 
                        condimentum ac convallis non, porta ac nibh. Morbi volutpat nibh lectus, quis 
                        convallis nunc rutrum vitae. Aenean volutpat aliquam elementum. Nunc consequat 
                        elit odio, vitae suscipit nunc pretium eu. Aenean vitae lacus auctor, condimentum 
                        ipsum at, suscipit erat. Donec dapibus ullamcorper bibendum. Vestibulum posuere 
                        augue in lectus dictum tincidunt. Pellentesque ornare eget enim sed dignissim. 
                        Sed nec nisi suscipit, feugiat risus ac, lacinia elit.
                    </p>
                    
                    <p>
                        Duis fermentum leo enim, eget dignissim dolor imperdiet at. Sed ut rutrum lacus. 
                        Aenean eleifend, urna eu dapibus imperdiet, turpis diam tristique mauris, nec 
                        luctus ante massa eu arcu. Duis tempor risus quis tellus posuere eleifend. 
                        Donec fringilla nulla ac odio sagittis tincidunt. Phasellus tempus id felis et 
                        finibus. Aenean felis ligula, varius nec varius at, feugiat nec felis. Morbi 
                        blandit sapien vel justo consequat laoreet.</p>
                </div>
            
            </div>

        </div>

    
        <div class="cardapio small-11 large-12 columns no-padding small-centered">
            <div class="global-page-container">
                <div class="cardapio-title small-12 columns no-padding">
                <h3>Cardapio</h3>
                <hr></hr>
                </div>
            </div>

            <div class="global-page-container">


                <div class="slider-cardapio">
                    <div class="slider-002 small-12 small-centered columns">

                    <?php

                    $db_connect = new mysqli("localhost","root","","restaurante");
                    mysqli_set_charset($db_connect,"utf8");

                    if ($db_connect->connect_error) {
                         echo 'Falha: ' . $db_connect->connect_error;
                    } else {
                       // echo 'Conexão feita com sucesso' . '<br><br>';    
                        $sql = "SELECT * FROM `pratos` WHERE destaque=1";
                        $result = $db_connect -> query($sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc() ) { ?>
                                <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                <div class="cardapio-item">
                                  <a href="prato.php?prato=<?php echo $row["codigo"];?>">
                                    
                                    <div class="cardapio-item-image">
                                        <img src="img/cardapio/<?php echo $row["codigo"];?>.jpg" alt="camarao"/>   
                                    </div>

                                    <div class="item-info">
                                        
                                    
                                        <div class="title"><?php echo $row["nome"];?></div>
                                    </div>

                                    <div class="gradient-filter">
                                    </div>
                                    
                                  </a>
                            </div>
                        </div>   
                           <?php } 
                        } else {
                            echo "Não há destaques";
                        }
                    }

                    ?>                
                    </div>
                </div>
            </div>
        </div>

        <div id="contact-us" class="contact-us small-11 large-12 columns no-padding small-centered">

            <div class="global-page-container">
                <div class="contact-us-title small-12 columns no-padding">
                <h3>Faça a sua reserva</h3>
                <hr></hr>
                </div>
                

                <div class="reservation-form small-12 columns no-padding">

                    <form action="index.php#contact-us" action="GET">

                        <div class="form-part1 small-12 large-8 xlarge-7 columns no-padding">
                    
                            <input type="text" name="nome" class="field" placeholder="Nome completo" required/>
                            
                            <input type="email" name="email" class="field" placeholder="E-mail" required/>
                            
                            <textarea type="text" name="mensagem" class="field" placeholder="Mensagem"></textarea>


                        </div>

                        <div class="form-part2 small-12 large-3 xlarge-3 end columns no-padding">
                            <input type="text" name="telefone" class="field" placeholder="Telefone" required/>
                            
                            <input type="date" name="data" class="field" placeholder="Data e hora"/>

                            <input type="text" name="num_pessoas" class="field" placeholder="Número de pessoas" required/>

                            <input type="submit" name="submit" value="Reservar" required/>

                        </div>


                    </form>
                    <?php
                    function cleandata($input){
                        $input = trim($input);
                        $input = stripslashes($input);
                        $inputt = htmlspecialchars($input);

                        return $input;
                    }
                    // Inserir Arquivos do PHPMailer
                    require 'Exception.php';
                    require 'PHPMailer.php';
                    require 'SMTP.php';

                    // Usar as classes sem o namespace
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if(isset($_GET['submit'])){
                            $nome =  $_GET['nome'];
                            $email =  $_GET['email'];
                            $mensagem =  $_GET['mensagem'];
                            $telefone =  $_GET['telefone'];
                            $data =  $_GET['data'];
                            $num_pessoas = $_GET['num_pessoas'];

                            $nome =  cleandata($nome);
                            $email =  cleandata($email);
                            $mensagem =  cleandata($mensagem);
                            $telefone =  cleandata($telefone);
                            $data =  cleandata($data);
                            $num_pessoas = cleandata($num_pessoas);

                            $testo_msg = 'E-mail enviado com o sistema de reservas do site' . "<br><br>" . "Nome: " . $nome . "<br>" . $email . "<br>" . $telefone . "<br>" . $data . "<br>" . $num_pessoas . " pessoas" . "<br>"; 
                        }
                    }

                    // Criação do Objeto da Classe PHPMailer
                    $mail = new PHPMailer(true); 


                    try {
                        
                        //Retire o comentário abaixo para soltar detalhes do envio 
                        //$mail->SMTPDebug = 2;                                
                        
                        // Usar SMTP para o envio
                        $mail->isSMTP();                                      

                        // Detalhes do servidor (No nosso exemplo é o Google)
                        $mail->Host = 'smtp.gmail.com';

                        // Permitir autenticação SMTP
                        $mail->SMTPAuth = true;                  
                        
                        $mail -> CharSet="UTF-8";

                        // Nome do usuário
                        $mail->Username = 'vmiguel970@gmail.com';        
                        // Senha do E-mail         
                        $mail->Password = 'omfqcttktkfhoqbz';   
                                                
                        // Tipo de protocolo de segurança
                        $mail->SMTPSecure = 'tls';   

                        // Porta de conexão com o servidor                        
                        $mail->Port = 587;

                        
                        // Garantir a autenticação com o Google
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );

                        // Remetente
                        $mail->setFrom($email, $nome);
                        
                        // Destinatário
                        $mail->addAddress('projetotestes00@gmail.com', 'Restô Bar');

                        // Conteúdo

                        // Define conteúdo como HTML
                        $mail->isHTML(true);                                  

                        // Assunto
                        $mail->Subject = 'Reserva do restaurante';
                        $mail->Body    = $testo_msg;
                        $mail->AltBody = 'Formato alternativo em texto puro para emails que não aceitam HTML';

                        // Enviar E-mail
                        $mail->send();
                        echo 'Mensagem enviada com sucesso';
                    } catch (Exception $e) {
                        echo 'A mensagem não foi enviada';
                    }
                                

                    ?>
                </div>

            </div>
        </div>


        <?php include "footer.php"; ?>