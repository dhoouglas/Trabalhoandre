<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
     <!--Import Google Icon Font-->
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    
</head>


<body class="">
    <div class="center-align">
    <h3>Bem vindo ao sistema:</h3><br/>
    <h4> 
    <?php
      session_start();
      echo "Nome: ";
      echo  $_SESSION['nome'] .'<br/>';
      //echo "Login: ";
      //echo  $_SESSION['login'];
      //echo "Senha: ";
      //echo  $_SESSION['senha'];
    ?>
		<a href="logout.php">Logout</a>
<br/>  <br/>
		
		

<div class="container">
     <div class="row"> 
<fieldset>      
         <table>
          
  <br/>
  <a href="listar_usuario.php" class="btn btn-outline">Cadastrar / Consultar</a>

          </table>              
  </fieldset>


    </h4>
   </div>
  </div>
 </div>
    <br/>  <br/>  
    
</body>
</html>