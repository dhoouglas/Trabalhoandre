
<!-- Faz o select e traz para a tabela*********************************************************** -->
<?php
	include_once("conexao.php");
	$result_dadosusuarios = "SELECT * FROM dadosusuarios";
	$resultado_dadosusuarios = mysqli_query($conn, $result_dadosusuarios);
  
?>
<!-- Faz o select e traz para a tabela*********************************************************** -->
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/estilo.css" rel="stylesheet">
		
		<title>Cadastro</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
	</head>
	<body>	
		<!-- Botão de cadastro no menu*********************************************************** -->
		<nav class="navbar navbar-expand-md bg-danger navbar-dark">	
	<button class="btn-danger" data-toggle="modal" data-target="#modal-mensagem" href="#modal-mensagem" id="navbardrop">Cadastrar Usuário</a>
			</nav>
		<!-- Botão de cadastro no menu*********************************************************** -->
		
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Listar Usuários</h1>
				
			</div>
			<!-- Datatable*********************************************************** -->
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Data Nascimento</th>
								<th>Gravidade Doença</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_dadosusuarios = mysqli_fetch_assoc($resultado_dadosusuarios)){ ?>
								<tr>
									<td><?php echo $rows_dadosusuarios['id']; ?></td>
									<td><?php echo $rows_dadosusuarios['nome']; ?></td>
									<td><?php echo $rows_dadosusuarios['data_nasc']; ?></td>
									<?php if($rows_dadosusuarios['categoria_id']=="baixa"){ ?>
									<td style="background-color:#90EE90; font-weight:bold;">
													<?php	echo "Baixa"; ?>
												<?php	} ?></td>
									<?php if($rows_dadosusuarios['categoria_id']=="media"){ ?>
									<td style="background-color:#F0E68C; font-weight:bold;">
													<?php	echo "Média"; ?>
												<?php	} ?></td>
									<?php if($rows_dadosusuarios['categoria_id']=="alta"){ ?>
									<td style="background-color:#FF6347; font-weight:bold;">
													<?php	echo "Alta"; ?>
												<?php	} ?></td>
									
									<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_dadosusuarios['id']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_dadosusuarios['id']; ?>" data-whatevernome="<?php echo $rows_dadosusuarios['nome']; ?>"data-whateversal="<?php echo $rows_dadosusuarios['sal']; ?>"data-whatevercategoria_id="<?php echo $rows_dadosusuarios['categoria_id']; ?>">Editar</button>
										
										<?php echo "<a class='btn btn-xs btn-danger' href='excluir.php?id=" . $rows_dadosusuarios['id'] . "' data-confirm='Tem certeza que deseja excluir esse usuário?'>Apagar</a>"; ?>
										<!--<button type="button" class="btn btn-xs btn-danger" data-toggle="modal">Apagar</button>-->
									</td>
								</tr>
								<!-- Inicio Modal visualizar usuario *********************************************************** -->
								<div class="modal fade" id="myModal<?php echo $rows_dadosusuarios['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-danger text-white">
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_dadosusuarios['nome']; ?></h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
											</div>
											<div class="modal-body">
												<p><?php echo "ID: " . $rows_dadosusuarios['id']; ?></p>
												<p><?php echo "Nome: " . $rows_dadosusuarios['nome']; ?></p>
												<p><?php echo "Salário: R$" . $rows_dadosusuarios['sal']; ?></p>
												<p><?php echo "Gravidade: " . $rows_dadosusuarios['categoria_id']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal visualizar usuario ***************************************************************** -->
							<?php } ?>
						</tbody>
					 </table>
				</div>
				<!-- Datatable*********************************************************** -->
			</div>		
		</div>

		<!--Modal Editar-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header bg-danger text-white">
				  <h4 class="modal-title" id="exampleModalLabel"> - </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>			
			  </div>
			  <div class="modal-body">
				<form method="POST" action="processa.php" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome:</label>
					<input name="nome" type="text" class="form-control" id="recipient-name">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="control-label">Salário:</label>
					<textarea name="sal" class="form-control" id="sal" maxlength="10"></textarea>
				  </div>
					<div class="form-group">
					<label for="message-text" class="control-label">Gravidade Doença:</label>
						<br/>
					 <td valign="middle">
                      <label for="select"></label>
                       <select name="categoria_id" id="categoria_id">
                       <option value="">Gravidade</option>
		               <option value="baixa" id="n1">1- Baixa</option>
                       <option value="media">2- Média</option>
					   <option value="alta">3- Alta</option>
                     </select>
                     </td>
				  </div>
				<input name="id" type="hidden" class="form-control" id="id-dadosusuarios" value="">
				
				<button type="submit" class="btn btn-success">Alterar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>
		<!--Modal Editar-->
		
		<!-- Modal cadastrar usuario **************************************************************-->
		<div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
             <div class="modal-header bg-danger text-white">
				 <h4 class="modal-title">Cadastrar usuário!</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
             </div>
            <!-- Modal body *********************************************************************-->
        <div class="modal-body">
			   <!--Formulario dentro do Modal ********************************************-->
          <form action="incluir.php" enctype="multipart/form-data" method="GET">   		  
          
		   <div class="form-group">		    				
              <label for="name" class="control-label">Nome</label><br/>
              <input name="nome" type="text" class="form-control" id="nome" size="30" maxlength="50" required />
			 </div>		
			  
			  <div class="form-group">		   
            <tr><br/>			
              <td height="26" align="right" valign="middle" bgcolor="#0000FF">Gravidade Doença: </td>
				<br/>				
            <td valign="middle">
              <label for="select"></label>
              <select name="categoria_id" id="categoria_id">
                <option value="">Gravidade</option>
		        <option value="baixa">1- Baixa</option>
                <option value="media">2- Média</option>
				<option value="alta">3- Alta</option>
                </select>
             </td>
          </tr>
      <br/>
      <tr>
</div>
			    <div class="form-group">		   
            <tr><br/>			
              <td height="26" align="right" valign="middle" bgcolor="#0000FF">Data de Nascimento: </td>
				<br/>				
            <td valign="middle" bgcolor="#CCCCCC">Dia
              <label for="select"></label>
              <select name="dia" id="dia">
                <option value="">  </option>
				<option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
               Mês
              <label for="label5"></label>
              <select name="mes" id="mes">
                <option value="">  </option>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
              </select>
               Ano
              <label for="label6"></label>
              <select name="ano" id="ano">
                <option value="">  </option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
              </select>
            </td>
          </tr>
      <br/>
      <tr>
	      </div>
		      <div class="form-group"><br/>
		     <label for="name" class="control-label">Salário</label><br/>
              <input name="sal" type="text" class="form-control" id="sal" size="30" maxlength="50" required />
			<br/>
		</div>
       </div>
		 <br/>
       			  
             <!-- Modal footer ************************************************************** -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
		  <button type="submit" class="btn btn-primary" value="Atualizar">Cadastrar</button>
        </div>
      </form>
			<!--Fim Formulario dentro do Modal ********************************************-->
        </div>  
     </div>
	</div>
 </div>
	<!-- Fim modal cadastrar usuario *********************************************************************-->

    <!-- jQuery (necessário para os plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Inclua todos os plug-ins compilados (abaixo) ou inclua arquivos individuais conforme necessário -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botão que acionou o modal
		  var recipient = button.data('whatever') // Extrair informações dos atributos data
		  var recipientnome = button.data('whatevernome')
		  var recipientsal = button.data('whateversal')
		  // Se necessário, você pode iniciar uma solicitação AJAX aqui (e depois fazer a atualização em um retorno de chamada).
          // Atualize o conteúdo do modal. Vamos usar o jQuery aqui, mas você pode usar uma biblioteca de ligação de dados ou outros métodos.
		  var modal = $(this)
		  modal.find('.modal-title').text('ID ' + recipient)
		  modal.find('#id-dadosusuarios').val(recipient)
		  modal.find('#recipient-name').val(recipientnome)
		  modal.find('#sal').val(recipientsal)
		  
		})
	</script>
<script>
	$("#btn-mensagem").click(function(){
    $("#modal-mensagem").modal();
});
</script>
	
	<script>
    $(document).ready(function(){

        $("#n1").click(function(){
            $("#verde").attr("style" , "background-color:green; color:black");
        });
      });

    </script>
	
<script src="js/personalizado.js"></script>
  </body>
</html>