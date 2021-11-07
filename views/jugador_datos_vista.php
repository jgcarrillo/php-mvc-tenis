<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <h1 class="text-center mt-4">Jugador - <?= $jugador['nombre_jugador'] ?></h1>
    <div class="col mt-2">
      <table class="table table-striped table-info  text-center mx-auto mb-4">
        <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Nacionalidad</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row"><?= $jugador['nombre_jugador'] ?></td>
            <td scope="row"><?= $jugador['nacionalidad_jugador'] ?></td>
          </tr>
        </tbody>
      </table>

      <h2 class="text-center mt-4 mb-3">Partidos disputados</h2>
      <table class="table table-striped text-center mx-auto mt-4">
        <thead>
          <tr>
            <th scope="col">Nombre del torneo</th>
            <th scope="col">Ganador</th>
            <th scope="col">Perdedor</th>
            <th scope="col">Resultado</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $fase_actual = '';
              $fase_ultima = '';
            ?>
            <?php foreach($datosPorTorneo as $partido): ?>
              <?php $fase_actual = $partido['fase']; ?>

              <?php if($fase_actual != $fase_ultima) : ?>
            <tr>
              <td class="fw-bold" colspan="5"><?= $partido['fase']; ?></td>
            </tr>
            <tr>
              <td scope="row"><?= $partido['nombre_torneo'] ?></td>
              <td scope="row"><?= $partido['ganador'] ?></td>
              <td scope="row"><?= $partido['perdedor'] ?></td>
              <td scope="row"><?= $partido['resultado'] ?></td>
            </tr>
            <?php $fase_ultima = $fase_actual; ?>
            <?php else : ?>
              <tr>
                <td scope="row"><?= $partido['nombre_torneo'] ?></td>
                <td scope="row"><?= $partido['ganador'] ?></td>
                <td scope="row"><?= $partido['perdedor'] ?></td>
                <td scope="row"><?= $partido['resultado'] ?></td>
              </tr>
            <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
      </table>

      <a class="btn btn-primary" href="Torneos_controller.php?opcion=torneos">< Atrás</a>
    </div>
  </div>
</div>
</body>
</html>
