var request = null;

function feedbackFormProcess() {
  var formObj = document.getElementById("feedback-form");

  if (!validateEmail(formObj)) {
    alert(
      "Email formatted incorrectly. Please enter a valid email address and try again."
    );
    return false;
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
  xhr.onreadystatechange = update(formObj);
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

function update(formObj) {
  if ((request.readystate = 4)) {
    if (request.responseText == "Feedback successfully recorded.") {
      feedbackFormCalculate(formObj);
    } else {
      alert(request.responseText);
    }
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
  text += "Feedback recorded successfully!";

  alert(text);
}
