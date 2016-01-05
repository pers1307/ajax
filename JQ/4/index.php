<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Примеры для Ajax JQ</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../jquery-2.1.4.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#countryDropDown").change(function () {

                var countryValue = $("#countryDropDown option:selected").text();
                //alert(countryValue);
                getarea();
                alert( $("#sortMe").sortable('toArray') );

            }); // $("#countryDropDown").change

        }); // $(document).ready

        function getarea()
        {
            var countryValue = $("#countryDropDown option:selected").text();
            var area = $("#areaDropDown");

            if (countryValue.length == 0) {
                area.attr("disabled", true);
            } else {
                area.attr("disabled", false);
                area.load("getarea.php", {country : countryValue});
            }
        }
    </script>
    <style type="text/css">

    </style>
</head>
<body>
    <form action="" id="form">
        <div id="container">
            <div>
                <label>Choose country</label><br />
                <select id="countryDropDown">
                    <option value="">Choose country</option>
                    <option value="">Russia!</option>
                </select>
            </div>
            <div id="divarea">
                <label>Area:</label><br />
                <select id="areaDropDown" disabled="disabled"></select>
            </div>
            <div>
                <label>City:</label><br />
                <select id="citydropdown" disabled="disabled"></select>
            </div>
        </div>
        <ul id="sortMe">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
    </form>
</body>
</html>