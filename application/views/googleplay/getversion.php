
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div>
            <?= $html ?>            
        </div>
        
        <br>
        <center>
        <div id="data">
            <hr>
        </div>
        </center>

        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function (){
                var i = 0;
                $(".htlgb").each(function (i, item){
                    try{
                        var versionapp = $(item).text();

                        $("#data").append("<p>" + versionapp + "</p>");

                        if(i == 6){    
                            window.location.href = "<?= base_url("googleplay/version/$packagename") ?>/" + versionapp;
                        }
                    }catch(err){
                        console.log(err);
                    }
                    i++;
                });
            });        
        </script>

    </body>
</html>