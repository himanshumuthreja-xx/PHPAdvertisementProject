function changeCategory() {
    var selectedValue = $("#adCateg").find(":selected").val();
    //    alert(selectedValue);
    if (selectedValue != '') {
        window.location = "http://localhost:8181/php/Project/Advertisement/Home.php?category=" + selectedValue;
    } else {
        window.location = "http://localhost:8181/php/Project/Advertisement/Home.php";
    }

}

function setAdCategory(adCategoryId) {
    $("#adCateg").val(adCategoryId);
}
