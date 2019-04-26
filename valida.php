<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST['nome'];
    //$login = $_POST['login'];
    $senha = $_POST['senha'];
    if($nome == "sysadmin" && $senha == "123"){
        session_start();
        $_SESSION['nome'] = $nome;
        //$_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;

        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/trab-andre2/listar_usuario.php'>
				<script type=\"text/javascript\">
					alert(\"Bem vindo administrador.\");
				</script>
			";
    }
	if($nome != "sysadmin" || $senha != "123"){
		  echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/trab-andre2'>
				<script type=\"text/javascript\">
					alert(\"Credenciais inválidas ou usuário inexistente!\");
				</script>
			";
	}
}

?>