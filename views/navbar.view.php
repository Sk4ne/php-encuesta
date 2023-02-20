<?php 
  require_once '../helpers/show_error.php';
  show_error();

   /* REQUIRE HEADER */
   require 'header.view.php';
   require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/helpers/info_db.php');
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Generador | Encuestas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URI; ?>/views/home.view.php">INICIO <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URI ; ?>/views/answer.view.php">ENCUESTAS</a>
      </li>
    </ul>
  </div>
</nav>