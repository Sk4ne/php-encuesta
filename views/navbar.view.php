<?php 
  // require_once 'header.view.php';
  require_once __DIR__.'/./header.view.php';
  require_once __DIR__.'/../helpers/config.php';

?>

<header class='headerMain bg-dark'>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Generador | Encuestas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <ul class="navbar-nav mr-auto"> -->
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item active"> -->
          <li class="nav-item">
            <a class="nav-link active" id='changeStyle' href="<?php echo URL;?>/views/home.view.php">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL;?>/views/answer.view.php">ENCUESTAS</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
