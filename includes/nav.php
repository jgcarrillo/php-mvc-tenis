<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="Torneos_controller.php">MVC - Tenis</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= (isset($_GET['opcion']) && $_GET['opcion'] == 'torneos') ? 'active' : ''; ?>" aria-current="page" href="Torneos_controller.php?opcion=torneos">Torneos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (isset($_GET['opcion']) && $_GET['opcion'] == 'partidos') ? 'active' : ''; ?>" href="Torneos_controller.php?opcion=partidos">Partidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (isset($_GET['opcion']) && $_GET['opcion'] == 'fases') ? 'active' : ''; ?>" href="Torneos_controller.php?opcion=fases">Fases</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (isset($_GET['opcion']) && $_GET['opcion'] == 'jugadores') ? 'active' : ''; ?>" href="Torneos_controller.php?opcion=jugadores">Jugadores</a>
        </li>
      </ul>
    </div>
  </div>
</nav>