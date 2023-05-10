var xhr = null;

function ratingFormProcess() {
  event.preventDefault();
  var formObj = document.getElementById("rating-form");
  var rating = formObj.rating.value;

  if (rating < 1 || rating > 5) {
    alert("Unexpected rating entered! Rating not recorded.");
    return;
  }

  var url = "ratingFormResponse.php?rating=" + encodeURIComponent(rating);
  xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = updatePageRating;
  xhr.send(null);
}

function updatePageRating() {
  if (xhr.readyState == 4) {
    if (xhr.responseText == "-1") {
      alert("Sorry, an error occurred. Please try again later.");
    } else if (xhr.responseText == "-2") {
      alert(
        "You have already submitted a rating this session. You may submit another rating at your next visit."
      );
    } else {
      alert(
        "Rating submitted successfully!\n" +
          "User submitted a rating of " +
          xhr.responseText +
          "."
      );
      var fieldset = document.getElementById("rating-fieldset");
      fieldset.setAttribute("disabled", "");
    }
  }
}

function disableRatingForm(val) {
  var fieldset = document.getElementById("rating-fieldset");
  fieldset.setAttribute("disabled", "");
  var input = document.getElementById("rd" + val);
  input.setAttribute("checked", "true");
  document.getElementById("rating-p").innerHTML = "Thanks for Rating!";
}
