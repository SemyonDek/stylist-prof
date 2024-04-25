function buyProd(id) {
  let formData = new FormData();
  formData.append("idProd", id);
  formData.append("value", 1);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    document.getElementById("basket-count").innerHTML =
      xhr.response.getElementById("basket-count").innerHTML;
  };
}

function addBasket(id) {
  let value = document.getElementById("value-prod-input").value;

  let formData = new FormData();
  formData.append("idProd", id);
  formData.append("value", value);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    document.getElementById("basket-count").innerHTML =
      xhr.response.getElementById("basket-count").innerHTML;
  };
}

function delBasket(id) {
  let formData = new FormData();
  formData.append("id", id);

  var url = "functions/basket/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    // alert("Товар удален из корзины");
    document.getElementById("count-products-basket").innerHTML =
      xhr.response.getElementById("count-products-basket").innerHTML;
    document.getElementById("basket-count").innerHTML =
      xhr.response.getElementById("basket-count").innerHTML;
    document.getElementById("amount-products-basket").innerHTML =
      xhr.response.getElementById("amount-products-basket").innerHTML;
    document.getElementById("basket-tbody").innerHTML =
      xhr.response.getElementById("basket-tbody").innerHTML;
    if (document.getElementById("basket-tbody").innerHTML == "") {
      window.location.replace("index.php");
    }
  };
}
