function switchMode() {
  var button = document.getElementById("theme-selector");

  if (button.value === "Enable Dark Mode") {
    button.value = "Enable Light Mode";
    button.innerHTML = "Enable Light Mode";
    document.getElementById("html").classList.add("Dark-theme");
    document.body.classList.add("Dark-theme");
  } else {
    button.value = "Enable Dark Mode";
    button.innerHTML = "Enable Dark Mode";
    document.getElementById("html").classList.remove("Dark-theme");
    document.body.classList.remove("Dark-theme");
  }
}
