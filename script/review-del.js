function delComm(idComm) {
  let formData = new FormData();
  formData.append("idComm", idComm);

  var url = "../functions/reviews/del.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Отзыв удален");
    document.getElementById("reviews-adm").innerHTML =
      xhr.response.getElementById("reviews-adm").innerHTML;
  };
}
