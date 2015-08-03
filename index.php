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
            <input id="teste" type="checkbox" disabled>

            teste2
            <input id="teste12" type="checkbox">

            <div id="response"> <h1>TESTE DE DIV </h1> <hr> </div>
        </div>
    </form>
</body>
</html>

<script src="js/jrQuery.js"></script>
<script>

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
        // $('span').removeClass('message');
            
        // $.ajax({
        //     url: '/path/to/file',
        //     type: 'default GET (Other values: POST)',
        //     dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        //     data: {param1: 'value1'},
        // })
        // .done(function() {
        //     console.log("success");
        // })
        // .fail(function() {
        //     console.log("error");
        // })
        // .always(function() {
        //     console.log("complete");
        // });
        
        $.ajax({
            path: 'teste.php?teste=2',
            method: 'GET',
            response: 'text',
            parameters: {teste: 2}

        }, function(response){
            $('#response').prepend(response);
        });

        // $('input').ajax('teste.php?teste=2', 'GET', 'text', function(response){
        //     console.log(response);
        // });
        
        // Pegando elemento e chamando a função 'on' definida na classe
        $('input').on('blur', function(){

            console.log($(this).val());
            
            // Usando o this onde pega o elemento do evento
            $(this).on('click', function(){
                console.log($(this).hide());
            });
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