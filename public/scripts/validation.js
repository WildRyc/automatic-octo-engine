//this function should validated an username
function validateForm() {
    let x = document.forms["myForm"]["username"].value;
    if (x == "") {
      alert("Username must be filled out");
      return false;
    }
  }

  //this field should validate the password
  function validateForm() {
  let x = document.forms["myForm"]["password"].value;
    if (x == "") {
      alert("Password must be filled out");
      return false;
    }
  }

