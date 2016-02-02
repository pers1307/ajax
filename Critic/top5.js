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

}