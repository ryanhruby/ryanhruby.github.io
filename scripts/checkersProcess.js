function drag() {
  event.dataTransfer.setData(
    "text/html",
    document.getElementById(event.target.id).outerHTML
  );
}

function checkDrag() {
  event.preventDefault();
}

function drop() {
  event.preventDefault();
  var prevId = event.dataTransfer.getData("text/html").substring(9, 13);
  console.log(prevId);
  var data = event.dataTransfer.getData("text/html");
  console.log(data);
  console.log(event.target.id);
  document.getElementById(event.target.id).innerHTML = data;
  document.getElementById(prevId).outerHTML = "";
}
