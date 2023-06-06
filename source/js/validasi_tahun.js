function validateForm() {
  var select = document.getElementById("year");
  if (select.value === "0") {
    alert("Harap pilih jenis kelamin");
    return false;
  }
  return true;
}
