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
      if(@$dominio == "/trab/index.php"){
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
      if(@$dominio == "/trab/eleitorcad.php"){
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
     
      <?php if(@$dominio == "/trab/candcad.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?><a href="candcad.php">Possue código de acesso ao partido?</a></li>
      <?php if(@$dominio == "/trab/vota.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="vota.php">Vote agora</a></li>
      <?php if(@$dominio == "/trab/consultele.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="consultele.php">Consulte seu título de eleitor</a></li>
      <?php if(@$dominio == "/trab/consultidato.php"){?>
      <li class='active'>
      <?php 
      }else{
      ?>
      <li>
      <?php 
      }
      ?>
      <a href="consultidato.php">Consulte a apuração de voto</a></li>
      <li>
      <font  align="center" color="white" id='txt'></font>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarouse1" data-slide-to="1"></li>
    <li data-target="#myCarouse1" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <img src="eleicoes1.jpg" alt="Eleições 2017">
    </div>

    <div class="item">
      <img src="eleicoes2.jpg" alt="Não venda seu voto, é crime.">
    </div>

    <div class="item">
      <img src="eleicoes3.jpg" alt="Candidatos a Presidência">
    </div>
  </div>

  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
