<?php
@$dominio = $_SERVER['REQUEST_URI'];
include "index2.php";
include "testitulo.php";
	$conexao = mysqli_connect("localhost","root","","eleicao");
?>
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
<div class="panel panel-default">
<div class="panel-heading">Votação</div>
<form action="vota.php" method="post">
	<div class="input-group input-group-lg">
	<span class="input-group-addon" id="sizing-addon1">
			<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
		</span>
	<input type="text" name="titulo" class="form-control" placeholder='Digite o titulo...' required>
	</div>
	<div class="input-group input-group-lg">
	<span class="input-group-addon" id="sizing-addon1">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
	</span>
	<select name='candidato' required class='form-control'>
	<option value="" ><----------------------------------------------------------------Selecione um candidato----------------------------------------------------------------></option>
	<?php 
	$conexao = mysqli_connect("localhost","root","","eleicao"); 
	$query = mysqli_query($conexao,"Select c.nome as candidato , c.*, p.nome as partido, p.id_partido , c.id_partido from candidato as c, partido as p where c.id_partido=p.id_partido");
	while($linha = mysqli_fetch_array($query)){ 
	?>
		<option value=<?php echo $linha['id_candidato']?> ><?php echo $linha['candidato']." - ". $linha['partido']; ?></option>
		<?php }?>
	</select>
	</div>
	<br>

	<input type="submit" value="Votar" class="form-control">

</form>
</div>
</body>
</html>
<?php 

@$titulo = $_POST['titulo'];
@$candidato = $_POST['candidato'];

$q = mysqli_query($conexao, "select * from eleitor where titulo = '$titulo'");
$qu =mysqli_fetch_array($q);
if ($qu['titulo']==$titulo && isset($titulo) && $candidato!="") {
tituloexist($titulo);
$quer= mysqli_query($conexao,"select * from voto where id_candidato = '$candidato'");
$result = mysqli_fetch_array($quer);
$idca= $result['id_candidato'];
$votca = $result['votos'] + 1;
$titulos= $result['titulos']."/".$titulo;
$query = mysqli_query($conexao,"update voto set votos = '$votca', titulos = '$titulos' where id_candidato = '$idca'");
echo "<script> alert('Voto cadastrado'); window.location.href='consultidato.php'</script>";
}else if(isset($titulo)){
	die("<script>alert('Titulo não encontrado');</script>");
}


?>