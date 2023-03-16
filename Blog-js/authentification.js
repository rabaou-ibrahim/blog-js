regTitle = document.getElementById("registration-title");
regDiv = document.getElementById("reg-div");
regMessage = document.getElementById("reg-message");
logTitle = document.getElementById("connexion-title"); 
logDiv = document.getElementById("log-div");
logMessage = document.getElementById("log-message");

function init(){                
    logTitle.style.display = 'none';
    logDiv.style.display = 'none'
    logMessage.style.display = 'none';      
}

window.onload = init;

document.getElementById("connexion-btn").addEventListener("click", function(){ 
    regTitle.style.display = 'none';
    regDiv.style.display = 'none' 
    regMessage.style.display = 'none';
    logTitle.style.display = 'block';
    logDiv.style.display = 'block';
    logMessage.style.display = 'block';
});

// AddEvent listener pour souligner le message regMes et changer la couleur

document.getElementById("registration-btn").addEventListener("click", function(){          
    regTitle.style.display = 'block';
    regDiv.style.display = 'block' 
    regMessage.style.display = 'block';
    logTitle.style.display = 'none';
    logDiv.style.display = 'none';
    logMessage.style.display = 'none'; 
});

document.getElementById("registration").addEventListener("submit", function(e) {
    e.preventDefault();

    var data = new FormData(this); // FormData est une classe JS qui sert  récupérer automatiquement les données du formulaire

    var xhr = new XMLHttpRequest();

    var regMessage = document.getElementById("reg-message");

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                regMessage.innerHTML = "<p style='color:green'> Inscription réussie</p>";
                document.body.appendChild(regMessage);
            } else {
               regMessage.innerHTML = res.msg;
                document.body.appendChild(regMessage);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue")
        }
    };

    xhr.open("POST", "regScript.php", true);
    xhr.responseType = "json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);

    return false;
})

document.getElementById("connexion").addEventListener("submit", function(e) {
    e.preventDefault();

    var data = new FormData(this); // FormData est une classe JS qui sert  récupérer automatiquement les données du formulaire

    var xhr = new XMLHttpRequest();

    var logMessage = document.getElementById("log-message");

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                console.log(res)
            } else {
                logMessage.innerHTML = res.msg;
                document.body.appendChild(logMessage);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue")
        }
    };

    xhr.open("POST", "logScript.php", true);
    xhr.responseType = "json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);

    return false;
})
