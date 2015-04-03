<script language="JavaScript">
   var base_url = '<?= base_url() ?>';
   var idtrabajador = '<?= $this->uri->segment(3) ?>';
</script>
<script src="<?= base_url('js/webcamjs/webcam.js')?>"></script>
<script>
   webcam.set_hook( 'onComplete', 'my_completion_handler' );
   //alert(base_url);
   function my_callback_function(response) {
      alert("Success! PHP returned: " + response);
   }
   function do_upload() {
      webcam.upload();
   }
   function my_completion_handler(msg) {
         var image_url = msg;//respuesta de text.php que contiene la direccion url de la imagen
         // Muestra la imagen en la pantalla
         document.getElementById('upload_results').innerHTML = 
            '<img src="'+base_url+"js/webcamjs/"+image_url +'">'+
            '<?= form_open(base_url("trabajador/subir_foto"), array("class" => "form-horizontal", "role" => "form")); ?>'+
            '<input type="hidden" name="idtrabajador" value="'+idtrabajador+'"/>'+
            '<input type="text" name="foto" value="'+image_url+'"/>'+
            '<?= form_button(array("type"=>"submit","content"=>"Guardar Foto","class"=>"btn btn-primary")); ?>'+
            '<?= form_close(); ?>';
         // reset camera for another shot
         webcam.reset();
   }
</script>

<div id="upload_results" class="pull-right"></div>
<table>
         <tr>
            <td colspan="3">
               <script language="JavaScript">
                  document.write( webcam.get_html(320, 240) );
               </script>
            </td>
         </tr>
         <tr><td>&nbsp;</td></tr>
         <tr>
            <td><a href="javascript:void(webcam.configure())" class="btn btn-default">Configurar</a></td>
            <td><a href="javascript:void(webcam.reset())" class="btn btn-default">Resetear</a></td>
            <td><a href="javascript:void(webcam.freeze())" class="btn btn-default">Capturar</a></td>
            <td><a href="javascript:void(do_upload())" class="btn btn-default">Guardar</a></td>
         </tr>
      </table>
