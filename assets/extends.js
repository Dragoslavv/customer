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

            result['postpaid_customer'].forEach(function (item) {
console.log(item);

            });



        }
    });


});