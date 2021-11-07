<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center mt-4">Partidos en el torneo -
      <?php foreach ($partidosPorTorneo as $partido) : ?>
        <?php
          echo $partido['nombre_torneo'];
          break;
        ?>
      <?php endforeach; ?>
      </h1>
      <div class="col mt-2">
        <table class="table table-striped text-center mx-auto">
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
          <?php foreach($partidosPorTorneo as $partido): ?>
            <?php $fase_actual = $partido['fase']; ?>

            <?php if($fase_actual != $fase_ultima) : ?>
            <tr>
              <td class="fw-bold" colspan="5"><?= $partido['fase']; ?></td>
            </tr>
            <tr>
              <td scope="row"><?= $partido['nombre_torneo'] ?></td>
              <td scope="row"><a href="Torneos_controller.php?opcion=datos&id=<?= $partido['id_ganador']; ?>"><?= $partido['ganador'] ?></a></td>
              <td scope="row"><a href="Torneos_controller.php?opcion=datos&id=<?= $partido['id_perdedor']; ?>"><?= $partido['perdedor'] ?></a></td>
              <td scope="row"><?= $partido['resultado'] ?></td>
            </tr>
            <?php $fase_ultima = $fase_actual; ?>
            <?php else : ?>
              <tr>
                <td scope="row"><?= $partido['nombre_torneo'] ?></td>
                <td scope="row"><a href="Torneos_controller.php?opcion=datos&id=<?= $partido['id_ganador']; ?>"><?= $partido['ganador'] ?></a></td>
                <td scope="row"><a href="Torneos_controller.php?opcion=datos&id=<?= $partido['id_ganador']; ?>"><?= $partido['perdedor'] ?></a></td>
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
