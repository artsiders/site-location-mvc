function darkTheme(){
    document.body.style.background = '#0e1621';
    document.body.style.color = 'rgba(255,255,255,0.7)';
    document.documentElement.style.setProperty('color', '#ffffffbf!important');
    document.documentElement.style.setProperty('--shadow', 'transparent');
    document.documentElement.style.setProperty('--hover', '#0e1621');
    document.documentElement.style.setProperty('--primary', '#29384c');
    document.documentElement.style.setProperty('--dark', '#2196f3');
    document.documentElement.style.setProperty('--dark2', '#ffffff');
    document.documentElement.style.setProperty('--white', '#17212b');
    document.documentElement.style.setProperty('--white2', '#17212b');
    document.documentElement.style.setProperty('--white3', '#29384c');

    switchTheme.textContent = "theme claire";

    document.querySelector("#iconTheme i").classList.add("fa-sun-o");
    document.querySelector("#iconTheme i").classList.remove("fa-adjust");
}

function lightTheme(){
    document.body.style.background = '#ececec';
    document.body.style.color = 'var(--dark)';
    document.documentElement.style.setProperty('--shadow', 'rgba(51, 51, 51, 0.157)');
    document.documentElement.style.setProperty('--primary', '#2196f3');
    document.documentElement.style.setProperty('--hover', 'rgb(219, 219, 219)');
    document.documentElement.style.setProperty('--dark', '#343a40');
    document.documentElement.style.setProperty('--dark2', '#343a40');
    document.documentElement.style.setProperty('--white', '#ffffff');
    document.documentElement.style.setProperty('--white2', '#ffffff');
    document.documentElement.style.setProperty('--white3', '#ffffff');

    switchTheme.textContent = "theme sombre";

    document.querySelector("#iconTheme i").classList.remove("fa-sun-o");
    document.querySelector("#iconTheme i").classList.add("fa-adjust");
}

function userTheme(){
    var boxColor = document.querySelector("#boxColor");
	
	let value = boxColor.value;
	document.documentElement.style.setProperty('--primary', `${value}`);

    // switchTheme.textContent = "theme sombre";
}
// userTheme();