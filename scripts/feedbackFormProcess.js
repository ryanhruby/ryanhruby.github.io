var xhr = null;

function feedbackFormProcess() {
  var formObj = document.getElementById("feedback-form");

  if (!validateEmail(formObj)) {
    alert(
      "Email formatted incorrectly. Please enter a valid email address and try again."
    );
    return false; //event.preventDefault() here to stop form from clearing? Not working
  }

  var email = encodeURIComponent(formObj.email.value);
  var galleryPage = encodeURIComponent(formObj.galleryPage.value);
  var langPage = encodeURIComponent(formObj.langPage.value);
  var resumePage = encodeURIComponent(formObj.resumePage.value);
  var otherIdeasInput = encodeURIComponent(formObj.otherIdeasInput.value);
  var url = "feedbackFormResponse.php";
  xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = updatePageFeedback;
  xhr.send(
    "email=" +
      email +
      "&galleryPage=" +
      galleryPage +
      "&langPage=" +
      langPage +
      "&resumePage=" +
      resumePage +
      "&otherIdeasInput=" +
      otherIdeasInput
  );
}

function updatePageFeedback() {
  if (xhr.readyState == 4) {
    if (xhr.responseText == "Feedback successfully recorded.") {
      alert(xhr.responseText); //debugging
      //feedbackFormCalculate(formObj); //need to do this above, cannot pass formObj through
    } else {
      alert(xhr.responseText);
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
  var otherIdeasInput = formObj.otherIdeasInput.value;

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
  text +=
    "Feedback recorded successfully! Please wait an hour before submitting again.";

  alert(text);
}
