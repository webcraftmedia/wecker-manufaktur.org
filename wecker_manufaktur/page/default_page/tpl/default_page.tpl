<!DOCTYPE html>
<html lang="${meta_language}">
    <head>
        <title>${meta_title}</title>

        <meta charset="utf-8">
        <meta name="robots"                     content="index, follow">
        <meta name="revisit-after"              content="3 DAYS" />
        <meta name="fragment"                   content="!">
        <meta name="viewport"                   content="width=device-width, initial-scale=1">

        <meta name="author"                     content="${meta_author}">
        <meta name="publisher"                  content="${meta_publisher}">
        <meta name="copyright"                  content="${meta_copyright}">
        <meta name="description"                content="${meta_description}">
        <meta name="keywords"                   content="${meta_keywords}">
        <meta name="page-topic"                 content="${meta_page-topic}">
        <meta name="page-type"                  content="${meta_page-type}">
        <meta name="audience"                   content="${meta_audience}">
        <meta name="DC.Creator"                 content="${meta_author}">
        <meta name="DC.Publisher"               content="${meta_publisher}">
        <meta name="DC.Rights"                  content="${meta_copyright}">
        <meta name="DC.Description"             content="${meta_description}">
        <meta name="DC.Language"                content="${meta_language}">
        <meta property="og:url"                 content="${meta_og-url}"/>
        <meta property="og:type"                content="${meta_og-type}"/>
        <meta property="og:title"               content="${meta_title}"/>
        <meta property="og:description"         content="${meta_description}"/>
        <meta property="og:image"               content="${meta_og-image}" />
        
        ${css}
        ${js}
    </head>
    <body>
        <!-- MENU -->
        <nav id="menu" class="navbar navbar-expand-lg navbar-light fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" id="menu-philosophy" href="#philosophy">${menu_philosophy}</a></li>
                    <li class="nav-item">       <a class="nav-link" id="menu-projects"   href="#projects">  ${menu_projects}</a></li>
                    <li class="nav-item">       <a class="nav-link" id="menu-apply"      href="#apply">     ${menu_apply}</a></li>
                </ul>
            </div>
        </nav>
        <!-- HOME -->
        <section id="home" class="fullpage">
            <h1><img src="./files/img/WECKER_Logo.png" alt="${page_title}" style="width: 50%; margin-left: auto; margin-right: auto;"/></h1>
            <h4>${page_statement}</h4>
            <a href="#philosophy"><i class="fa fa-angle-down"></i></a>            
        </section>
        <!-- CONTENT -->
        <section id="content">
            <div id="philosophy">
                <h2>${content_philosophy_heading}</h2>
                ${content_philosophy}
            </div>
            <div id="persons">
                ${_content_persons}
            </div>
            <div id="projects">
                <h2>${content_projects_heading}</h2>
                ${content_projects}
                ${_content_projects}
            </div>
            <div id="apply">
                <h2>${content_apply_heading}</h2>
                ${content_apply}
                ${_content_apply}
            </div>
        </section>
        <!-- FOOTER -->
        <section id="footer">
            <div class="container-fluid">
                <div class="row" id="footer-links">
                    <div class="col-lg-3">
                        <div id="footer-logo">
                            <img src="./files/img/WECKER_Logo.png" alt="${footer_logo}" style="width: 100%;"/>
                        </div>
                        <div id="footer-nl">
                            <input id="footer-nl-email"     name="email"  type="text"   placeholder="${footer_newsletter_email_placeholder}"/>
                            <input id="footer-nl-subscribe" name="submit" type="submit" value="${footer_newsletter_email_value}"/>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h3>${footer_legal_heading}</h3>
                        <div id="footer-legal">
                            <a href="#modal-dataprotection" data-toggle="modal" data-target="#modal-dataprotection"> ${footer_legal_dataprotection}</a>
                            <a href="#modal-imprint" data-toggle="modal" data-target="#modal-imprint">${footer_legal_imprint}</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h3>${footer_manufaktur_heading}</h3>
                        <div id="footer-manufaktur">
                            <a href="#projects"> ${footer_manufaktur_projects}</a>
                            <a href="#apply">    ${footer_manufaktur_apply}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 footer-sm">
                        <h3>${footer_socialmedia_heading}</h3>
                        <div id="footer-sm">
                            <a target="_blank" href="${link_facebook}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="${link_discord}"> <i class="fa fa-weixin"></i></a>
                            <a target="_blank" href="${link_email}">   <i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row" id="footer-bottomline">
                    <div class="col-12">
                        ${footer_bottomline}
                    </div>
                </div>
            </div>
        </section>
        ${_modal_imprint}
        ${_modal_dataprotection}
    </body>
</html>