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

      $('.person-project-link').click(function(e){
            $project = $(this).attr('project');
            $isHidden = $('#project-details-'+$project).hasClass('d-none');
            $('.project-details').addClass('d-none');
            if($isHidden){
               $('#project-details-'+$project).removeClass('d-none');
            }
      })

      $('.project-link').click(function(e){
            e.preventDefault();
            $project = $(this).attr('project');
            $isHidden = $('#project-details-'+$project).hasClass('d-none');
            $('.project-details').addClass('d-none');
            if($isHidden){
               $('#project-details-'+$project).removeClass('d-none');
            }
      })

      $('.project-person-link').click(function(e){
            $person = $(this).attr('person');
            $isHidden = $('#person-details-'+$person).hasClass('d-none');
            $('.person-details').addClass('d-none');
            if($isHidden){
               $('#person-details-'+$person).removeClass('d-none');
            }
      })
});