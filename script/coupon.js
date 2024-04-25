let buttonAdd = document.getElementById("add-coupon-button");

function addCoupon() {
  let code = document.getElementById("code-coupon");
  let sale = document.getElementById("sale-coupon");

  prov = true;
  if (code.value == "") {
    prov = false;
  }
  if (sale.value == "" || sale.value < 1 || sale.value > 99) {
    prov = false;
  }

  if (!prov) {
    alert("Данные не корректны");
  } else {
    let formData = new FormData();
    formData.append("code", code.value);
    formData.append("sale", sale.value);

    var url = "../functions/coupon/add.php";

    let xhr = new XMLHttpRequest();
    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      document.getElementById("CouponTableBody").innerHTML =
        xhr.response.getElementById("CouponTableBody").innerHTML;
    };
  }
}

buttonAdd.onclick = function () {
  addCoupon();
};

function delCoupon(id) {
  let formData = new FormData();
  formData.append("id", id);

  var url = "../functions/coupon/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("CouponTableBody").innerHTML =
      xhr.response.getElementById("CouponTableBody").innerHTML;
  };
}
