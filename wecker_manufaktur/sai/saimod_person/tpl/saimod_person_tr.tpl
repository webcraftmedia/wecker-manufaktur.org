 <tr>
    <td><a href="#!person(details);person.${id}"><img src="./files/persons/${img}" style="width: 50px; height: 50px;"/></a></td>
    <td><a href="#!person(details);person.${id}">${name}</a></td>
    <td>${info}</td>
    <td>${contact}</td>
    <td>${abilities}</td>
    <td style="font-size: 30px">
        <a href="#" class="person-order-up" person="${id}" order="${order}"><i class="fa fa-caret-up"></i></a>
        <a href="#" class="person-order-down" person="${id}" order="${order}"><i class="fa fa-caret-down"></i></a>
        &nbsp;${order}
    </td>
    <td>
        <select class="person-visibility form-control" person="${id}">
            <option value="0" ${selected_invisible}>Invisible</option>
            <option value="1" ${selected_visible}>Visible</option>
        </select>
    </td>
    <td>
        <input type="checkbox" class="pull-right person-check" person="${id}"/>
    </td>
</tr>