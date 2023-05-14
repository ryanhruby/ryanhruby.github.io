var xhr = null;

function saveSettingsProcess() {
  var formObj = document.getElementById("settings-form");
  var prefTimezone = encodeURIComponent(formObj.prefTimezone.value);
  var prefTheme = encodeURIComponent(formObj.prefTheme.value);
  var prefClock = encodeURIComponent(formObj.prefClockFormat.value);

  var url = "saveSettingsResponse.php";
  xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = updatePageSettings;
  xhr.send(
    "prefTimezone=" +
      prefTimezone +
      "&prefTheme=" +
      prefTheme +
      "&prefClock=" +
      prefClock
  );
}

function updatePageSettings() {
  if (xhr.readyState == 4) {
    var settingsArray = xhr.responseText.split(":");
    if (settingsArray[0] == "0") {
      alert(settingsArray[1]);
    } else {
      alert("Settings saved successfully.");
      document.getElementById(settingsArray[0]).removeAttribute("selected");
      document.getElementById(settingsArray[1]).setAttribute("selected", "");
      document.getElementById(settingsArray[2]).removeAttribute("selected");
      document.getElementById(settingsArray[3]).setAttribute("selected", "");
      document.getElementById(settingsArray[4]).removeAttribute("selected");
      document.getElementById(settingsArray[5]).setAttribute("selected", "");
      timeProcess();
      setCurrentTheme();
    }
  }
}
