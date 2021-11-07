<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center mt-4">Torneos disponibles</h1>
      <div class="col mt-2">
        <table class="table table-striped text-center mx-auto">
          <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Pais</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($torneos as $torneo) : ?>
            <tr>
              <td scope="row"><a href="Torneos_controller.php?opcion=torneo&id=<?= $torneo['id_torneo'] ?>"><?= $torneo['nombre_torneo'] ?></a></td>
              <td scope="row"><?= $torneo['fecha'] ?></td>
              <td scope="row"><?= $torneo['pais'] ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>
