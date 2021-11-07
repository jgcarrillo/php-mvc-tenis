<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center mt-4">Fases</h1>
      <div class="col mt-2">
        <table class="table table-striped text-center mx-auto">
          <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Pais</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($fases as $fase) : ?>
            <tr>
              <td scope="row"><?= $fase['fase'] ?></td>
              <td scope="row"><?= $fase['orden'] ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
