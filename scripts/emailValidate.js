function validateEmail() {
  var formObj = document.getElementById("feedback-form");
  var address = formObj.email.value;

  var p = address.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})$/);
  if (p == 0) return true;
  else return false;
}
