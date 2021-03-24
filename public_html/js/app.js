function openUTLink(link = "", type = "") {
    //ut://joinChannelById?<id>
    var urlLinkType = ""
    switch(type) {
        default:
            return;
        case "join":
            urlLinkType = "joinChannelById"
    }
    location.href = "ut://" + urlLinkType + "?" + link
}

function getUTLinkValue() {
    return document.getElementById('linkValue').value;
}

function findAndOpenUTLink() {
    var pageLinkValue = getUTLinkValue();
    var pageLinkType = document.getElementById('linkType').value;
    openUTLink(pageLinkValue, pageLinkType)
}


if(getUTLinkValue() != "") {
    setTimeout(findAndOpenUTLink, 2500);
}
