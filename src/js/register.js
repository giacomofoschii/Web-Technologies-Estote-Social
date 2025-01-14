document.querySelector('#register-Form').addEventListener('submit', function (event) {
    event.preventDefault();
    register();
    event.target.reset();
});

function register() {

    const formDB = new FormData();
    //Optional fields
    formDB.append('name', document.querySelector('#name').value);
    formDB.append('surname', document.querySelector('#surname').value);
    formDB.append('birthday', document.querySelector('#birthday').value);
    formDB.append('group', document.querySelector('#group').value);
    //Required fields
    formDB.append('email', document.querySelector('#email').value);
    formDB.append('bio', document.querySelector('#bio').value);
    formDB.append('username', document.querySelector('#username').value);
    formDB.append('password', document.querySelector('#password').value); 
    formDB.append('password_confirm', document.querySelector('#password_confirm').value);
    
    const formDBImage = new FormData();
    formDBImage.append('image', document.querySelector('#image').files[0]);

    axios.post('./api/image-api.php', formDBImage).then(responseImage => {
        if (!responseImage.data["uploadEseguito"]) {
            document.getElementById("result").innerText = responseImage.data["erroreUpload"];
        } else {
            formDB.append('image', responseImage.data["fileName"]);
            axios.post('./api/signup-api.php', formDB).then(responseSignIn => {
                console.log(responseSignIn);
                if (responseSignIn.data["signin-result"]) {
                    document.getElementById("result").innerText = "Registrazione avvenuta con successo!!";
                    setTimeout(() => document.location.href = "index.php", 2000);
                } else {
                    document.getElementById("result").innerText = responseSignIn.data["erroreSignin"];
                }
            });
        }
    });
}