<?php
@$dominio = $_SERVER['REQUEST_URI'];
include("index2.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro do eleitor</title>
	<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>
</head>
<body>
<div class="panel panel-default">
<div class="panel-heading">Cadastro Eleitor</div>
<form action="eleitorcad.php" method="post">
	<div class="input-group input-group-lg">
		<span class="input-group-addon" id="sizing-addon1">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		</span>
			<input type="text" name="nome" class="form-control" placeholder='Digite o nome...' required>
	</div>
	<div class="input-group input-group-lg">
		<span class="input-group-addon" id="sizing-addon1">
			<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
		</span>
			<input type="text" name="idade" class="form-control" placeholder='Digite a idade...' required>
	</div>
	<div class="input-group input-group-lg">
	<span class="input-group-addon" id="sizing-addon1">
		<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
	</span>
	<input type="text" name="titulo" class="form-control" placeholder='Digite o título...' required>
	</div><br>
		<input type="submit" value="Cadastrar" class="form-control">
	
</form>
</div>
</body>
</html>
<?php 
$conexao = mysqli_connect("localhost","root","","eleicao");
@$nome = $_POST['nome'];
@$idade = $_POST['idade'];
@$titulo = $_POST['titulo'];
if (isset($idade) && isset($nome) && isset($titulo)) {
$query = mysqli_query($conexao,"insert into eleitor values('','$nome',$idade,$titulo)");
if($query && $idade >= 16){

echo "<script> alert('Cadastro concluído com sucesso!!'); window.location.href='vota.php'; </script>"; 

}else{
	if($idade<16){
echo "<script> alert('Eleitor tem que ser maior que 16 anos'); </script>"; 

	}else{
echo "<script> alert('Título de eleitor já cadastrado'); </script>"; 
	}

}
}
?>