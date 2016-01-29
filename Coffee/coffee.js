function sendRequest(request, url) {
    request.onreadystatechange = serveDrink; // Задаем функцию обратного вызова
    request.open("GET", url, true);
    request.send(null);
}

function serveDrink() {

    if (request1.readyState == 4) {
        if (request1.status == 200) {
            var response = request1.responseText;
            var whichCoffeemaker = response.substring(0, 1);
            var name = response.substring(1, response.length);
            if (whichCoffeemaker == '1') {
                var coffeemakerStatusDiv1 = document.getElementById('coffeemaker1-status');
                replaceText(coffeemakerStatusDiv1, 'Idle');
            } else {
                var coffeemakerStatusDiv2 = document.getElementById('coffeemaker2-status');
                replaceText(coffeemakerStatusDiv2, 'Idle');
            }
            alert(name + ", your coffee is ready!");
            request1 = createRequest();
        } else
            alert('Error! Request status is ' + request1.status);
    } else if (request2.readyState == 4) {
        if (request2.status == 200) {
            var response = request2.responseText;
            var whichCoffeemaker = response.substring(0, 1);
            var name = response.substring(1, response.length);
            if (whichCoffeemaker == '1') {
                var coffeemakerStatusDiv1 = document.getElementById('coffeemaker1-status');
                replaceText(coffeemakerStatusDiv1, 'Idle');
            } else {
                var coffeemakerStatusDiv2 = document.getElementById('coffeemaker2-status');
                replaceText(coffeemakerStatusDiv2, 'Idle');
            }
            alert(name + ", your coffee is ready!");
            request2 = createRequest();
        } else
            alert('Error! Request status is ' + request2.status);
    }
}

function orderCoffee() {
    var name = document.getElementById("name").value;
    var beverage = getBeverage();
    var size = getSize();
    var coffeemakerStatusDiv1 = document.getElementById("coffeemaker1-status");
    var status = getText(coffeemakerStatusDiv1);

    if (status == "Idle") {

        replaceText(coffeemakerStatusDiv1, "Brewing " + name + "'s " + size + " " + beverage);
        document.forms[0].reset();
        var url = "coffeemaker.php?name=" + escape(name) +
            "&size=" + escape(size) +
            "&beverage=" + escape(beverage) +
            "&coffeemaker=1";
        sendRequest(request1, url);
    } else {
        var coffeemakerStatusDiv2 = document.getElementById("coffeemaker2-status");
        var status = getText(coffeemakerStatusDiv2);

        if (status == "Idle") {
            replaceText(coffeemakerStatusDiv2, "Brewing " + name + "'s " + size + " " + beverage);
            document.forms[0].reset();
            var url = "coffeemaker.php?name=" + escape(name) +
                "&size=" + escape(size) +
                "&beverage=" + escape(beverage) +
                "&coffeemaker=2";
            sendRequest(request2, url);
        } else {
            alert('Sorry! Both coffee makers are busy. Try again later, men');
        }
    }
}

function getSize() {

    var sizeGroup = document.forms[0].size;
    for (var i = 0; i < sizeGroup.length; i++) {
        if (sizeGroup[i].checked == true) {
            return sizeGroup[i].value;
        }
    }
}

function getBeverage() {

    var bevarageGroup = document.forms[0].bevarage;
    for (var i = 0; i < bevarageGroup.length; i++) {
        if (bevarageGroup[i].checked == true) {
            return bevarageGroup[i].value;
        }
    }
}