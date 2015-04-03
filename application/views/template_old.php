<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="utf-8">
   <title>Mi Sitio</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="<?= base_url('css/bootstrap-cerulean.css') ?>" rel="stylesheet">
</head>
<body>
  <div style="padding:30px 15px;"><!-- offset row negative padding -->
    <div class="row">
      <div class="col-md-3">
         <p>Menu del Sistema</p>
         <ul class="nav nav-pills nav-stacked">
           <li class="active"><?= anchor('home/index', 'Inicio') ?></li>
           <li><?= anchor('home/acerca_de', 'Acerca de...') ?></li>
           <li><a href="#">Mensajes</a></li>
         </ul>
      </div>
      <div class="col-md-9">
            <?= $this->load->view($contenido) ?>
      </div>
      </div>
  </div>
   <script src="<?= base_url('js/jquery.js') ?>"></script>
   <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>