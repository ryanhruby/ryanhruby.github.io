var xhr = null;

function switchMode() {
  xhr = new XMLHttpRequest();
  var url = "themeSwitchResponse.php";

  xhr.open("GET", url, true);
  xhr.onreadystatechange = updatePageLighting;
  xhr.send(null);
}

function setCurrentTheme() {
  xhr = new XMLHttpRequest();
  var url = "themeSetResponse.php";
  xhr.open("GET", url, true);
  xhr.onreadystatechange = updatePageLighting;
  xhr.send(null);
}

function updatePageLighting() {
  if (xhr.readyState == 4) {
    var button = document.getElementById("theme-selector");
    if (xhr.responseText == "dark") {
      button.value = "Enable Light Mode";
      button.innerHTML = "Enable Light Mode";
      document.getElementById("html").classList.add("Dark-theme");
      document.body.classList.add("Dark-theme");
    } else {
      button.value = "Enable Dark Mode";
      button.innerHTML = "Enable Dark Mode";
      document.getElementById("html").classList.remove("Dark-theme");
      document.body.classList.remove("Dark-theme");
    }
  }
}
