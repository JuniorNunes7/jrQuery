<!DOCTYPE html>
<?php 
    function __autoload($class_name) {
        require_once 'classes/' . $class_name . '.php';
    }
 ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

    <?php 
        $usuario = new Usuario;

        $usuario->setNome('José');
        $usuario->setEmail('jose@email.com');

        if($usuario->insert()) {
            print_r($usuario->findAll());
        }
    ?>
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
    </form>
</body>
</html>

<script src="js/jrQuery.js"></script>
<script src="js/socialshare.js"></script>
<script>

// Usando o alias do jrQuery
$.fn.teste = function(){
    this.each(function(index, el) {
        console.log(el);       
    });
}
//

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

    $('input').mask("(##) 0000-0000");

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
}

</script>

<script src="js/formValidate.js"></script>