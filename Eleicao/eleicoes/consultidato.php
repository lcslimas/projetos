<?php 
@$dominio = $_SERVER['REQUEST_URI'];
include "testitulo.php";
include "index2.php";
$query = mysqli_query($conexao,"Select * from candidato");

?>
<script>
function graph(y){
  alert('Esse candidato contém: '+y+'% dos votos');
}

$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>
<head>
<script>
$(function(){
	var candidato = [
	<?php 
	while($array = mysqli_fetch_array($query)){
   		echo '"'.$array['nome'].'",';
   	}
	?>
	];
	$("#tags").autocomplete({
		source: candidato
	});
});


</script>
</head>

<Form action='consultidato.php' method='post'>	
	<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" id='tags' name='candidato' placeholder="Pesquise pelo candidato">
      <span class="input-group-btn">
        <input type='submit' class="btn btn-default">
      </span>
    </div>
  </div>
</div>
    *Passe o mouse em cima do número de votos para obter a porcentagem de votos*
</Form>
<div class="panel panel-default">
  <table class="table" >
    <tr><th>Nome:</th><th>Partido:</th><th>Idade:</th><th>Votos:</th><th>Gráfico:</th</tr>
    <?php 
    @$candidato= $_POST['candidato'];
    if(empty($candidato)){
$query = mysqli_query($conexao,"Select v.*,c.*,p.nome as partido,p.id_partido from partido as p, candidato as c, voto as v where c.id_candidato=v.id_candidato and c.id_partido = p.id_partido");
   	}else{
$query = mysqli_query($conexao,"Select v.*, c.*, p.nome as partido, p.id_partido from partido as p, voto as v, candidato as c  where c.nome = '$candidato' and c.id_candidato=v.id_candidato and c.id_partido=p.id_partido");
   	}
    $calculo = 0;
    $consultavoto = mysqli_query($conexao,"select v.*,c.* from voto as v, candidato as c where v.id_candidato = c.id_candidato");
    while($calc = mysqli_fetch_array($consultavoto)){
  $calculo = $calculo + $calc['votos'];
    }
   	while($array = mysqli_fetch_array($query)){
      @$graph = ($array['votos']*100)/$calculo ; 
   		echo "<tr><td>".$array['nome']."</td><td>".$array['partido']."</td><td>".$array['idade']."</td><td onmouseover='graph($graph)'>".$array['votos']."</td> <td><div class='progress'>
  <div class='progress-bar' role='progressbar' aria-valuenow='70'
  aria-valuemin='0' aria-valuemax='100' style='width:$graph%'>
    <span class='sr-only'>$graph% Complete</span>
  </div>
</div></td></tr>";
   	}
    ?>
  </table>

</div>

<?php 
if (mysqli_num_rows($query)==0) {
   		echo "<div class='alert alert-danger' role='alert'>Candidato não existente</div>";
   	}

?>
