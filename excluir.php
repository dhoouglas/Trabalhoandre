<!-- Modal Excluir (Função encontra-se no arquivo js/personalizado.js). Exclui os dados da tabela através da clausula DELETE-->

<?php
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); //$_GET['id'];

$result_dadosusuarios = "delete from dadosusuarios where id=$id";
$resultado_dadosusuarios = mysqli_query($conn, $result_dadosusuarios);

if(mysqli_affected_rows($conn)){
	echo "<script>alert('Usuário excluido!');</script>";
   echo '<script>window.location="http://localhost/trab-andre2/listar_usuario.php";</script>';
}else{
	echo "Erro ao deletar o usuário!<br>";
}