let buttonUpdPhoto = document.getElementById("upd-photo-button");
let buttonUpdCat = document.getElementById("upd-category-button");
let buttonDelCat = document.getElementById("del-category-button");

function updPhoto() {
  let form = document.getElementById("PhotoCatForm");
  let catid = document.getElementById("catid").value;

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

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      alert("Добавьте изображение");
    }
  });

  if (!prov) return;

  let formData = new FormData(form);
  formData.append("catid", catid);

  var url = "../functions/category/updPhoto.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Фотография изменена");
    console.log(xhr.response);
    document.getElementById("file_photo").value = null;
    document.getElementById("mainPhotoCat").innerHTML =
      xhr.response.getElementById("mainPhotoCat").innerHTML;
  };
}

function updCat() {
  let form = document.getElementById("addCategoryForm");
  let catid = document.getElementById("catid").value;
  if (document.getElementById("parentid") !== null) {
    let parentid = document.getElementById("parentid").value;
  }

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
  style_input_gray = "border-color: #cfcfcf;";

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

  var url = "../functions/category/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Категория изменена");
    console.log(xhr.response);
  };
}

function delCat() {
  let catid = document.getElementById("catid").value;
  let formData = new FormData();
  formData.append("catid", catid);

  var url = "../functions/category/del.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response == "") {
      alert("Категория удалена");
      window.location.replace("category-list.php");
    } else {
      alert(xhr.response);
    }
  };
}

buttonUpdPhoto.onclick = function () {
  updPhoto();
};

buttonUpdCat.onclick = function () {
  updCat();
};

buttonDelCat.onclick = function () {
  delCat();
};
