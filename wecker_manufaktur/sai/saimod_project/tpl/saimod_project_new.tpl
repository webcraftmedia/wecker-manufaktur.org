<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table-project-details">
            <tbody>
                <tr>
                    <th>
                        <img id="output-project-image" src="./files/projects/" alt="Image Not Found" style="width: 150px; height: 150px;"/>
                    </th>
                    <td>
                        <select id="input-project-image" class="form-control">
                            ${images}
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input id="input-project-name" class="form-control" type="text" style="width: 100%"/></td>
                </tr>
                <tr>
                    <th>Info</th>
                    <td><textarea id="input-project-info" class="form-control" style="width: 100%; min-height: 100px;"></textarea></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><input id="input-project-website" class="form-control" type="text" style="width: 100%"/></td>
                </tr>
                <tr>
                    <th>Visibility</th>
                    <td>
                        <select id="input-project-visibility" class="form-control">
                            <option value="0">Invisible</option>
                            <option value="1">Visible</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-sm btn-default btn-project-back" ><i class="fa fa-angle-left"></i>&nbsp;Back</button>
                        <button id="btn-project-save" class="btn btn-sm btn-success pull-right""><i class="fa fa-save"></i>&nbsp;Save</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>