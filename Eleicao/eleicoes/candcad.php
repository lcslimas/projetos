<?php
@$dominio = $_SERVER['REQUEST_URI'];
include("index2.php");
?>
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
<div class="panel-heading">Cadastro Candidato</div>
<form action="candcad.php" method="post">
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
			<input type="text" name="senha" class="form-control" placeholder='Digite o número do partido...' required>
	</div><br>
		<input type="submit" value="Cadastrar" class="form-control">
	
</form>
</div>


</body>
</html>
<?php 
@$nome = $_POST['nome'];
@$idade = $_POST['idade'];
@$senha = $_POST['senha'];
@$conexao = mysqli_connect("localhost","root","","eleicao");
@$quer = mysqli_query($conexao,"select * from partido where numero= '$senha' ");
while (@$linha = mysqli_fetch_array($quer)) { 
	if ($quer = $linha['numero']){
		@$id = $linha['id_partido'];
		}
	}
		if(@$id!=0 && $idade >=18){
			$q = mysqli_query($conexao,"SELECT * FROM CANDIDATO order by id_candidato desc");
			$result = mysqli_fetch_array($q);
			$id_candidato = $result['id_candidato'] + 1;
		@$query = mysqli_query($conexao,"insert into candidato values('','$nome',$idade,$id)");
		mysqli_query($conexao,"insert into voto values('$id_candidato','','')");
	echo "<script> alert('Cadastro concluído com sucesso!!'); window.location.href='vota.php'; </script>"; 

}else if(isset($idade) && isset($nome)&& isset($senha)){
	if($idade<18){
echo "<script> alert('Candidato tem que ser maior que 18 anos'); </script>"; 

	}else{
echo "<script> alert('Não existe o número desse partido'); </script>"; 
}
}
	




?>