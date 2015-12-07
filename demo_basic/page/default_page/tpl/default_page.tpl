<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="${meta_description}">
        <meta name="keywords" content="${meta_keywords}">
        <meta name="author" content="${meta_author}">
        <title>${meta_title}</title>
        ${css}
        ${js}
        <link rel="shortcut icon" href="./api.php?call=files&amp;cat=img&amp;id=favicon.png" type="image/x-icon" />
    </head>
    <body style="background: #cccccc; padding-top: 10px;">
        <div class="modal fade" id="modal_text" style="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" id="modaltext"></div>
                    <div class="modal-footer">          
                        <button type="button" class="btn" data-dismiss="modal" id="edit_close">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div id="menu">
            <div id="menu_content">
                <a href="#!start">${menu_start}</a>
                <a href="#!about">${menu_about}</a>
            </div>
        </div>
        <div id="content"></div>
        <div id="footer">
            <a href="#!impressum" id="impressum">${menu_imprint}</a>
        </div> 
    </body>
</html>