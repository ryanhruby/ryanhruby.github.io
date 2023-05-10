var xhr_log = null;
var xhr_reg = null;

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
  if (xhr_reg.readyState == 4) {
    alert(xhr_reg.responseText);
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
