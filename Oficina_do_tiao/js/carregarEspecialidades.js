/* Tirar o visibility hidden do css
$(function(){
    var atual = -1;
    var maximo = $('.box-especialidades').length -1;
    var timer;
    var animacaoDelay = 0.8;

    executarAnimacao();

    function executarAnimacao(){
        $('.box-especialidades').hide();
        timer = setInterval(logicaAnimacao ,animacaoDelay*1000);

        function logicaAnimacao(){
            
            atual++;
            if (atual > maximo){
                clearInterval(timer);
                return false;
            }
            

            $('.box-especialidades').eq(atual).fadeIn();

        }
    }

}) */

//Exemplo 2 


$(function() {
    var atual = -1;
    var maximo = $('.box-especialidades').length - 1;
    var timer;
    var animacaoDelay = 0.8;
  
    executarAnimacao();
  
    function executarAnimacao() {
      timer = setInterval(logicaAnimacao, animacaoDelay * 1000);
  
      function logicaAnimacao() {
        atual++;
        if (atual > maximo) {
          clearInterval(timer);
          return false;
        }
  
        $('.box-especialidades').eq(atual).css('opacity', '0').animate({
          opacity: 1
        }, 500); // anima a opacidade de 0 a 1 durante 500ms (meio segundo)
      }
    }
  });
  