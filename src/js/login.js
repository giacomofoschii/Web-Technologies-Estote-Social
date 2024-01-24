console.log("login.js");
document.querySelector('#login-Form').addEventListener('submit', function (event) {
    console.log("Dentro a event listener");
    event.preventDefault();
    login();
    event.target.reset();
});

function login() {
    const formDB = new FormData();
    formDB.append('username', document.querySelector('#username').value);
    formDB.append('password', document.querySelector('#password').value);
    axios.post('./api/login-api.php', formDB).then(response => {
        console.log(response.data);
        if (response.data["login_result"]) {
            document.getElementById("result").innerText = "Login avvenuto con successo!!";
            document.location.href = "./index.php";
        } else {
            document.getElementById("result").innerText = response.data["login_error"];
        }
    });
}