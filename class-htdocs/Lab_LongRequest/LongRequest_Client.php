<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
Test: <input type="text" id="txtTest" />
<hr>
<div id="debug"></div>
<div id="hi"></div>


<!-- <script>
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "LongRequest_Server.php", true);
    xhr.onprogress = function (e) {
        document.getElementById("debug").innerHTML = xhr.responseText;
    }
    xhr.send(null);

</script> -->
    
<script>
    var data = " \r\n";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "LongRequest_Server.php", true);
    xhr.onprogress = function (e) {
        responseText = xhr.responseText;
        lastEvent = responseText.replace(data, "");
        console.log(lastEvent);
        jl = JSON.parse(lastEvent);
        document.getElementById("debug").innerHTML = jl.data;
        data = responseText;
    }
    xhr.send(null);
</script>
</body>
</html>
