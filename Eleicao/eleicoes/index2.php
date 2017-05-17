
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="js/jquery-ui.css">
  <script src="js/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i}; 
    return i;
}
</script>
</head>

<body onload="startTime()">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Eleições</a>
    </div>
    <ul class="nav navbar-nav">
    
    <?php 
      if(@!$dominio){
      ?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="index.php">Ínicio</a></li>
     
      <?php 
      if(@$dominio == "/eleicoes/eleitorcad.php"){
      ?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="eleitorcad.php">Site de cadastro do eleitor</a></li>
     
      <?php if(@$dominio == "/eleicoes/candcad.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?><a href="candcad.php">Possue código de acesso ao partido?</a></li>
      <?php if(@$dominio == "/eleicoes/vota.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="vota.php">Vote agora</a></li>
      <?php if(@$dominio == "/eleicoes/consultele.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="consultele.php">Consulte seu título de eleitor</a></li>
      <?php if(@$dominio == "/eleicoes/consultidato.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="consultidato.php">Consulte a apuração de voto</a>
      </li>
      <li>
      <font  align="center" color="white" id='txt'></font>
      </li>
    </ul>
  </div>
</nav>
  
<div class="container">
 
   
