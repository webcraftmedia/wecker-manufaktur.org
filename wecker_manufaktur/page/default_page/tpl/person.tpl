<div id="person-${id}" class="col-lg-4 person">
    <a id="person-img-${id}" href="#person-details-${id}" person="${id}" class="person-link">
        <div>
            <img src="./files/persons/${img}" class="rounded-circle" alt="${name}">
        </div>
        <div class="person-img-name">
            ${name} <i class="fa fa-angle-down"></i>
        </div>
    </a>
</div>
<div id="person-details-${id}" class="col-12 order-lg-last d-none person-details">
    <div>
        <table class="table table-borderless table-condensed">
            <tr>
                <th scope="row">${table_talents}</th>
                <td>${badges}</td>
            </tr>
            <tr>
                <th scope="row">${table_info}</th>
                <td>${info}</td>
            </tr>
            <tr>
                <th scope="row">${table_projects}</th>
                <td>${projects}</td>
            </tr>
            <tr>
                <th scope="row">${table_contact}</th>
                <td class="break-tr">${contact}</td>
            </tr>
        </table>
    </div>
</div>