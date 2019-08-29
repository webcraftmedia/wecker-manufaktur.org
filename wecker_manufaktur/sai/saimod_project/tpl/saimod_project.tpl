<div class="row">
    <div class="table-responsive sai_padding_off">
        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table_projects">
            <thead>
                <tr>
                    <th colspan="9">
                        Rows: ${count} Page: ${page}
                    </th>
                </tr>
                <tr>
                    <th colspan="8">
                        <input class="input-medium search-query action-control" id="input_search" type="text" placeholder="Search" size="40" style="width: 100%;" value="${search}"/>
                    </th>
                    <th>
                        <button class="btn-sm btn btn-success" state="project;search." id="btn_search" type="submit" style="width: 100%;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                    </th>
                </tr>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Info</th>
                    <th>Focus</th>
                    <th>Type</th>
                    <th>Website</th>
                    <th>Order</th>
                    <th>Visible</th>
                    <th>
                        <button type="button" id="btn-project-del" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></button>
                        <button type="button" id="btn-project-new" class="btn btn-sm btn-success pull-right" onclick="system.load('project(new)')" style="margin-right: 10px;"><i class="fa fa-plus"></i></button>
                    </th>
                </tr>
            </thead>
            <tbody>${data}</tbody>    
        </table>
        <ul class="pagination flex-wrap">
            <li class="page-item"><a class="page-link" href="#!project;search.${search};page.0">&laquo;</a></li>
            ${pagination}
            <li class="page-item"><a class="page-link" href="#!project;search.${search};page.${page_last}">&raquo;</a></li>
        </ul>
    </div>
</div>