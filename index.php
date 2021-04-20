<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    

    <?php       

    $result = false;
    $error = false;

     if(isset($_POST["submitar"]) == "POST"){        

        $texto = $_POST['texto'];
        $funcao = $_POST['funcao'];
        $valInicio = $_POST['inicio'];
        $tamanho = $_POST['tamanho'];

        $quantidade = $_POST['quantidade'];
        $caractere = $_POST['caractere'];
        $direcao = $_POST['direcao'];

        $palavraNova = $_POST['palavraNova'];
        $palavra = $_POST['palavra'];

        $procurarString = $_POST['procurarString'];

        $quantidadeRepetir = $_POST['quantidadeRepetir'];

        if(empty($texto)){
            $result = "texto não encontrado";
        }else if(empty($funcao)){
            $result = "Função não escolhida";
        }

    switch($funcao){
        case "strtoupper":
        $result = strtoupper($texto);
        break;
        case "strtolower":
        $result = strtolower($texto);
        break;
        case "substr":
            if(!empty($valInicio) && !empty($tamanho)){
                $result = substr($texto, $valInicio, $tamanho);
            }else{
                $error = "Inicio ou tamanho não preenchidos";
            }
        break;
        case "strlen":
                 $result = strlen($texto);
        break;
        case "str_replace":
            if(!empty($texto) && !empty($palavraNova) && !empty($palavra)){
                $result = str_replace($palavra, $palavraNova, $texto);
            }           
        break;
        case "strpos":
            if(!empty($texto) && !empty($procurarString)){
                $result = strpos($texto, $procurarString);
            }
        break;
        case "str_pad":
            if(!empty($texto) && !empty($quantidade) && !empty($caractere) && !empty($direcao)){
                $result = str_pad($texto, $quantidade, $caractere, $direcao);
            }
        break;
        case "str_repeat":
            if(!empty($texto) && !empty($quantidadeRepetir)){
                $result = str_repeat($texto, $quantidadeRepetir);
            }
    }
        
    }
    ?>

<form action="index.php" method="POST" >
    <h3>Digite um texto</h3>
    <input type="text" id="texto" name="texto" class="" placeholder="Digite aqui:">
    <p>Selecione a função</p>
    <ul class="check">
    <li><input class="form-check-radio" type="radio" name="funcao" id="strupper" value="strtoupper">strupper</li>

    <li><input class="form-check-radio" type="radio" name="funcao" id="strlower" value="strtolower">strlower</li>

    <li><input class="form-check-radio" type="radio" name="funcao" id="substr" value="substr">substr</li>
    <input type="number" name="inicio" placeholder="Início">
    <input type="number" name="tamanho" placeholder="Tamanho"> 

    <li><input type="radio" class="form-check-radio" name="funcao" id="strlen" value="strlen">strlen</li>

    <li><input class="form-check-radio" type="radio" name="funcao" id="str_replace" value="str_replace">str_replace</li>    
    <input type="text" name="palavra" placeholder="Palavra a encontrar">
    <input type="text" name="palavraNova" placeholder="Pala. Nova">    

    <li><input class="form-check-radio" type="radio" name="funcao" id="strpos" value="strpos">strpos</li>    
    <input type="text" name="procurarString" placeholder="Palavra procurada"> 

    <li><input class="form-check-radio" type="radio" name="funcao" id="str_pad" value="str_pad">str_pad (não consegui fazer funcionar)</li>
    <input type="number" name="quantidade" placeholder="Quantidade">
    <input type="text" name="caractere" placeholder="Caractere">
    <input type="text" name="direcao" placeholder="Direção">

    <li><input class="form-check-radio" type="radio" name="funcao" id="str_repeat" value="str_repeat">str_repeat</li>
    <input type="text" name="quantidadeRepetir" placeholder="quantidade">
    </ul>
    <h3><?php echo "Resultado: $result";?></h3>
    <input type="submit" name="submitar" class="btn btn-primary"></button>
    <p class="danger"><?php echo $error;?></p>
    </form>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>