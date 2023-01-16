function convertDateToDateTime(date){
    let d = new Date(date);
    return
        ("0" + d.getUTCDate()).slice(-2) + "/" +
        ("0" + (d.getUTCMonth() + 1)).slice(-2) + "/" +
        d.getUTCFullYear() + " - " +
        ("0" + d.getUTCHours()).slice(-2) + ":" +
        ("0" + d.getUTCMinutes()).slice(-2);
}
function renderPagination(links) {
    links.forEach(function (each) {
        $('#pagination').append($('<li>').attr('class', `page-item ${each.active ? 'active' : ''}`)
            .append(`<a class="page-link" >${each.label}</a>`));
    })
}
