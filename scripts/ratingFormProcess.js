function ratingFormProcess() {
  var formObj = document.getElementById("rating-form");
  if (formObj.rating.value > 0) {
    alert(
      "Rating submitted successfully!\n" +
        "User submitted a rating of " +
        formObj.rating.value +
        "."
    );
  }
}
