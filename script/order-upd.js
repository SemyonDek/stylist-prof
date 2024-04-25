function updOrder() {
  let statusOrder = document.getElementById("statusOrder").value;
  let idOrder = document.getElementById("idOrder").value;

  let formData = new FormData();
  formData.append("statusOrder", statusOrder);
  formData.append("idOrder", idOrder);

  var url = "../functions/order/upd.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    alert("Состояние изменено");
  };
}
