<?php
$conexao = mysqli_connect('localhost','root','','eleicao');
function tituloexist($titulo)
{
	$conexao = mysqli_connect("localhost","root","","eleicao");
	@$query = "SELECT * FROM voto";
	@$consul = mysqli_query($conexao,$query);
	while ($linha = mysqli_fetch_array($consul)) {
		$tit = explode('/',$linha['titulos']);
		foreach ($tit as $key => $value) {
			if ($value==$titulo) {
			die("<Script>alert('Titulo com voto ja cadastrado');</script>");
		}
		}
	}
}
?>