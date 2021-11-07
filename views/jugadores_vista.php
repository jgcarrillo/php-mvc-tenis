<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <h1 class="text-center mt-4">Jugadores</h1>
    <div class="col mt-2">
      <table class="table table-striped text-center mx-auto">
        <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Nacionalidad</th>
          <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jugadores as $jugador) : ?>
          <tr>
            <td scope="row"><?= $jugador['nombre_jugador'] ?></td>
            <td scope="row"><?= $jugador['nacionalidad_jugador'] ?></td>
            <td><a href="Torneos_controller.php?opcion=editar&id=<?= $jugador['id_jugador'] ?>">Editar</a></td>
            <td><a href="Torneos_controller.php?opcion=borrar&id=<?= $jugador['id_jugador'] ?>">Borrar</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>

      <a class="btn btn-success" href="Torneos_controller.php?opcion=nuevo">Añadir jugador</a>
    </div>
  </div>
</div>
</body>
</html>
