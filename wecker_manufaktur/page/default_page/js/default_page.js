$(document).ready(function() {
      //new SYSTEM('./api.php',1,'start');
      $('.person-link').click(function(e){
            e.preventDefault();
            $person = $(this).attr('person');
            $isHidden = $('#person-details-'+$person).hasClass('d-none');
            $('.person-details').addClass('d-none');
            if($isHidden){
               $('#person-details-'+$person).removeClass('d-none');
            }
      })
});