$(function(){
	

	$('body').on('submit','form',function(){
		var form = $(this);
		$.ajax({
			beforeSend:function(){
				$('.overlay-loading').fadeIn();
			},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType: 'json',
			data:form.serialize()
		}).done(function(data){
			if(data.sucesso){
				//Tudo certo vamos melhorar a interface!
				$('.overlay-loading').fadeOut();
				$('.sucesso').fadeIn()
				setTimeout(function(){
					$('.sucesso').fadeOut()
				}, 3000)
			}else{
				//Algo deu errado.
				$('.overlay-loading').fadeOut();
				$('.erro').fadeIn()
				setTimeout(function(){
					$('.erro').fadeOut()
				}, 3000)
			}
		});
		return false;
	})
})


/*$(function() {
  $('body').on('submit', 'form', function() {
    var form = $(this);
    $.ajax({
	  beforeSend:function(){
		$('.overlay-loading').fadeIn();
	  },
      url: include_path+'ajax/formularios.php',
      method: 'post',
      data: form.serialize(),
      dataType: 'json',
      success: function(data) {
        if (data.sucesso){
			$('.overlay-loading').fadeOut();
			console.log('tudo certo')
			alert('Enviado com sucesso! ')
		} else {
			$('.overlay-loading').fadeOut();
			console.log('Erro, não conseguimos conectar. Aqui está o json:')
			console.log(data)
			alert('Não conseguimos enviar')
		}
      },
      error: function(xhr, status, error) {
        console.log('Ocorreu um erro: ' + error + ' status: ' + status + ' xhr: ' + xhr);
      }
    });
    return false;
  });
});
*/


