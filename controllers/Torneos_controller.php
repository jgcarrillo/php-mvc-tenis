<?php

require_once '../models/Torneos_model.php';

class Torneos_controller {
  private $torneos_model;

  public function __construct(){
    $this->torneos_model = new Torneos_model();
  }

  public function home(){
    require_once '../views/home_vista.php';
  }

  public function listarJugadores() {
    $jugadores = $this->torneos_model->getJugadores();

    require_once '../views/jugadores_vista.php';
  }

  public function listarTorneos() {
    $torneos = $this->torneos_model->getTorneos();

    require_once '../views/torneos_vista.php';
  }

  public function listarFases() {
    $fases = $this->torneos_model->getFases();

    require_once '../views/fases_vista.php';
  }

  public function listarPartidos() {
    $partidos = $this->torneos_model->getPartidos();

    require_once '../views/partidos_vista.php';
  }

  public function listarPartidosPorTorneo(int $id) {
    $partidosPorTorneo = $this->torneos_model->getPartidosPorTorneo($id);

    require_once '../views/partidos_por_torneo_vista.php';
  }

  public function nuevo() {
    require_once '../views/nuevo_vista.php';
  }

  public function insertarJugador() {
    $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : null;
    $nacionalidad = !empty($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;

    $this->torneos_model->addJugador($nombre, $nacionalidad);

    header('Location: Torneos_controller.php?opcion=jugadores');
    die();
  }

  public function borrarJugador(int $id) {
    $this->torneos_model->deleteJugador($id);

    header('Location: Torneos_controller.php?opcion=jugadores');
    die();
  }

  public function editarJugador(int $id) {
    $jugador = $this->torneos_model->getJugador($id);

    require_once '../views/editar_jugador_vista.php';
  }

  public function actualizar() {
    $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : null;
    $nacionalidad = !empty($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
    $id = !empty($_POST['oculto']) ? $_POST['oculto'] : null;

    $this->torneos_model->editarJugador($nombre, $nacionalidad, $id);

    header('Location: Torneos_controller.php?opcion=jugadores');
    die();
  }

  public function nuevoPartido(){
    $torneos = $this->torneos_model->getTorneos();
    $jugadores = $this->torneos_model->getJugadores();
    $fases = $this->torneos_model->getFases();

    require_once '../views/nuevo_partido_vista.php';
  }

  public function addPartido() {
    $torneo = !empty($_POST['nombre']) ? $_POST['nombre'] : null;
    $ganador = !empty($_POST['ganador']) ? $_POST['ganador'] : null;
    $perdedor = !empty($_POST['perdedor']) ? $_POST['perdedor'] : null;
    $fase = !empty($_POST['fases']) ? $_POST['fases'] : null;
    $resultado = !empty($_POST['resultado']) ? $_POST['resultado'] : null;

    $this->torneos_model->addPartido($torneo, $ganador, $perdedor, $fase, $resultado);

    header('Location: Torneos_controller.php?opcion=partidos');
    die();
  }

  public function playerData(int $id){
    $datosPorTorneo = $this->torneos_model->getPartidosPorJugador($id);
    $jugador = $this->torneos_model->getJugador($id);

    require_once '../views/jugador_datos_vista.php';
  }
}

$torneo = new Torneos_controller();

if(isset($_GET['opcion']) && $_GET['opcion'] == 'jugadores') {
  $torneo->listarJugadores();
} else if(isset($_GET['opcion']) && $_GET['opcion'] == 'torneos') {
  $torneo->listarTorneos();
} else if(isset($_GET['opcion']) && $_GET['opcion'] == 'fases') {
  $torneo->listarFases();
} else if(isset($_GET['opcion']) && $_GET['opcion'] == 'partidos') {
  $torneo->listarPartidos();
} else if(isset($_GET['opcion']) && isset($_GET['id']) && $_GET['opcion'] == 'torneo') {
  $id = $_GET['id'];

  $torneo->listarPartidosPorTorneo($id);
} else if(isset($_GET['opcion']) && $_GET['opcion'] == 'nuevo') {
  $torneo->nuevo();
} else if(isset($_GET['opcion']) && $_GET['opcion'] == 'add') {
  $torneo->insertarJugador();
} else if(isset($_GET['opcion']) && isset($_GET['id']) && $_GET['opcion'] == 'borrar') {
  $id = $_GET['id'];
  $torneo->borrarJugador($id);
} else if(isset($_GET['opcion']) && isset($_GET['id']) && $_GET['opcion'] == 'editar') {
  $id = $_GET['id'];

  $torneo->editarJugador($id);
} else if(isset($_GET['opcion']) && isset($_GET['id']) && $_GET['opcion'] == 'actualizar') {
  $id = $_GET['id'];

  $torneo->actualizar();
} else if(isset($_GET['opcion']) && $_GET['opcion'] == 'nuevoPartido') {
  $torneo->nuevoPartido();
} else if(isset($_GET['opcion']) && $_GET['opcion'] == 'addPartido') {
  $torneo->addPartido();
} else if(isset($_GET['opcion']) && isset($_GET['id']) && $_GET['opcion'] == 'datos') {
  $id = $_GET['id'];
  
  $torneo->playerData($id);
} else {
  $torneo->home();
}
