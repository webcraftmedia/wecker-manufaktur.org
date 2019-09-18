<div id="project-${id}" class="col-lg-4 project">
    <a id="project-img-${id}" href="#project-details-${id}" project="${id}" class="project-link">
        <div>
            <img src="./files/projects/${img}" class="rounded" alt="${name}">
        </div>
        <div class="project-img-name">
            ${name} <i class="fa fa-angle-down"></i>
        </div>
    </a>
</div>
<div id="project-details-${id}" class="col-12 order-lg-last d-none project-details">
        <div>
            <table class="table table-borderless table-condensed">
                <tr>
                    <th scope="row">${table_focus}</th>
                    <td>${focus}</td>
                </tr>
                <tr>
                    <th scope="row">${table_type}</th>
                    <td>${type}</td>
                </tr>
                <tr>
                    <th scope="row">${table_info}</th>
                    <td class="break-tr">${info}</td>
                </tr>
                <tr>
                    <th scope="row">${table_involved}</th>
                    <td>${persons}</td>
                </tr>
                <tr>
                    <th scope="row">${table_website}</th>
                    <td class="break-tr"><a href="${website}" target="_blank">${website}</a></td>
                </tr>
            </table>
        </div>
    </div>