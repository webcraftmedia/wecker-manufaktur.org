<div class="row">
    <div class="table-responsive sai_padding_off">
        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table_persons">
            <thead>
                <tr>
                    <th colspan="8">
                        Rows: ${count} Page: ${page}
                    </th>
                </tr>
                <tr>
                    <th colspan="7">
                        <input class="input-medium search-query action-control" id="input_search" type="text" placeholder="Search" size="40" style="width: 100%;" value="${search}"/>
                    </th>
                    <th>
                        <button class="btn-sm btn btn-success" state="person;search." id="btn_search" type="submit" style="width: 100%;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                    </th>
                </tr>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Info</th>
                    <th>Contact</th>
                    <th>Abilities</th>
                    <th>Order</th>
                    <th>Visible</th>
                    <th>
                        <button type="button" id="btn-person-del" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></button>
                        <button type="button" id="btn-person-new" class="btn btn-sm btn-success pull-right" onclick="system.load('person(new)')" style="margin-right: 10px;"><i class="fa fa-plus"></i></button>
                    </th>
                </tr>
            </thead>
            <tbody>${data}</tbody>    
        </table>
        <ul class="pagination flex-wrap">
            <li class="page-item"><a class="page-link" href="#!person;search.${search};page.0">&laquo;</a></li>
            ${pagination}
            <li class="page-item"><a class="page-link" href="#!person;search.${search};page.${page_last}">&raquo;</a></li>
        </ul>
    </div>
</div>