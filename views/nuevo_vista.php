<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center mt-4">Añade un nuevo jugador</h1>
      <form method="post" action="Torneos_controller.php?opcion=add">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
          <label for="nacionalidad" class="form-label">Nacionalidad</label>
          <input type="text" class="form-control" name="nacionalidad">
        </div>

        <button class="btn btn-success" type="submit" class="btn btn-primary">Añadir</button>
        <a class="btn btn-primary" href="Torneos_controller.php?opcion=jugadores">< Atrás</a>
      </form>
    </div>
  </div>
</body>
</html>
