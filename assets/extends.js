$(document).ready(function() {


    $('#login-button').on('click', function(e){
        e.preventDefault();

        $.ajax({
            headers : {
                'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            url: 'functionality/login.php',
            data: $('#login-form').serialize(),
            cache: false,
            contentType: 'json',
            processData: false,
            type:'POST',
            success: function(result) {
                var result = $.parseJSON(result);

                if(result.access_token){
                    window.location = 'index.php';

                }else {
                    $('#loginError').removeClass('hidden-error');

                    $('#errors').removeClass('hidden-error');
                }

            }
        });

    });

    $('#logout').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            headers : {
                'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            url: 'functionality/logout.php',
            cache: false,
            contentType: 'json',
            processData: false,
            type:'POST',
            success: function(result) {
                var result = $.parseJSON(result);

                if(result.result == true){
                    window.location = "login.php";
                }

            }
        });
    });

    $.ajax({
        headers : {
            'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        url: 'functionality/all-number.php',
        cache: false,
        contentType: 'json',
        processData: false,
        type:'POST',
        success: function(result) {
            var result = $.parseJSON(result);

            $("#lists-customer").DataTable({
                "info":false,
                "responsive": true,
                "columns": [
                    { "data": "user_id" },
                    { "data": "numbers",
                      "class": "test"
                    },
                    {
                        "data": null,
                        "class": "pdf",
                        "defaultContent": '<button type="button" class="btn btn-outline-secondary">PDF</button>'
                    }
                ],
                "data": result['users']

            });

            result['postpaid_customer'].forEach(function (item) {

                $('#info-company').append(
                    "            <div class=\"col-lg-4 col-md-6\">\n" +
                    "                <div class=\"social-box facebook\">\n" +
                    "                    <i class=\"fa fa-home\"></i>\n" +
                    "                    <ul>\n" +
                    "                        <li class=\"text-center\">\n" +
                    "                            <span class=\"count\">Company: </span>\n" +
                    "                        </li>\n" +
                    "                        <li>\n" +
                    "                            <span class=\"count\" id=\"phone_number\">"+ item['name'] +"</span>\n" +
                    "                        </li>\n" +
                    "                    </ul>\n" +
                    "                </div>\n" +
                    "            </div>",
                    "            <div class=\"col-lg-4 col-md-6\">\n" +
                    "                <div class=\"social-box twitter\">\n" +
                    "                    <i class=\"fa fa-street-view\"></i>\n" +
                    "                    <ul>\n" +
                    "                        <li class=\"text-center\">\n" +
                    "                            <span class=\"count\">Address: </span>\n" +
                    "                        </li>\n" +
                    "                        <li>\n" +
                    "                            <span class=\"count\" id=\"phone_number\">"+ item['address'] +"</span>\n" +
                    "                        </li>\n" +
                    "                    </ul>\n" +
                    "                </div>\n" +
                    "            </div>",
                    "            <div class=\"col-lg-4 col-md-6\">\n" +
                    "                <div class=\"social-box linkedin\">\n" +
                    "                    <i class=\"fa fa-info\"></i>\n" +
                    "                    <ul>\n" +
                    "                        <li class=\"text-center\">\n" +
                    "                            <span class=\"count\">City: </span>\n" +
                    "                        </li>\n" +
                    "                        <li>\n" +
                    "                            <span class=\"count\" id=\"phone_number\">"+ item['city'] +"</span>\n" +
                    "                        </li>\n" +
                    "                    </ul>\n" +
                    "                </div>\n" +
                    "            </div>",
                    "            <div class=\"col-lg-4 col-md-6\">\n" +
                    "                <div class=\"social-box linkedin\">\n" +
                    "                    <i class=\"fa fa-file-zip-o\"></i>\n" +
                    "                    <ul>\n" +
                    "                        <li class=\"text-center\">\n" +
                    "                            <span class=\"count\">ZIP: </span>\n" +
                    "                        </li>\n" +
                    "                        <li>\n" +
                    "                            <span class=\"count\" id=\"phone_number\">"+ item['postcode'] +"</span>\n" +
                    "                        </li>\n" +
                    "                    </ul>\n" +
                    "                </div>\n" +
                    "            </div>",
                    "            <div class=\"col-lg-4 col-md-6\">\n" +
                    "                <div class=\"social-box twitter\">\n" +
                    "                    <i class=\"fa fa-pied-piper\"></i>\n" +
                    "                    <ul>\n" +
                    "                        <li class=\"text-center\">\n" +
                    "                            <span class=\"count\">PIB: </span>\n" +
                    "                        </li>\n" +
                    "                        <li>\n" +
                    "                            <span class=\"count\" id=\"phone_number\">"+ item['pib'] +"</span>\n" +
                    "                        </li>\n" +
                    "                    </ul>\n" +
                    "                </div>\n" +
                    "            </div>",
                    "            <div class=\"col-lg-4 col-md-6\">\n" +
                    "                <div class=\"social-box facebook\">\n" +
                    "                    <i class=\"fa fa-phone\"></i>\n" +
                    "                    <ul>\n" +
                    "                        <li class=\"text-center\">\n" +
                    "                            <span class=\"count\">Phone number: </span>\n" +
                    "                        </li>\n" +
                    "                        <li>\n" +
                    "                            <span class=\"count\" id=\"phone_number\">"+ item['phone_number'] +"</span>\n" +
                    "                        </li>\n" +
                    "                    </ul>\n" +
                    "                </div>\n" +
                    "            </div>"
                );

                $("#customers").append(item['name']);

            });



        }
    });


});