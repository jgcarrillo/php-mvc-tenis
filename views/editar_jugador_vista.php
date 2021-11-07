<?php include('../includes/head.php'); ?>

<body>

<?php include('../includes/nav.php'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">AÑADE UN NUEVO JUGADOR</h1>
      <form method="post" action="Torneos_controller.php?opcion=actualizar&id=<?= $jugador['id_jugador']; ?>">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $jugador['nombre_jugador']; ?>">
        </div>
        <div class="mb-3">
          <label for="nacionalidad" class="form-label">Nacionalidad</label>
          <input type="text" class="form-control" name="nacionalidad" value="<?= $jugador['nacionalidad_jugador']; ?>">
        </div>

        <input type="hidden" id="oculto" name="oculto" value="<?= $jugador['id_jugador']; ?>">

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a class="btn btn-primary" href="Torneos_controller.php?opcion=jugadores">< Atrás</a>
      </form>
    </div>
  </div>
</body>
</html>
