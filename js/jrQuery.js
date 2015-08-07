// Criar objeto do elemento

$ = function(selector) {
    return new ElementObj( (typeof selector == 'object') ? [selector] : document.querySelectorAll(selector) );
}

$.fn = ElementObj.prototype;

$.ajax = function(data, callback){
    var xmlhttp;
    
    var parameters = '';
    for (x in data.parameters){
        if(parameters) parameters += '&';

        parameters += x + '=' + data.parameters[x];
    }

    var path = data.path + "?" + parameters;

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if(data.response == 'text'){
                callback(xmlhttp.responseText);
            } else if(data.response == 'xml') {
                callback(xmlhttp.responseXML);
            } else if(data.response == 'json') {
                callback(xmlhttp.responseJSON);
            } else {
                return callback(false);
            }
        }
    }

    xmlhttp.open(data.method, path, true);
    xmlhttp.send();
};


// Classe elementObj
function ElementObj(elements) {
    this.elements = elements;
    this.element = elements[0];

    // this.fn = ElementObj.prototype;

    this.on = function(jEvent, callback) {
        this.each(function(i, element){
            element.addEventListener(jEvent, callback);
        });
    }

    this.hide = function() {
        this.each(function(i, element){
            element.style.visibility = "hidden";   
        });
    }

    this.show = function() {
        this.each(function(i, element){
            element.style.visibility = "visible";
        });
    }

    this.isHide = function() {
        return (this.element.style.visibility == "hidden");
    } 

    this.val = function(value) {
        this.checkUniqueElement();
        if(value == null) return this.element.value;
        
        this.element.value = value;
    }

    this.html = function(value) {
        this.checkUniqueElement();
        if(value == null) return this.element.innerHTML;
        
        this.element.innerHTML = value;
    }

    this.append = function(html) {
        this.checkUniqueElement();

        this.html(this.element.innerHTML + html);
    }

    this.prepend = function(html) {
        this.checkUniqueElement();

        this.html(html + this.element.innerHTML);
    }

    this.addClass = function(newClass) {
        this.each(function(i, element) {
            if(! $(element).hasClass(newClass) ){
                element.className += ' ' + newClass;
            }
        });
    }

    this.removeClass = function(sClass) {
        regex = new RegExp('\\s?' + sClass + '\\s?', 'g');

        this.each(function(i, element) {
            element.className = element.className.replace(regex, '');
        });
    }

    this.hasClass = function(sClass) {
        this.checkUniqueElement();
        if(this.elements['0'].className == '')
            return false;

        regex = new RegExp('.*\\s?' + sClass + '\\s?.*', 'g');
        return this.element.className.match(regex);
    }

    this.getClass = function() {
        this.checkUniqueElement();
        return this.element.className;
    }

    this.find = function(selector) {
        return new ElementObj(this.element.querySelectorAll(selector));
    }

    this.closest = function(tag) {
        this.checkUniqueElement();
        el = this.element.parentNode;
        if(tag == null) return $(el);
        do {
            if (el.nodeName == tag.toUpperCase()) return $(el);
        } while (el = el.parentNode);

        return null;
    }

    this.next = function(tag) {
        this.checkUniqueElement();
        el = this.element.nextSibling;
        if(tag == null) return $(el);
        do {
            if (el.nodeName == tag.toUpperCase()) return $(el);
        } while (el = el.nextSibling);

        return null;
    }

    this.prev = function(tag) {
        this.checkUniqueElement();
        el = this.element.previousSibling;
        if(tag == null) return $(el);
        do {
            if (el.nodeName == tag.toUpperCase()) return $(el);
        } while (el = el.previousSibling);

        return null;
    }

    this.css = function(attribute, value) {
        this.checkUniqueElement();

        if(attribute == null && value == null)
            return this.element.style.cssText;

        return this.element.style[attribute] = value;
    }

    this.isChecked = function() {
        this.checkUniqueElement();

        return (this.element.checked == true);
    }

    this.prop = function(attribute, value) {
        if(typeof(value) == 'boolean' && value == false){
            this.removeProp(attribute);
        
        }else {
            if(typeof(value) == 'boolean') value = attribute;

            this.each(function(i, element){
                element.setAttribute(attribute, value);
            });
        }
    }

    this.removeProp = function(attribute) {
        this.each(function(i, element){
            element.removeAttribute(attribute);
        });
    }

    this.getAttr = function(attribute) {
        this.checkUniqueElement();

        return this.element.getAttribute(attribute);
    }

    this.is = function(attribute) {
        return (this.getAttr(attribute) != null);
    }

    this.each = function(callback) {
        for(var i = 0; i < this.elements.length; i++)
            callback(i, this.elements[i]);
    }


    // Checagens
    this.checkUniqueElement = function() {
        if(this.elements.length != 1) throw "Erro, o objeto possui muitos elementos.";
    }
}

$.fn.mask = function(mask) {
    this.each(function(index, el) {
        $(el).on('click', function(){
            
        });
        $(el).on('keypress', function(event){
            var tecla = event.charCode;

            var charMask = '';
            var position = this.value.length;
            do{
                charMask += mask.substr(position, 1);

                if(mask.substr(position+1, 1) != ' ') {
                    if(mask.substr(position, 1) == 'd' || !isNaN(mask.substr(position, 1))){
                        break;
                    }
                    else if(mask.substr(position+1, 1) == 'd' || !isNaN(mask.substr(position+1, 1))){
                        break;
                    }
                    else if(position >= mask.length){
                        break;                    
                    }
                }
                position++;
            }while(1);

            if(tecla != 0) {
                if(charMask == ' '){
                    this.value += ' ';
                
                } else if(this.value.length >= mask.length) {
                    event.preventDefault();

                } else if(charMask == 'd' && !checkLetter(tecla)) {
                    event.preventDefault();

                } else if(!isNaN(charMask) && !checkNumber(tecla)) {
                    event.preventDefault();

                } else if(charMask != 'd' && isNaN(charMask)) {
                    if(!validNextChar(mask, this.value.length, tecla)){
                        event.preventDefault();
                    } else {
                        this.value += charMask;
                    }
                }
            }
        });
    });

    function checkNumber(tecla) {
        return (tecla > 47 && tecla < 58)
    }

    function checkLetter(tecla) {
        return ( (tecla > 96 && tecla < 123) || (tecla > 64 && tecla < 91) );
    }

    function validNextChar(mask, position, tecla) {
        do{
            var nextChar = mask.substr(position, 1);

            if(position >= mask.length)
                return false;

            else if(nextChar == 'd')
                return checkLetter(tecla);

            else if(!isNaN(nextChar) && checkNumber(tecla))
                return checkNumber(tecla);
            
            position++;
        }while(1);
    }
}
//