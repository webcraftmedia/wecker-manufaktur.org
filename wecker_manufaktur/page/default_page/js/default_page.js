$(document).ready(function() {
      //new SYSTEM('./api.php',1,'start');
      
      $('.person-link').click(function(e){showPerson(e,$(this).attr('person'),false,true)})

      $('.person-project-link').click(function(e){showProject(e,$(this).attr('project'),true,false)})

      $('.project-link').click(function(e){showProject(e,$(this).attr('project'),false,true)})

      $('.project-person-link').click(function(e){showPerson(e,$(this).attr('person'),true,false)})
});

function showPerson(event,subject_id,jump,toggle){
      // Jump to anchor
      if(!jump){
            event.preventDefault();
      }
      
      // Is the element already shown?
      isHidden = $('#person-details-'+subject_id).hasClass('d-none');

      // Grey out all
      if(isHidden){
            $('.person').addClass('disabled');
            $('#person-'+subject_id).removeClass('disabled');
      } else {
            $('.person').removeClass('disabled');
      }
      // Hide all details
      $('.person-details').addClass('d-none');

      // Toggle or ensure visibility of specific detail
      console.log(toggle, isHidden)
      if(!toggle || isHidden){
            $('#person-details-'+subject_id).removeClass('d-none');
      }
}

function showProject(event,subject_id,jump,toggle){
      // Jump to anchor
      if(!jump){
            event.preventDefault();
      }
      
      // Is the element already shown?
      isHidden = $('#project-details-'+subject_id).hasClass('d-none');

      // Grey out all others
      if(isHidden){
            $('.project').addClass('disabled');
            $('#project-'+subject_id).removeClass('disabled');
      } else {
            $('.project').removeClass('disabled');
      }

      // Hide all details
      $('.project-details').addClass('d-none');

      // Toggle or ensure visibility of specific detail
      console.log(toggle, isHidden)
      if(!toggle || isHidden){
            $('#project-details-'+subject_id).removeClass('d-none');
      }
}