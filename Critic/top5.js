function addTop5()
{

}

function startOver()
{

}

function addOnClickHandlers()
{
    var cdsDiv = document.getElementById('cds');
    var cdImages = cdsDiv.getElementsByTagName('img');

    for (var i = 0; i < cdImages.length; i++) {
        cdImages[i].onclick = addToTop5;
    }
}

function addToTop5()
{
    var imgElement = this;
    var top5Element = document.getElementById('top5');
    var numCDs = 0;

    for (var i = 0; i < top5Element.childNodes.length; i++) {
        if (top5Element.childNodes[i].nodeName.toLowerCase() == 'img') {
            numCDs = numCDs + 1;
        }
    }

    top5Element.appendChild(imgElement);
    imgElement.onclick = null;

    // Остальное читать не имеет смысла, это все делается на jq
}

// прописать в заголовке HTTP статус
// header('Status: No address was received.', true, 400)

// в js можно получить заголовок
// request.getResponseHeader('Status');

// При передачи ajax запроса таким способом в заголовке HTTP запроса нужно
// указать в каком формате передаются данные, иначе сервер не сможет их прочесть.

// Защита от sql запросов в PHP коде mysql_real_escape_string('строка');

//