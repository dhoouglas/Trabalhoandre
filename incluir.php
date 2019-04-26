<!-- Modal cadastrar no menu. Manda os dados cadastrados na web para o banco através da clausula INSERT-->

<?php
include_once("conexao.php");
$nome = $_GET['nome'];
$dia = $_GET['dia'];
$mes = $_GET['mes'];
$ano = $_GET['ano'];
$categoria_id = $_GET['categoria_id'];
$sal = $_GET['sal'];


if($dia == "") {
	echo "Escolha o dia que você nasceu!";
	exit;
} else {
	if($mes == "") {
		echo "Escolha o mês que você nasceu!";
		exit;
	} else {
		if($ano == "") {
			echo "Escolha o ano que você nasceu!";
			exit;
		} else {
			$data_nasc = $dia."/".$mes."/".$ano;
		}
	}
}

$result_dadosusuarios = "INSERT INTO dadosusuarios (nome, categoria_id, data_nasc, sal) 
     values('$nome', '$categoria_id', '$data_nasc', '$sal')";
$resultado_dadosusuarios = mysqli_query($conn, $result_dadosusuarios);

if(mysqli_insert_id($conn)){
	echo "<script>alert('Usuário cadastrado!');</script>";
echo '<script>window.location="http://localhost/trab-andre2/listar_usuario.php";</script>';
}else{
	echo "Erro ao inserir o usuário!<br>";
}


