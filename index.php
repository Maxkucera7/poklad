<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Hledání pokladu</title>
</head>
<body>

    <h1>Hledání pokladu</h1>

    <div id="form">

        <label for="vyska">Výška:</label>
        <input id="vyska" type="number" min="4" max="20">
        <label for="sirka">Šířka:</label>
        <input id="sirka" type="number" min="4" max="20">

        <button id="hratButton" onclick="hrat()">Hrát</button>

    </div>

    <div id="hra">

    </div>

    <script>
        
        var counter = 0;

        function hrat() {
            var vyska = $("#vyska").val();
            var sirka = $("#sirka").val();
            var celkem = sirka*vyska;
            var poklad = Math.floor(Math.random() * celkem);

            if(vyska < 4 || vyska > 20 || sirka < 4 || sirka > 20) {
                $("#hratButton").after("<p class='varovani'>Šířka a výška hracího pole musí být mezi 4 a 20.</p>");
            } else {
                $('.varovani').remove();
                $('#form').hide();
                
                var count = 1;

                for (var i = 0; i < vyska; i++) {
                    for (var y = 0; y < sirka; y++) {
                        $('#hra').append("<button onclick='kliknuti(this, "+poklad+");' id='"+count+"' class='policko'></button>");               
                        count++;  
                    }    
                    $('#hra').append("<br>"); 
                }

                
                


            }
            
        }

        function kliknuti(button, poklad) {

            var id = $(button).attr('id');
            counter++;

            $(button).css('background-color', 'lightgray');
            button.disabled = true;

            if(poklad == id) {
                $("#hra").empty();
                $('#form').show();
                $('#form').prepend('<p class="varovani">Vyhrál jsi!</p><p class="varovani">Počet tahů:'+counter+'</p>');
                counter = 0;
            }

        }
 
    </script>
    
</body>
</html>