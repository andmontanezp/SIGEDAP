<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url('img/favicon.ico') ?>" type="image/x-icon" />
    <title>::Supra Caracas C.A::</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?= base_url('css/micss.css')?>" rel="stylesheet">
    <link href="<?= base_url('css/offcanvas.css')?>" rel="stylesheet">
    <link href="<?= base_url('css/bootstrap-datetimepicker.css')?>" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?= $titulo ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav" style="position:relative; z-index:1000;">
            <?= my_menu_ppal(); ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container" style="width:100%;">
      <div class="row">
           <!-- 
              Developer : Anderson Montañez
              Changes : Modification of lateral menu
              Date : 21-03-2015
            -->
        <!--Start new Lat Menu-->
        <div class="col-sm-3 col-md-3">
          <div class="panel-group" id="accordion">
            <?= construir_menu_aplicacion(); ?>            
          </div>
        </div>
        <!--End new Lat Menu-->
        <div class="col-sm-3" style="clear:both; margin-top: -2%;">
            <?= $this->load->view($contenido); ?>
          </div>
      </div>
    </div>
          
      <footer align="center" style="clear:both; margin-top: -4%;">
        <p>Copyright &copy; Supra Caracas C.A - 2014</p>
      </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('js/jquery.js')?>"></script>
    <script src="<?= base_url('js/jquery-ui.min.js')?>"></script>
    <script src="<?= base_url('js/jquery.validate.js')?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('js/offcanvas.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('js/bootstrap-datetimepicker.js')?>" charset="UTF-8"></script>
    <script type="text/javascript" src="<?= base_url('js/locales/bootstrap-datetimepicker.es.js')?>" charset="UTF-8"></script>
    <script type="text/javascript">
      var base_url = '<?= base_url() ?>'
    </script>
    <script type="text/javascript" src="<?= base_url('js/main.js')?>"></script>
  </body>
</html>