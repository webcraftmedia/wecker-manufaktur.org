 <tr>
    <td><span class="badge" style="background-color: #${color}; color: #${color_text}">${badge}</span></td>
    <td>${badge}</td>
    <td>${color}</td>
    <td>${color_text}</td>
    <td style="font-size: 30px">
        <a href="#" class="badge-order-up" badge="${id}" type="${type}" ref_id="${ref_id}" order="${order}"><i class="fa fa-caret-up"></i></a>
        <a href="#" class="badge-order-down" badge="${id}" type="${type}" ref_id="${ref_id}" order="${order}" order="${order}"><i class="fa fa-caret-down"></i></a>
        &nbsp;${order}
    </td>
    <td>
        <select class="badge-visibility form-control" badge="${id}">
            <option value="0" ${selected_invisible}>Invisible</option>
            <option value="1" ${selected_visible}>Visible</option>
        </select>
    </td>
    <td>
        <input type="checkbox" class="pull-right badge-check" badge="${id}"/>
    </td>
</tr>