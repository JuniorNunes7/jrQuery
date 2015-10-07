function shareSocial(provider, shareLink, text) {
    
    var link;
    
    switch(provider){
        case 'facebook':
            link = 'https://www.facebook.com/sharer.php?u=' + shareLink;
            break;
        case 'twitter':
            link = "https://twitter.com/share?url="+ shareLink + "&text=" + text + "&hashtags=";
            break;
        case 'google+':
            link = "https://plus.google.com/share?url=" + shareLink;
            break;
    }

    window.open(link, 'Compartilhar', 'height=640, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}