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

    <?php include  "header.php"; ?>
    <?php 
        $conexao  = new mysqli ("localhost", "root", "", "restaurante");
        mysqli_set_charset($conexao, "utf-8");
        global $prato_code;
        if($conexao -> connect_error){
            echo "Falha na conexão";
        }else{
            $page = $_SERVER['QUERY_STRING'];
            $page = substr($page, 1);
            $sql = "SELECT * FROM `pratos` WHERE codigo='$page'";
            $conexao -> query($sql);
            $result = $conexao -> query($sql);
            if($result->num_rows > 0){
                while($row = $result -> fetch_assoc() ) { 
                        $prato_code = $row['codigo'];
                        $prato_desc = $row['descricao'];
                        $prato_tit = $row['titulo'];
                        $prato_preco = $row['preco'];
                        $prato_cal = $row['calorias'];
                } 
            }else{
                echo "ERRO" . "<BR>";
            }
        }
        
    ?>
    <?php if($prato_code != NULL) { ?>
        <div class="product-page small-11 large-12 columns no-padding small-centered">
                
            <div class="global-page-container">

              <div class="product-section">
                <div class="product-info small-12 large-5 columns no-padding">
                    <h3><?php  echo $prato_code ?></h3>
                    <h4><?php echo $prato_desc  ?></h4>
                    <p><?php echo $prato_tit ?></p>

                    <h5><b>Preço: </b><?php echo $prato_preco ?></h5>
                    <h5><b>Calorias: </b><?php echo $prato_cal ?></h5> 
                </div>
                <div class="product-picture small-12 large-7 columns no-padding">
                    <img src="img/cardapio/<?php echo $prato_code?>.jpg" alt="<?php echo $prato_code?>">
                </div>
              </div>

            </div>
        </div>

    <?php } else {
         echo "Prato não encontrado!";
    }
    ?>
            <div class="go-back small-12 columns no-padding">
                <a href="cardapio.php"><< Voltar ao Cardápio</a>
            </div>
            
    <?php include "footer.php"; ?>