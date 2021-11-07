<?php

require_once('../db/ConexionPDO.php');

class Torneos_model {
  private $dbh;

  public function __construct(){
    $pdo = new ConexionPDO();
    $this->dbh = $pdo->getConexion();
  }

  public function getJugadores(){
    $stmt = $this->dbh->prepare("SELECT * FROM jugadores");
    $stmt->execute();

    $jugadores = $stmt->fetchAll();
    return $jugadores;
  }

  public function getTorneos() {
    $stmt = $this->dbh->prepare("SELECT * FROM torneos");
    $stmt->execute();

    $torneos = $stmt->fetchAll();
    return $torneos;
  }

  public function getFases() {
    $stmt = $this->dbh->prepare("SELECT * FROM fases");
    $stmt->execute();

    $fases = $stmt->fetchAll();
    return $fases;
  }

  public function getPartidos() {
    $stmt = $this->dbh->prepare("SELECT j.nombre_jugador as ganador, ja.nombre_jugador as perdedor, id_ganador, id_perdedor, nombre_torneo, fase, resultado FROM partidos p JOIN fases f ON p.id_fase = f.id_fase JOIN torneos t ON p.id_torneo = t.id_torneo JOIN jugadores j ON p.id_ganador = j.id_jugador JOIN jugadores ja ON p.id_perdedor = ja.id_jugador");
    $stmt->execute();

    $partidos = $stmt->fetchAll();
    return $partidos;
  }

  public function getPartidosPorTorneo(int $id) {
    $stmt = $this->dbh->prepare("SELECT j.nombre_jugador as ganador, ja.nombre_jugador as perdedor, id_ganador, id_perdedor, nombre_torneo, fase, resultado, p.id_fase FROM partidos p JOIN fases f ON p.id_fase = f.id_fase JOIN torneos t ON p.id_torneo = t.id_torneo JOIN jugadores j ON p.id_ganador = j.id_jugador JOIN jugadores ja ON p.id_perdedor = ja.id_jugador WHERE p.id_torneo = :id ORDER BY p.id_fase DESC");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $partidosPorTorneo = $stmt->fetchAll();
    return $partidosPorTorneo;
  }

  public function addJugador(string $nombre, string $nacionalidad) {
    $stmt = $this->dbh->prepare("INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES(:nombre, :nacionalidad)");
    $stmt->execute(array(
      ':nombre' => $nombre,
      ':nacionalidad' => $nacionalidad
    ));
  }

  public function deleteJugador(int $id) {
    $stmt = $this->dbh->prepare("DELETE FROM jugadores WHERE id_jugador = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function getJugador(int $id) {
    $stmt = $this->dbh->prepare("SELECT * FROM jugadores WHERE id_jugador = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $jugador = $stmt->fetch();
    return $jugador;
  }

  public function editarJugador(string $nombre, string $nacionalidad, int $id) {
    $stmt = $this->dbh->prepare("UPDATE jugadores SET nombre_jugador = :nombre, nacionalidad_jugador = :nacionalidad WHERE id_jugador = :id");
    $stmt->execute(array(
      ':nombre' => $nombre,
      ':nacionalidad' => $nacionalidad,
      ':id' => $id
    ));
  }

  public function addPartido(string $torneo, string $ganador, string $perdedor, string $fase, string $resultado) {
    $stmt = $this->dbh->prepare("INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(:id_torneo, :id_ganador, :id_perdedor, :resultado, :id_fase)");
    $stmt->execute(array(
      ':id_torneo' => $torneo,
      ':id_ganador' => $ganador,
      'id_perdedor' => $perdedor,
      'resultado' => $resultado,
      'id_fase' => $fase
    ));
  }

  public function getPartidosPorJugador(int $id){
    $stmt = $this->dbh->prepare("SELECT j.nombre_jugador as ganador, ja.nombre_jugador as perdedor, id_ganador, id_perdedor, nombre_torneo, fase, resultado, p.id_fase FROM partidos p JOIN fases f ON p.id_fase = f.id_fase JOIN torneos t ON p.id_torneo = t.id_torneo JOIN jugadores j ON p.id_ganador = j.id_jugador JOIN jugadores ja ON p.id_perdedor = ja.id_jugador WHERE p.id_ganador = :id OR p.id_perdedor = :id ORDER BY p.id_fase DESC");

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    $resultado = $stmt->fetchAll();
    return $resultado;
  }
}
