<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Примеры для Ajax JQ</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../jquery-2.1.4.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var button = $("button");
            button.click(function () {
                var text = $("textarea").val();

                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {text : text},
                    success: function (data) {
                        $("textarea").val("");
                        alert(data);
                    }
                });
            }); // button.click

            window.setInterval(function () {
                var id = $("li:first").attr("id");
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {id : id},
                    success: function (data) {
                        if (data == 1) {

                        } else {
                            $("ul").before(data); // Вставка последних данных
                        }
                    }
                });
            }, 1000); // Здесь делается постоянный Ajax запрос на сервер с целью получить новые данные
            // Я думаю по хорошему надо бы отсылать последний id, который есть у нас и получать сообщения,
            // которые есть сверх него

            // Но, тогда новое сообщение добавлять на стену сразу, это неправильно,
            // потому что могут пропасть сообщения, которые были до него.


        }); // $(document).ready

    </script>
    <style type="text/css">

    </style>
</head>
<body>
    <div id="wrapper">
        <div id="wrap_chat_box">
            <ul>
                <li>First message</li>
                <li>Second message</li>
            </ul>
            <div id="wrap_textarea">
                <textarea rows="6" cols="6"></textarea>
                <button>Отправить</button>
            </div>
        </div>
    </div>
</body>
</html>