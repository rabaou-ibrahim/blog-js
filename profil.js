var profile = document.getElementById("profile")
var editLogin = document.getElementById("change-login");
var editPassword = document.getElementById("change-password");
var editConfirmedPassword = document.getElementById("change-confirmed-password");

function init(){                
    editLogin.style.display = "none"
    editPassword.style.display = "none"
    editConfirmedPassword.style.display = 'none'
}

window.onload = init;

document.getElementById("change-login-btn").addEventListener("click", function(){ 
    profile.style.display = 'none';
    editLogin.style.display = 'block';

});

document.getElementById("login-comeback").addEventListener("click", function(){ 
    editLogin.style.display = 'none';
    profile.style.display = 'block';
});

document.getElementById("change-password-btn").addEventListener("click", function(){ 
    profile.style.display = 'none';
    editPassword.style.display = 'block';

});

document.getElementById("password-comeback").addEventListener("click", function(){ 
    editPassword.style.display = 'none';
    profile.style.display = 'block';
});

document.getElementById("submit-new-password").addEventListener("click", function(){ // Si on submit le mot de passe
    editPassword.style.display = 'none';
    editConfirmedPassword.style.display = 'block';
});

document.getElementById("confirmed-password-comeback").addEventListener("click", function(){ 
    editConfirmedPassword.style.display = 'none';
    editPassword.style.display = 'block';
});

document.getElementById("form-login").addEventListener("submit", function(e) {
    e.preventDefault();

    var data = new FormData(this); // FormData est une classe JS qui sert  récupérer automatiquement les données du formulaire

    var xhr = new XMLHttpRequest();

    var editMessage = document.getElementById("edit-message");

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res == null) {
                editMessage.innerHTML = "<p style='color:green'> Changement réussi ! </p>";
                editLogin.appendChild(editMessage);
            } else {
                editMessage.innerHTML = "<p style='color:red'> Login déjà pris ! </p>";
                editLogin.appendChild(editMessage);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue")
        }
    };

    xhr.open("POST", "profilScript.php", true);
    xhr.responseType = "json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);

    return false;
})

