<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center mt-4">Partidos disputados</h1>
      <div class="col mt-2">
        <table class="table table-striped text-center mx-auto">
          <thead>
          <tr>
            <th scope="col">Nombre del torneo</th>
            <th scope="col">Ganador</th>
            <th scope="col">Perdedor</th>
            <th scope="col">Fase</th>
            <th scope="col">Resultado</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($partidos as $partido) : ?>
            <tr>
              <td scope="row"><?= $partido['nombre_torneo'] ?></td>
              <td scope="row"><?= $partido['ganador'] ?></td>
              <td scope="row"><?= $partido['perdedor'] ?></td>
              <td scope="row"><?= $partido['fase'] ?></td>
              <td scope="row"><?= $partido['resultado'] ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>

        <a class="btn btn-success" href="Torneos_controller.php?opcion=nuevoPartido">Añadir partido</a>
      </div>
    </div>
  </div>
</body>
</html>
