function signIn() {

    $.ajax({
            url: 'get_token.php',
            type: 'GET',
            data: {oauth_access_token: "", oauth_access_token_secret: ""},
            success: function(response) {
                //console.log(response);

                if (typeof response.errors === 'undefined' || response.errors.length < 1 ) {
                    //success
                    //console.log(response);

                    var token = response.substring(response.lastIndexOf("oauth_token=")+12,response.lastIndexOf("&oauth_token_secret="));
                    //console.log(token);

                    window.location='https://api.twitter.com/oauth/authenticate?oauth_token='+token;

                } else {
                    console.log('Response error');

                }
            },
            error: function(errors) {
                console.log('Request error');
                console.log(errors);
            }
        });
}