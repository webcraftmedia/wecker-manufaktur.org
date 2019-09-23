$(document).ready(function() {
    //new SYSTEM('./api.php',1,'start');
    
    $('.person-link').click(function(e){showPerson(e,$(this).attr('person'),false,true)})
    $('.project-link').click(function(e){showProject(e,$(this).attr('project'),false,true)})

    $('.person-link').hover(function(){hoverPerson($(this).attr('person'),true)},function(){hoverPerson($(this).attr('person'),false)});
    $('.project-link').hover(function(){hoverProject($(this).attr('project'),true)},function(){hoverProject($(this).attr('project'),false)});

    $('.person-project-link').click(function(e){showProject(e,$(this).attr('project'),true,false)})
    $('.project-person-link').click(function(e){showPerson(e,$(this).attr('person'),true,false)})

    $("#apply-send").click(function(e){
        e.preventDefault();
        var data =  {   name: $('#apply-name').val(),
                        email: $('#apply-email').val(),
                        message: $('#apply-message').val()};

        if (data.name.length < 3 ){
            alert( "Bitte einen Namen eingeben");
            $("#apply-name").focus();
            return null;
        }
        if (!validateEmail(data.email)){
            alert( "Bitte einen gültige E-Mail eingeben");
            $("#apply-email").focus();
            return null;
        }   
        if (data.message.length > 500 ){
            alert( "Bitte einen kürzeren Text eingeben");    
            $("#apply-message").focus();
            return null;
        }

        sendMail(data,function(data){
            if(data && data.status){
                $("#apply-message").val('')
                $('#apply-message').trigger('keyup');
                alert("Danke! Deine Nachricht wurde versendet.");
            } else {
                alert("Deine Nachricht konnte nicht versendet weden. Bitte versuche es später noch einmal. Danke.");
            }
        });
    });

    $('#apply-message').on('keyup',function(){
        $('#apply-count').html($(this).val().length);
        checkApply();
    });

    $('#apply-name').on('keyup',checkApply)
    $('#apply-email').on('keyup',checkApply)

    $('#footer-nl-subscribe').click(function(e){
        e.preventDefault();
        var email   = $('#footer-nl-email').val();
        
        if(!validateEmail(email)){
            alert( "Bitte einen gültige E-Mail eingeben");
            $('#footer-nl-email').focus()
        } else {
            $.ajax({
                async: true,
                url: './api.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    call: 'send_subscribe',
                    data: { email:  email}
                },
                success: function(data){
                    if(!data.status){
                        alert("Das Eintragen in den Newsletter hat leider nicht funktioniert. Bitte versuche es später noch einmal. Danke.");
                    } else {
                        $('#footer-nl-success').removeClass('d-none');
                        $('#footer-nl').addClass('d-none');
                    }
                },
                error: function(){
                    alert("Das Eintragen in den Newsletter hat leider nicht funktioniert. Bitte versuche es später noch einmal. Danke.");
                }
            });
        }
    });
});

function checkApply(){
    name = $('#apply-name').val(),
    email = $('#apply-email').val(),
    message = $('#apply-message').val();

    if (name.length >= 3 &&
        validateEmail(email) &&
        message.length <= 500 &&
        message.length > 0){

        $("#apply-send").removeClass('disabled');
    } else {
        $("#apply-send").addClass('disabled');
    }
}

function hoverPerson(subject_id,hoverin){    
    detailsShown = $('.person-details:not(.d-none)').length;

    // Grey out all
    if(!detailsShown){
        if(hoverin){
            $('.person').addClass('disabled');
            $('#person-'+subject_id).removeClass('disabled');
        } else {
            $('.person').removeClass('disabled');
        }
    }
}

function hoverProject(subject_id,hoverin){    
    detailsShown = $('.project-details:not(.d-none)').length;

    // Grey out all
    if(!detailsShown){
        if(hoverin){
            $('.project').addClass('disabled');
            $('#project-'+subject_id).removeClass('disabled');
        } else {
            $('.project').removeClass('disabled');
        }
    }
}

function showPerson(event,subject_id,jump,toggle){
    // Jump to anchor
    if(!jump){
        event.preventDefault();
    }

    // Arrows
    $('.person i').removeClass('fa-angle-up');
    $('.person i').addClass('fa-angle-down');

    // Is the element already shown?
    isHidden = $('#person-details-'+subject_id).hasClass('d-none');

    // Grey out all
    if(isHidden){
        $('.person').addClass('disabled');
        $('#person-'+subject_id).removeClass('disabled');
        $('#person-'+subject_id+' i').removeClass('fa-angle-down');
        $('#person-'+subject_id+' i').addClass('fa-angle-up');
    } else {
        $('.person').removeClass('disabled');
    }
    // Hide all details
    $('.person-details').addClass('d-none');

    // Toggle or ensure visibility of specific detail
    if(!toggle || isHidden){
        $('#person-details-'+subject_id).removeClass('d-none');
    }
}

function showProject(event,subject_id,jump,toggle){
    // Jump to anchor
    if(!jump){
        event.preventDefault();
    }

    // Arrows
    $('.project i').removeClass('fa-angle-up');
    $('.project i').addClass('fa-angle-down');
    
    // Is the element already shown?
    isHidden = $('#project-details-'+subject_id).hasClass('d-none');

    // Grey out all others
    if(isHidden){
        $('.project').addClass('disabled');
        $('#project-'+subject_id).removeClass('disabled');
        $('#project-'+subject_id+' i').removeClass('fa-angle-down');
        $('#project-'+subject_id+' i').addClass('fa-angle-up');
    } else {
        $('.project').removeClass('disabled');
    }

    // Hide all details
    $('.project-details').addClass('d-none');

    // Toggle or ensure visibility of specific detail
    if(!toggle || isHidden){
        $('#project-details-'+subject_id).removeClass('d-none');
    }
}

function sendMail(data,callback){
    $.ajax({
        async: true,
        url: './api.php',
        type: 'GET',
        dataType: 'JSON',
        data: {
            call: 'send_mail',
            data: data
        },
        success: function(data){
            callback(data);
        },
        error: function(){
            callback(false);
        }
    });
  }
  
  function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
  }