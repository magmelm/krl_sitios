

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subir Imagen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
<br>
<div class="container">
  <h2>Agregar Sitio</h2>


  <form action="subir_imagen.php"  method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="sitio">Sitio:</label>
      <input type="text" class="form-control" id="sitio" placeholder="Capturar sitio" name="sitio">
    </div>


    <div class="form-group">
      <label for="url">URL:</label>
      <input type="text" class="form-control" id="url" placeholder="Capturar URL" name="url">
    </div>


    <div class="form-group">
      <label for="categoria">Categoria:</label>
      <input type="text" class="form-control" id="categoria" placeholder="Capturar Categoria" name="categoria">
    </div>

    <div class="form-group">
      <label for="imagen">Imagen:</label>
      <input type="file" class="form-control" id="imagenID" placeholder="Seleccionar Imagen" name="imagenID">
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="psswd" placeholder="Enter password" name="psswd">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


</div>

</body>
</html>

