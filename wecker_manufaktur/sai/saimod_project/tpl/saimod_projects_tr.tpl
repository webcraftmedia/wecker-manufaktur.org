 <tr>
    <td><a href="#!project(details);project.${id}"><img src="./files/projects/${img}" style="width: 50px; height: 50px;"/></a></td>
    <td><a href="#!project(details);project.${id}">${name}</a></td>
    <td>${info}</td>
    <td>${focus}</td>
    <td>${type}</td>
    <td><a href="${website}" target="_blank">${website}</a></td>
    <td style="font-size: 30px">
        <a href="#" class="project-order-up" project="${id}" order="${order}"><i class="fa fa-caret-up"></i></a>
        <a href="#" class="project-order-down" project="${id}" order="${order}"><i class="fa fa-caret-down"></i></a>
        &nbsp;${order}
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