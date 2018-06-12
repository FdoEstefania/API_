$(document).ready(function (){

    var nombre = false;
    var email = false;

    var validateemail = function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    };

    $("#btnpaypal").hide();

    $("#nombre").keyup(function (){
        var val = $(this).val();
        if(val != ''){
        nombre = true;
        }else{
        nombre = false;
        }

        if(nombre && email){
        $("#btnpaypal").show();
        }else{
        $("#btnpaypal").hide();
        }
    });

    $("#email").keyup(function (){
        var val = $(this).val();
        if(val != ''){
        if(validateemail(val)){
            email = true;
        }else{
            email = false;
        }
        }else{
        email = false;
        }

        if(nombre && email){
        $("#btnpaypal").show();
        }else{
        $("#btnpaypal").hide();
        }
    });

    paypal.Button.render({
        client: {
        sandbox:    'AZRe6Fid7VrFbvpK1oTcLhHCeN1_NNUTK6z8qV47tLgds8Efys-6laVnv3JHiPIairQxDlecpMJWUxzU',
        production: 'AdvukFlbTm7Wohwadx4nhHXL5E0qsCT1PMhJma_d7zn1cfE5LNyO5DFm0GY7g97SWJGbr3fi9DSTafjB'
        },
        env: 'production',
        locale: 'es_ES',
        style: {
            size: 'large',
            color: 'silver',
            shape: 'rect',
            label: 'checkout'
        },
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: rebaja, currency: 'USD' }
                        }
                    ]
                }
            });
        },
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function(payment) {
            $("#formclient").submit();
            });
        }
    }, '#paypal-button');
});