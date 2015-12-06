$(document).ready(function() {
      new SYSTEM('./api.php',1,'start');
      $('#impressum').click(function(){
          $('#modal_text').modal('show');});
});