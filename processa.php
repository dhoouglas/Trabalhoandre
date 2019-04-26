
<!-- Modal editar. Manda os dados alterados na web para o banco através da clausula UPDATE-->

<?php
	include_once("conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$sal = mysqli_real_escape_string($conn, $_POST['sal']);
    $categoria_id = mysqli_real_escape_string($conn, $_POST['categoria_id']);
	echo "$id - $nome - $sal";
	$result_dadosusuarios = "UPDATE dadosusuarios SET nome='$nome', sal =  '$sal', categoria_id='$categoria_id' WHERE id = '$id'";
	
	$resultado_dadosusuarios = mysqli_query($conn, $result_dadosusuarios);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/trab-andre2/listar_usuario.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/trab-andre2/listar_usuario.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>