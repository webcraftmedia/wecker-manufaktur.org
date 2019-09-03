<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table-person-details">
            <tbody>
                <tr>
                    <th>
                        <img id="output-person-image" src="./files/persons/${img}" alt="Image Not Found" style="width: 150px; height: 150px;"/>
                    </th>
                    <td>
                        <select id="input-person-image" class="form-control">
                            ${images}
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input id="input-person-name" class="form-control" type="text" value="${name}" style="width: 100%"/></td>
                </tr>
                <tr>
                    <th>Info</th>
                    <td><textarea id="input-person-info" class="form-control" style="width: 100%; min-height: 100px;">${info}</textarea></td>
                </tr>
                <tr>
                    <th>Visibility</th>
                    <td>
                        <select id="input-person-visibility" class="form-control" person="${id}">
                            <option value="0" ${selected_invisible}>Invisible</option>
                            <option value="1" ${selected_visible}>Visible</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-sm btn-default btn-person-back" ><i class="fa fa-angle-left"></i>&nbsp;Back</button>
                        <button id="btn-person-update" class="btn btn-sm btn-success pull-right" person="${id}"><i class="fa fa-edit"></i>&nbsp;Update</button>
                    </th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <th colspan="2">Abilities</th>
                </tr>
                <tr>
                    <th colspan="2">
                        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table-person-abilities">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Badge</th>
                                    <th>Color</th>
                                    <th>Text Color</th>
                                    <th>Order</th>
                                    <th>Visible</th>
                                    <th>
                                        <button type="button" id="btn-abilities-del" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                ${abilities}
                                 <tr>
                                    <td><span class="badge"></span></td>
                                    <td><input id="input-ability-badge" class="form-control" type="text" style="width: 100%"/></td>
                                    <td><input id="input-ability-color" class="form-control" type="text" minlength="6" maxlength="6" style="width: 100%"/></td>
                                    <td><input id="input-ability-color-text" class="form-control" type="text" minlength="6" maxlength="6" style="width: 100%"/></td>
                                    <td></td>
                                    <td>
                                        <select id="input-ability-visibility" class="form-control">
                                            <option value="0" >Invisible</option>
                                            <option value="1" selected>Visible</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" id="btn-person-ability-new" class="btn btn-sm btn-success pull-right" person="${id}"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Projects</th>
                </tr>
                <tr>
                    <th colspan="2">
                        <table class="table table-striped table-condensed tablesorter sai_margin_off" id="table-person-projects">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Website</th>
                                    <th>Order</th>
                                    <th>Visible</th>
                                    <th>
                                        <button type="button" id="btn-projects-del" class="btn btn-sm btn-danger pull-right" person="${id}"><i class="fa fa-trash"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                ${projects}
                                 <tr>
                                    <td colspan="5">
                                        <select id="input-project" class="form-control">
                                            ${select_projects}
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" id="btn-person-project-new" class="btn btn-sm btn-success pull-right" person="${id}"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-sm btn-default btn-person-back" ><i class="fa fa-angle-left"></i>&nbsp;Back</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>