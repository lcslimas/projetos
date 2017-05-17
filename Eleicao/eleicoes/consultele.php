<?php 
@$dominio = $_SERVER['REQUEST_URI'];
include "testitulo.php";
include "index2.php";
$query = mysqli_query($conexao,"Select * from eleitor");

?>
<head>
<script>
$(function(){
	var eleitor = [
	<?php 
	while($array = mysqli_fetch_array($query)){
   		echo '"'.$array['nome'].'",';
   	}
	?>
	];
	$("#tags").autocomplete({
		source: eleitor
	});
});
</script>
</head>

<Form action='consultele.php' method='post'>	
	<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" id='tags' name='eleitor' placeholder="Pesquise pelo eleitor">
      <span class="input-group-btn">
        <input type='submit' class="btn btn-default">
      </span>
    </div>
  </div>
</div>
</Form>
<div class="panel panel-default">
  <table class="table" >
    <tr><th>Nome:</th><th>Idade:</th><th>Titulo:</th></tr>
    <?php 
    @$eleitor= $_POST['eleitor'];
    if(empty($eleitor)){
$query = mysqli_query($conexao,"Select * from eleitor");
   	}else{
$query = mysqli_query($conexao,"Select * from eleitor where nome = '$eleitor'");
   	}
   	while($array = mysqli_fetch_array($query)){
   		echo "<tr><td>".$array['nome']."</td><td>".$array['idade']."</td><td>".$array['titulo']."</td></tr>";
   	}
    ?>
  </table>

</div>

<?php 
if (mysqli_num_rows($query)==0) {
   		echo "<div class='alert alert-danger' role='alert'>Eleitor inexistente</div>";
   	}

?>