function handlingForm(form_id, jEvent) {
    var group = document.querySelector("#" + form_id);

    for (var i = 0; i < group.children.length; i++) {
        var childElement = group.children[i];
        childElement.addEventListener(jEvent, validatePattern);
    }
}

function validatePattern(e) {
    var field = e.target;

    var val   = field.value;
    var pattern = field.getAttribute("pattern");

    if(pattern != null) {
        var regex = new RegExp(pattern);
        if(!regex.exec(val)) {
            var message = field.getAttribute("data-message");
            field.nextSibling.innerHTML = message;
            field.setAttribute("class", "error");
        } else {
            field.nextSibling.innerHTML = '';
            field.setAttribute("class", "");
        }
    }
}