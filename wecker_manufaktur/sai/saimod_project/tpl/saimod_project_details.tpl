<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table-project-details">
            <tbody>
                <tr>
                    <th>
                        <img id="output-project-image" src="./files/projects/${img}" alt="Image Not Found" style="width: 150px; height: 150px;"/>
                    </th>
                    <td>
                        <select id="input-project-image" class="form-control">
                            ${images}
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input id="input-project-name" class="form-control" type="text" value="${name}" style="width: 100%"/></td>
                </tr>
                <tr>
                    <th>Info</th>
                    <td><textarea id="input-project-info" class="form-control" style="width: 100%; min-height: 100px;">${info}</textarea></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><input id="input-project-website" class="form-control" type="text" value="${website}" style="width: 100%"/></td>
                </tr>
                <tr>
                    <th>Visibility</th>
                    <td>
                        <select id="input-project-visibility" class="form-control" project="${id}">
                            <option value="0" ${selected_invisible}>Invisible</option>
                            <option value="1" ${selected_visible}>Visible</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-sm btn-default btn-project-back" ><i class="fa fa-angle-left"></i>&nbsp;Back</button>
                        <button id="btn-project-update" class="btn btn-sm btn-success pull-right" project="${id}"><i class="fa fa-edit"></i>&nbsp;Update</button>
                    </th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <th colspan="2">Focus</th>
                </tr>
                <tr>
                    <th colspan="2">
                        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table-project-focus">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Badge</th>
                                    <th>Color</th>
                                    <th>Text Color</th>
                                    <th>Order</th>
                                    <th>Visible</th>
                                    <th>
                                        <button type="button" id="btn-focus-del" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                ${focus}
                                 <tr>
                                    <td><span class="badge" style=""></span></td>
                                    <td><input id="input-focus-badge" class="form-control" type="text" style="width: 100%"/></td>
                                    <td><input id="input-focus-color" class="form-control" type="text" minlength="6" maxlength="6" style="width: 100%"/></td>
                                    <td><input id="input-focus-color-text" class="form-control" type="text" minlength="6" maxlength="6" style="width: 100%"/></td>
                                    <td></td>
                                    <td>
                                        <select id="input-focus-visibility" class="form-control">
                                            <option value="0" >Invisible</option>
                                            <option value="1" selected>Visible</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" id="btn-project-focus-new" class="btn btn-sm btn-success pull-right" project="${id}"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Type</th>
                </tr>
                <tr>
                    <th colspan="2">
                        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table-project-type">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Badge</th>
                                    <th>Color</th>
                                    <th>Order</th>
                                    <th>Visible</th>
                                    <th>
                                        <button type="button" id="btn-type-del" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                ${type}
                                 <tr>
                                    <td><span class="badge"></span></td>
                                    <td><input id="input-type-badge" class="form-control" type="text" style="width: 100%"/></td>
                                    <td><input id="input-type-color" class="form-control" type="text" minlength="6" maxlength="6" style="width: 100%"/></td>
                                    <td><input id="input-type-color-text" class="form-control" type="text" minlength="6" maxlength="6" style="width: 100%"/></td>
                                    <td></td>
                                    <td>
                                        <select id="input-type-visibility" class="form-control">
                                            <option value="0" >Invisible</option>
                                            <option value="1" selected>Visible</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" id="btn-project-type-new" class="btn btn-sm btn-success pull-right" project="${id}"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-sm btn-default btn-project-back" ><i class="fa fa-angle-left"></i>&nbsp;Back</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>