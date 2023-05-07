var request = null;

function feedbackFormProcess() {
  var formObj = document.getElementById("feedback-form");

  if (validateEmail(formObj)) {
    feedbackFormCalculate(formObj);
  } else {
    alert(
      "Email formatted incorrectly. Please enter a valid email address and try again."
    );
    return;
  }

  var email = encodeURIComponent(formObj.email.value);
  var galleryPage = encodeURIComponent(formObj.galleryPage.value);
  var bioPage = encodeURIComponent(formObj.bioPage.value);
  var resumePage = encodeURIComponent(formObj.resumePage.value);
  var otherIdeasInput = encodeURIComponent(
    document.getElementById("other-ideas-input").value
  );
  var url = "feedbackFormResponse.php";
  var xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = update;
  xhr.send(
    "email=" +
      email +
      "&galleryPage=" +
      galleryPage +
      "&bioPage=" +
      bioPage +
      "&resumePage=" +
      resumePage +
      "&otherIdeasInput=" +
      otherIdeasInput
  );
}

function update() {
  if ((request.readystate = 4)) {
    //Check whether or not it was successful, if email was used too recently, etc.
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
  text += "Length of email: " + formObj.email.value.length + "\n";
  if (textarea) {
    text +=
      "Left an idea with a length of : " +
      textarea.value.length +
      ': "' +
      textarea.value +
      '"\n';
  }
  text += "Form submitted successfully!";

  alert(text);
}
