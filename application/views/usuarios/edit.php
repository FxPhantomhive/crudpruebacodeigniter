<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>body{font-family:"Roboto" !important;}</style>
    
    <title>Editar Usuario</title>
  </head>
  <body>

    <div class="container">
        <h1 class="mt-5">Editar usuario <?php echo $nombre; ?></h1>
        <form action="<?php echo base_url(); ?>editar-usuario/update/<?php echo $id; ?>" method="POST" class="mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="FullName" class="form-control <?php echo form_error('FullName') ? 'is-invalid':''; ?>" placeholder="Nombre completo" value="<?php echo $nombre; ?>">
                        <div class="invalid-feedback">
                        <?php echo form_error('FullName'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="Email" class="form-control <?php echo form_error('Email') ? 'is-invalid':''; ?>" aria-describedby="emailHelp" placeholder="Correo eléctronico" value="<?php echo $email; ?>">
                        <div class="invalid-feedback">
                        <?php echo form_error('Email'); ?>
                        </div>
                    </div>
                </div>
                

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  </body>
</html>