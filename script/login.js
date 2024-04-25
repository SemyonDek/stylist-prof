let logForm = document.getElementById("login-form"),
  logButton = document.getElementById("logButton");

function login() {
  let formData = new FormData(logForm);

  var url = "functions/account/login.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response == "") {
      window.location.replace("account.php");
    } else {
      alert(xhr.response);
    }
  };
}

logButton.onclick = function () {
  login();
};
