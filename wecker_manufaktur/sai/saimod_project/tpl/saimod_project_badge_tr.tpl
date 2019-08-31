 <tr>
    <td><span class="badge ${color}">${badge}</span></td>
    <td><input class="input-badge-badge form-control" type="text" value="${badge}" style="width: 100%"/></td>
    <td>
        <select class="input-badge-color form-control">
            ${badge_colors}
        </select>
    </td>
    <td style="font-size: 30px">
        <a href="#" class="project-order-up" project="${id}" order="${order}"><i class="fa fa-caret-up"></i></a>
        <a href="#" class="project-order-down" project="${id}" order="${order}"><i class="fa fa-caret-down"></i></a>
    </td>
    <td>
        <select class="project-visibility form-control" project="${id}">
            <option value="0" ${selected_invisible}>Invisible</option>
            <option value="1" ${selected_visible}>Visible</option>
        </select>
    </td>
    <td>
        <input type="checkbox" class="pull-right project-check" project="${id}"/>
    </td>
</tr>