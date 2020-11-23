$(document).ready(function () {

    $.ajax({
        url: 'http://barka.foi.hr/WebDiP/2019_projekti/WebDiP2019x100/index.php?page=listPassword',
        type: 'GET',
        dataType: 'xml',
        success: function (xml) {
            //if request succeed we add a table into HTML File with AJAX response
            var table = $('<table id="table1">');
            table.append('<thead><tr><th>Username</th><th>Email</th><th>Password</th></tr>')
            var tbody = $("<tbody>");
            $(xml).find('user').each(function () {
                var red = $("<tr>");
                red.append("<td>" + $(this).find("username").text() + "</td>");
                red.append("<td>" + $(this).find("email").text() + "</td>");
                red.append("<td>" + $(this).find("password").text() + "</td>");
                red.append("</tr>");
                tbody.append(red);
            });
            tbody.append("</tbody>");
            table.append(tbody);
            $('#tableGenerated').html(table);
            $("#table2").dataTable({
                bInfo: false
            });
        },

        error: function (xhr, status, error) {
        }
    });
});