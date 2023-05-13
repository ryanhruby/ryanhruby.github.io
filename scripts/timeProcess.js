var xhr = null;

function timeProcess() {
  var url = "timeResponse.php";
  xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = updateTime;
  xhr.send(null);
}

function updateTime() {
  if (xhr.readyState == 4) {
    var timeParagraph = document.getElementById("clock");
    timeParagraph.innerHTML = xhr.responseText;
  }
}
