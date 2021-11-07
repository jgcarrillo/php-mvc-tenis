<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center mt-4">Añade un nuevo partido</h1>
      <form method="post" action="Torneos_controller.php?opcion=addPartido">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre del torneo</label>
          <select class="form-select" name="nombre" id="nombre">
            <?php foreach($torneos as $torneo) : ?>
              <option value="<?= $torneo['id_torneo'] ?>"><?= $torneo['nombre_torneo'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="ganador" class="form-label">Ganador</label>
          <select class="form-select" name="ganador" id="ganador">
            <?php foreach($jugadores as $jugador) : ?>
              <option value="<?= $jugador['id_jugador'] ?>"><?= $jugador['nombre_jugador'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="perdedor" class="form-label">Perdedor</label>
          <select class="form-select" name="perdedor" id="perdedor">
            <?php foreach($jugadores as $jugador) : ?>
              <option value="<?= $jugador['id_jugador'] ?>"><?= $jugador['nombre_jugador'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="fases" class="form-label">Fase</label>
          <select class="form-select" name="fases" id="fases">
            <?php foreach($fases as $fase) : ?>
              <option value="<?= $fase['id_fase'] ?>"><?= $fase['fase'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="resultado" class="form-label">Resultado</label>
          <input type="text" class="form-control" name="resultado">
        </div>

        <button class="btn btn-success" type="submit" class="btn btn-primary">Añadir</button>
        <a class="btn btn-primary" href="Torneos_controller.php?opcion=partidos">< Atrás</a>
      </form>
    </div>
  </div>
</body>
</html>
