var uriParam = window.encodeURIComponent;

function clientTime() {
    setInterval(function() {
        var time = moment(time).format("HH:mm:ss");
        // DD-MM-YYYY 
        var date = moment(date).format("DD-MM-YYYY");
        document.getElementById('clienttime').innerHTML = time;
        document.getElementById('clientdate').innerHTML = date;
    }, 1000);
}

function serverTime() {
    setInterval(function() {
        var xhr = new XMLHttpRequest();
        xhr.onprogress = function () {
        //do something 
        };
        xhr.onload = function() {
            if (this.status === 200) {
                var serverTimeArray =this.responseText;
               
                var res = serverTimeArray.split(" ",2);
                document.getElementById("servertime").innerHTML = res[1];
                document.getElementById("serverdate").innerHTML = res[0];

            }
        };
        xhr.open("GET", "getDateTime.php", true);
        xhr.send();
    }, 1000);
}

function getTime() {
    var dateTime = moment(dateTime).format("HH:mm:ss DD-MM-YYYY");
    var xhr = new XMLHttpRequest();
    alert("Log saved to database");
    xhr.open('GET', 'db1.php?date=' + uriParam(dateTime), true);
    xhr.send();
}

function start() {
    clientTime();
    serverTime();
}

function getLogDetails(){
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "getLog.php", true);
   xhr.onreadystatechange = function(){
       if(this.readyState == 4 && this.status == 200){
           var data  = JSON.parse(this.responseText);
           var html = "";
           for(var i =0; i <data.length; i++){
               var clientIp =  data[i].client_ip;
               var serverTime = data[i].server_datetime;
               var clientTime = data[i].client_datetime;
               
               html += "<tr>";
               html += "<td>" + clientIp + "</td>";
               html += "<td>" + serverTime + "</td>";
               html += "<td>" + clientTime + "</td>";
               html += "</tr>";
               }
          document.getElementById("data").innerHTML = html;
          console.log(html);


//            var output ='';
//            for(var i in data){
//                output += '<tr>' +
//                        '<li>' + data[i].clientIp + '</li>' + 
//                        '<li>' + data[i].serverTime + '</li>' + 
//                        '<li>' + data[i].clientTime + '</li>' + 
//                        '</tr>';
//            }
//            document.getElementById('data').innerHTML = output;
      }
   }
   xhr.send();

    
}
