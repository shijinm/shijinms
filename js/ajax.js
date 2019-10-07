
function ajax(method, url, payload, headers){
    if(payload === undefined){
        payload = null;
    }
    
    if(headers === undefined) {
        headers = {"Content-Type": "application/x-www-form-urlencoded"};
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    for(name in headers) {
        xmlhttp.setRequestHeader(name, headers[name]);
    }
    xhr.send(payload);
    return xhr;
}