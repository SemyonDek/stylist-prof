let button = document.getElementById("add-category-button");

function addCategory() {
  let form = document.getElementById("addCategoryForm");

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
      if (element["name"].startsWith("file_photo")) {
        alert("Добавьте изображение");
      } else {
        document.getElementById(element["name"]).style = style_input_red;
      }
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/category/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Категория добавлена");

    data.forEach((element) => {
      if (
        element["value"] !== "" &&
        !element["name"].startsWith("file_photo") &&
        !element["name"].startsWith("catid")
      ) {
        document.getElementById(element["name"]).value = "";
      }
    });
    document.getElementById("file_photo").value = null;

    if (document.getElementById("catid") !== null) {
      document.getElementById("catid").value = 0;
      document.getElementById("catid").innerHTML =
        xhr.response.getElementById("catid").innerHTML;
    }
  };
}

button.onclick = function () {
  addCategory();
};
