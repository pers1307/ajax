<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Автоматическая подгрузка контента</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../jquery-2.1.4.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var lastmes = $('#message:last-child').attr('id');

            window.setInterval(function() {
                $.ajax({
                    url: 'show.php',
                    type: 'POST',
                    data: {lastmes : lastmes},
                    success: function (data) {
                        console.log(data);
                        $("<li id='6'></li>").appendTo('#message').text(data); // Это дело не работает но идея понятна
                    }
                });

            }, 1000); // window.setInterval

            function newmessage() { // Урок 9

            }
        }
    </script>
    <style type="text/css">

    </style>
</head>
<body>
    <form action="" id="form">
        <div id="container">
            <ul id="message">
                <li id="1">1</li>
                <li id="2">2</li>
                <li id="3">3</li>
                <li id="4">4</li>
                <li id="5">5</li>
            </ul>
        </div>
    </form>
</body>
</html>