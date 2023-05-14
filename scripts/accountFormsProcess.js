var xhr_log = null;
var xhr_reg = null;
var xhr_out = null;

function loginFormProcess() {
  event.preventDefault;
  var formObj = document.getElementById("login-form");
  var username = encodeURIComponent(formObj.username.value);
  var password = encodeURIComponent(formObj.password.value);

  var url = "loginFormResponse.php";
  xhr_log = new XMLHttpRequest();
  xhr_log.open("POST", url, true);
  xhr_log.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr_log.onreadystatechange = updatePageLogin;
  xhr_log.send("username=" + username + "&password=" + password);
}

function updatePageLogin() {
  if (xhr_log.readyState == 4) {
    alert(xhr_log.responseText);
    timeProcess();
    setCurrentTheme();
  }
}

function regFormProcess() {
  event.preventDefault;
  var formObj = document.getElementById("register-form");
  var username = encodeURIComponent(formObj.username.value);
  var password = encodeURIComponent(formObj.password.value);
  var confirm_password = encodeURIComponent(formObj.confirm_password.value);

  if (password != confirm_password) {
    alert("Password do not match! Please try again.");
    return;
  }

  var url = "regFormResponse.php";
  xhr_reg = new XMLHttpRequest();
  xhr_reg.open("POST", url, true);
  xhr_reg.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr_reg.onreadystatechange = updatePageReg;
  xhr_reg.send("username=" + username + "&password=" + password);
}

function updatePageReg() {
  if (xhr_reg.readyState == 4) {
    alert(xhr_reg.responseText);
  }
}

function logoutProcess() {
  var url = "logoutResponse.php";
  xhr_out = new XMLHttpRequest();
  xhr_out.open("GET", url, true);
  xhr_out.onreadystatechange = updatePageLogout;
  xhr_out.send(null);
}

function updatePageLogout() {
  if (xhr_out.readyState == 4) {
    if (xhr_out.responseText == "Logged out") {
      document.getElementById("settingsDiv").setAttribute("hidden", "");
      document.getElementById("loginDiv").removeAttribute("hidden");
      alert("You have been successfully logged out.");
    }
  }
}
