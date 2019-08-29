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