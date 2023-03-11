function switchMode(){
    var button = document.getElementById("lighting-theme-button")

    if(button.value === "Enable Dark Mode" || button.value === "Enable Dark Mode"){
        button.value = "Enable Light Mode";
        button.value = "Enable Light Mode";
        document.getElementById("body").style.backgroundColor = "navy";
        document.getElementById("header2").classList.remove("light-h2");
        document.getElementById("header2").classList.add("dark-h2");
    }
    else{
        button.value = "Enable Dark Mode";
        button.value = "Enable Dark Mode";
        document.getElementById("body").style.backgroundColor = "palegoldenrod";
        document.getElementById("header2").classList.remove("dark-h2");
        document.getElementById("header2").classList.add("light-h2");
    }

}