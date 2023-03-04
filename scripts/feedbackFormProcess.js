function feedbackFormProcess() {
  var formObj = document.getElementById("feedback-form");

  if (validateEmail(formObj)) {
    feedbackFormCalculate(formObj);
  } else {
    alert(
      "Email formatted incorrectly. Please enter a valid email address and try again."
    );
  }
}

function validateEmail() {
  var formObj = document.getElementById("feedback-form");
  var address = formObj.email.value;

  var p = address.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})$/);
  if (p == 0) return true;
  else return false;
}

function feedbackFormCalculate(formObj) {
  var textarea = document.getElementById("other-ideas-input");

  var text = "Feedback Form Report:\n";
  text += "Length of email: " + formObj.email.value.length;
  text += "Gave a rating of: " + formObj.rating.value;
  if (textarea) {
    text +=
      "Left an idea: " +
      textarea.value +
      " with a length of " +
      textarea.value.length;
  }
  text += "Form submitted successfully!";

  alert(text);
}
