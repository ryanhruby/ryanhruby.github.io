function switchMode(){
    var button = document.getElementById("lighting-theme-button")

    if(button.textContent.equals("Enable Dark Mode") || button.innerText.equals("Enable Dark Mode")){
        button.textContent = "Enable Light Mode";
        button.innerText = "Enable Light Mode";
        document.getElementById("body").style.backgroundColor = "navy";
        document.getElementById("header2").classList.remove("light-h2");
        document.getElementById("header2").classList.add("dark-h2");
    }
    else{
        button.textContent = "Enable Dark Mode";
        button.innerText = "Enable Dark Mode";
        document.getElementById("body").style.backgroundColor = "palegoldenrod";
        document.getElementById("header2").classList.remove("dark-h2");
        document.getElementById("header2").classList.add("light-h2");
    }

}