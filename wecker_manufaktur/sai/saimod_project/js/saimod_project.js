function init_saimod_project() {
    $('#btn_search').click(function(){
        system.load($(this).attr('state')+$('#input_search').val(),true);
    });

    $('#btn-project-del').click(function(){
        var projects = [];
        $('.project-check:checked').each(function() {
            projects.push($(this).attr('project'));
        });
        if (confirm('Are you sure you want to delete '+projects.length+' Projects PERMANENTLY?')) {
            $.ajax({
                async: true,
                url: this.endpoint,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    sai_mod: '.SAI.saimod_project',
                    action: 'project_delete',
                    data: projects
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

    $('.project-order-up').click(function(e){
        e.preventDefault();
        project = $(this).attr('project');
        order = $(this).attr('order');
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_project',
                action: 'project_order',
                data: {
                    action: 'up',
                    project: project,
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

    $('.project-order-down').click(function(e){
        e.preventDefault();
        project = $(this).attr('project');
        order = $(this).attr('order');
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_project',
                action: 'project_order',
                data: {
                    action: 'down',
                    project: project,
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

    $('.project-visibility').click(function(){
        project = $(this).attr('project');
        visibility = $(this).val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_project',
                action: 'project_visibility',
                data: {
                    project: project,
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

function init_saimod_project_new(){
    // Image Preview
    $('#input-project-image').change(function(){
        $('#output-project-image').attr('src','./files/projects/'+$(this).val())
    });

    // Update Button
    $('#btn-project-save').click(function(e){
        e.preventDefault();
        img = $('#input-project-image').val();
        name = $('#input-project-name').val();
        info = $('#input-project-info').val();
        website = $('#input-project-website').val();
        visibility = $('#input-project-visibility').val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_project',
                action: 'project_save',
                data: {
                    img: img,
                    name: name,
                    info: info,
                    website: website,
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

    $('#input-project-image').trigger('change');
}

function init_saimod_project_details(){
    // Image Preview
    $('#input-project-image').change(function(){
        $('#output-project-image').attr('src','./files/projects/'+$(this).val())
    });
    
    // Badge Preview Text
    $('.input-badge-badge, #input-focus-badge, #input-type-badge').on('input',function(){
        $(this).parent().parent().find('.badge').html($(this).val());
    });
    // Badge Preview Color
    $('.input-badge-color, #input-focus-color, #input-type-color').keyup(function(){
        $(this).parent().parent().find('.badge').css('background-color','#'+$(this).val());
    });
    // Badge Preview Color text
    $('.input-badge-color-text, #input-focus-color-text, #input-type-color-text').keyup(function(){
        $(this).parent().parent().find('.badge').css('color','#'+$(this).val());
    });

    // Focus New Button
    $('#btn-project-focus-new').click(function(){
        project = $(this).attr('project');
        badge = $('#input-focus-badge').val();
        color = $('#input-focus-color').val();
        color_text = $('#input-focus-color-text').val();
        visibility = $('#input-focus-visibility').val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_project',
                action: 'project_focus_new',
                data: {
                    project: project,
                    badge: badge,
                    color: color,
                    color_text: color_text,
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

    // Type New Button
    $('#btn-project-type-new').click(function(){
        project = $(this).attr('project');
        badge = $('#input-type-badge').val();
        color = $('#input-type-color').val();
        color_text = $('#input-type-color-text').val();
        visibility = $('#input-type-visibility').val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_project',
                action: 'project_type_new',
                data: {
                    project: project,
                    badge: badge,
                    color: color,
                    color_text: color_text,
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
                sai_mod: '.SAI.saimod_project',
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
                sai_mod: '.SAI.saimod_project',
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
                sai_mod: '.SAI.saimod_project',
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
    $('#btn-focus-del, #btn-type-del').click(function(){
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
                    sai_mod: '.SAI.saimod_project',
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
    $('.btn-project-back').click(function(){
        system.back();
    });

    // Update Button
    $('#btn-project-update').click(function(e){
        e.preventDefault();
        project = $(this).attr('project');
        img = $('#input-project-image').val();
        name = $('#input-project-name').val();
        info = $('#input-project-info').val();
        website = $('#input-project-website').val();
        visibility = $('#input-project-visibility').val();
        $.ajax({
            async: true,
            url: this.endpoint,
            type: 'POST',
            dataType: 'JSON',
            data: {
                sai_mod: '.SAI.saimod_project',
                action: 'project_update',
                data: {
                    project: project,
                    img: img,
                    name: name,
                    info: info,
                    website: website,
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