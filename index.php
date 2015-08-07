<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teste</title>
</head>

<style>
    .message {
        color: red;
        display: block;
    }
    .error {
        border: 1px red solid;
    }

</style>

<body>
    <form action="index.php" id="form">
        <label for="youtube">Link Youtube: </label>
        <input type="text" required data-message="Digite um endereço do youtube !" pattern="^.*(youtube\.com|youtu\.be)/.+$"><span class="message"></span>
        <label for="facebook">Link Facebook: </label>
        <input type="text" required data-message="Digite um endereço do facebook !" name="facebook" pattern="^.*facebook\.com/.+$"><span class="message"></span>
        <label for="twitter">Link Twitter: </label>
        <input type="text" required data-message="Digite um endereço do twitter !" pattern="^.*twitter\.com/.+$"><span class="message"></span>
        <button>Enviar</button>
        <button type="button" id="teste2">Teste</button>

        <div class="teste">
            <span>teste</span>
            <input type="text" value="def">
            <input type="text" value="ghi">
            <input type="text" id="now" value="abc" style="cursor:pointer; text-align: center;">
            
            teste
            <input id="teste" type="checkbox" disabled checked>

            teste2
            <input id="teste12" type="checkbox">

            <div id="response"> <h1>TESTE DE DIV </h1> <hr> </div>
        </div>

        <select name="select" id="select">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3" selected>3</option>
            <option value="4">7</option>
        </select>

        <input type="text" maxlength="10" onkeypress="return mascaraData(this, event.charCode)">
        <input type="text" maxlength="11" onkeypress="return isNumber(event.charCode)">
    </form>
</body>
</html>

<script src="js/jrQuery.js"></script>
<script src="js/socialshare.js"></script>
<script>

$.fn.teste = function(){
    this.each(function(index, el) {
        console.log(el);       
    });
}
    // Mascara de Data
        function mascaraData(t, tecla){
            var data = t.value;

            if(tecla != 0){
                if(!isNumber(tecla)) {
                    return false;

                } else if (data.length == 2) {
                    t.value = data + '/';
                
                } else if (data.length == 5) {
                    t.value = data + '/';

                } else if (data.length > 9) {
                    return false;

                }
            }

            return true;
        }

        function isNumber(tecla) {
            return ( ( tecla > 47 && tecla < 58 ) || tecla == 0 );
        }
    //

    // Classe em javascript
    function pessoa(firstname, lastname, age, sex){
        this.firstname = firstname;
        this.lastname = lastname;
        this.age = age;
        this.sex = (sex == "M") ? "Masculino" : "Feminino";

        this.name = function(){ return this.firstname + " " + this.lastname; };
        this.listarInfo = function(){
            return "Nome: " + this.name() +
                    "\nIdade: " + this.age +
                    "\nSexo: " + this.sex;
        };
    }
    //

    var ready = (function(){
        var joao  = new pessoa("João", "Silva", 20, "M");
        var maria = new pessoa("Maria", "Santos", 37, "F");

        console.log(joao.listarInfo());

    });

    ready();

    // Sair da página
    window.onblur = function() {
        document.title = "Sua reserva te espera";
    }

    // Entrar na página
    window.onfocus = function() {
        document.title = "Teste";
    }

    // Carregar a página
    window.onload = function(){
        // handlingForm('form',  'blur');
        // $('input').teste();
        // $.ajax({
        //     path: 'teste.php',
        //     method: 'GET',
        //     response: 'text',
        //     parameters: {teste: 2,
        //                  teste2: 3}

        // }, function(response){
        //     $('#response').prepend(response);
        // });

        $('input').mask("(00) 0000-0000");

        // $('input').ajax('teste.php?teste=2', 'GET', 'text', function(response){
        //     console.log(response);
        // });

        // Pegando elemento e chamando a função 'on' definida na classe
        $('input').on('blur', function(){

            console.log($(this).val());
            
            // Usando o this onde pega o elemento do evento
            // $(this).on('click', function(){
            //     console.log($(this).hide());
            // });
        });

        $('#teste2').on('click', function(){
            $('input').each(function(index, el) {
               // $(el).removeClass('teste');
               return; 
            });    
            //$('input').addClass('class_name');
            // $('input').each(function(i, input){
            //     if($(input).isHide())
            //         $(input).show();
            //     else
            //         $(input).hide();
            // });
        });
    }

</script>

<script src="js/formValidate.js"></script>