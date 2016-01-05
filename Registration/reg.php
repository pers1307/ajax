<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="../JQ/jquery-2.1.4.js"> </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var clickButtonForm = $(".clickButtonForm");

            clickButtonForm.click(function(){

                var firstName = $("#firstname");
                var lastName = $("#lastname");

                if (firstName.val() == "" || lastName.val() == "") {
                    $("#error").text("Not all input complite!").show();
                } else {

                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: {firstName: firstName.val(), lastName: lastName.val()},
                        success: function (data) {

                            if (data == 1) {
                                $("#error").text("Error. Call the administrator!").show();
                            } else {
                                $("#error").text(data).show();
                            }

                        },
                        error: function () {}
                    }); // $.ajax
                }

            }); // clickButtonForm.click

        }); // End $(document).ready
    </script>
</head>
<body>
    <?php
        if (isset($_SESSION['id'])) {
            echo 'Your id is :' . $_SESSION['id'];
        } else {
            echo 'You have not session';
        }
    ?>
    <div id="formWrapper">
        <p>Enter the name:<input id="firstname" class="input" type="text"/></p>
        <p>Enter the first name <input id="lastname" class="input" type="text"/></p>
        <button class="clickButtonForm">Registration</button>
    </div>
    <span id="error"></span>
</body>
</html>

<?php

echo md5('Helloy yellow!');
$name = iconv("utf-8","windows-1251","Привет, брат!"); // Конвертирование в нужный формат
$name = trim($name); // Убрать все пробелы перед и после текста
$name = stripcslashes($name); // Заэкранировать все слэши
$name = htmlspecialchars($name); // Убрать весь html код из строки, защита от взлома