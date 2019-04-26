// Esta funcão permite interagir com o php a fim de gerar a exclusao da linha selecionada, perguntando se realmente
//deseja ou não excluir.

// Tudo que está na linha 10 dentro do append(), refere-se ao modal excluir

$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR USUÁRIO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><a class="btn btn-success text-white" id="dataComfirmOK">Sim</a><button type="button" class="btn btn-danger" data-dismiss="modal">Não</button></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});

