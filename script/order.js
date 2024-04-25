function addCoupon() {
  let formData = new FormData();

  formData.append("coupon", document.getElementById("coupon").value);

  var url = "functions/basket/addCoupon.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);

  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response.getElementById("sale-value").innerHTML == "0%") {
      alert("Купона не существует");
    }
    console.log(xhr.response);
    document.getElementById("sale-value").innerHTML =
      xhr.response.getElementById("sale-value").innerHTML;
    document.getElementById("amount-products-basket").innerHTML =
      xhr.response.getElementById("amount-products-basket").innerHTML;
  };
}

function addOrder() {
  let form = document.getElementById("order-form");
  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return {
        name,
        value,
      };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #DADADA;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/order/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ оформлен");
    window.location.replace("index.php");
  };
}
