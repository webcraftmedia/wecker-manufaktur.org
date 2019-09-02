function init_saimod_person() {
    $('#btn_search').click(function(){
        system.load($(this).attr('state')+$('#input_search').val(),true);
    });

    $('#btn-person-del').click(function(){
        var persons = [];
        $('.person-check:checked').each(function() {
            persons.push($(this).attr('person'));
        });
        if (confirm('Are you sure you want to delete '+persons.length+' Persons PERMANENTLY?')) {
            $.ajax({
                async: true,
                url: this.endpoint,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    sai_mod: '.SAI.saimod_person',
                    action: 'person_delete',
                    data: persons
                },
                success: function(data){
                    if(data.status){
                        system.reload();
                    } else {
                        alert('Something happend - try again!');
                    }
                },
                error: function(){
                    alert('Something happend - try again!');
                }
            });
        }
    });

    $('.person-order-up').click(function(e){
        e.preventDefault();
        person = $(this).attr('person');
        order = $(this).attr('order');
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'person_order',
                data: {
                    action: 'up',
                    person: person,
                    order: order
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

    $('.person-order-down').click(function(e){
        e.preventDefault();
        person = $(this).attr('person');
        order = $(this).attr('order');
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'person_order',
                data: {
                    action: 'down',
                    person: person,
                    order: order
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

    $('.person-visibility').click(function(){
        person = $(this).attr('person');
        visibility = $(this).val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'person_visibility',
                data: {
                    person: person,
                    visibility: visibility
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

}

function init_saimod_person_new(){
    // Image Preview
    $('#input-person-image').change(function(){
        $('#output-person-image').attr('src','./files/persons/'+$(this).val())
    });

    // Update Button
    $('#btn-person-save').click(function(e){
        e.preventDefault();
        img = $('#input-person-image').val();
        name = $('#input-person-name').val();
        info = $('#input-person-info').val();
        visibility = $('#input-person-visibility').val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'person_save',
                data: {
                    img: img,
                    name: name,
                    info: info,
                    visibility: visibility,
                }
            },
            success: function(data){
                if(data.status){
                    system.back();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

    $('#input-person-image').trigger('change');
}

function init_saimod_person_details(){
    // Image Preview
    $('#input-person-image').change(function(){
        $('#output-person-image').attr('src','./files/persons/'+$(this).val())
    });
    
    // Badge Preview Text
    $('.input-badge-badge, #input-ability-badge').on('input',function(){
        $(this).parent().parent().find('.badge').html($(this).val());
    });
    // Badge Preview Color
    $('.input-badge-color, #input-ability-color').change(function(){
        $(this).parent().parent().find('.badge').removeClass(function (index, className) {
            return (className.match (/(^|\s)badge-\S+/g) || []).join(' ');
        });
        $(this).parent().parent().find('.badge').addClass($(this).val());
    });

    // Ability New Button
    $('#btn-person-ability-new').click(function(){
        person = $(this).attr('person');
        badge = $('#input-ability-badge').val();
        color = $('#input-ability-color').val();
        visibility = $('#input-ability-visibility').val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'person_ability_new',
                data: {
                    person: person,
                    badge: badge,
                    color: color,
                    visibility: visibility
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

    // Badges Visibility
    $('.badge-visibility').click(function(){
        badge = $(this).attr('badge');
        visibility = $(this).val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'badge_visibility',
                data: {
                    badge: badge,
                    visibility: visibility
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

    // Badge Order
    $('.badge-order-up').click(function(e){
        e.preventDefault();
        badge = $(this).attr('badge');
        type = $(this).attr('type');
        ref_id = $(this).attr('ref_id');
        order = $(this).attr('order');
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'badge_order',
                data: {
                    action: 'up',
                    badge: badge,
                    type: type,
                    ref_id: ref_id,
                    order: order
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

    $('.badge-order-down').click(function(e){
        e.preventDefault();
        badge = $(this).attr('badge');
        type = $(this).attr('type');
        ref_id = $(this).attr('ref_id');
        order = $(this).attr('order');
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'badge_order',
                data: {
                    action: 'down',
                    badge: badge,
                    type: type,
                    ref_id: ref_id,
                    order: order
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });

    // Badges Delete
    $('#btn-abilities-del').click(function(){
        var badges = [];
        $(this).parent().parent().parent().parent().find('.badge-check:checked').each(function() {
            badges.push($(this).attr('badge'));
        });
        if (confirm('Are you sure you want to delete '+badges.length+' Badges PERMANENTLY?')) {
            $.ajax({
                async: true,
                url: this.endpoint,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    sai_mod: '.SAI.saimod_person',
                    action: 'badge_delete',
                    data: badges
                },
                success: function(data){
                    if(data.status){
                        system.reload();
                    } else {
                        alert('Something happend - try again!');
                    }
                },
                error: function(){
                    alert('Something happend - try again!');
                }
            });
        }
    });

    // Back Button
    $('.btn-person-back').click(function(){
        system.back();
    });

    // Update Button
    $('#btn-person-update').click(function(e){
        e.preventDefault();
        person = $(this).attr('person');
        img = $('#input-person-image').val();
        name = $('#input-person-name').val();
        info = $('#input-person-info').val();
        visibility = $('#input-person-visibility').val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_person',
                action: 'person_update',
                data: {
                    person: person,
                    img: img,
                    name: name,
                    info: info,
                    visibility: visibility,
                }
            },
            success: function(data){
                if(data.status){
                    system.reload();
                } else {
                    alert('Something happend - try again!');
                }
            },
            error: function(){
                alert('Something happend - try again!');
            }
        });
    });
}