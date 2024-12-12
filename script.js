document.addEventListener("DOMContentLoaded", function (){
   var modalReg = document.getElementById("myModalReg");
    var buttonReg = document.getElementById("registerBtn");
    var spanReg = document.getElementById("closeModalRegBtn");

    buttonReg.onclick = function () {
        modalReg.style.display = "block";
    }

    spanReg.onclick = function(){
        modalReg.style.display = "none";
    }
})

document.addEventListener("DOMContentLoaded", function (){
  var modalLog = document.getElementById("myModalLogin");
   var buttonLog = document.getElementById("loginBtn");
   var spanLog = document.getElementById("closeModalLogBtn");

   buttonLog.onclick = function () {
       modalLog.style.display = "block";
   }

   spanLog.onclick = function(){
       modalLog.style.display = "none";
   }
})

window.onclick = function (event) {
  var modalReg = document.getElementById("myModalReg");
  var modalLog = document.getElementById("myModalLogin");

  if (event.target == modalReg) {
      modalReg.style.display = "none";
  } else if (event.target == modalLog) {
      modalLog.style.display = "none";
  }
}
   
document.addEventListener("DOMContentLoaded", function () {
    const products = document.querySelectorAll(".product");

    products.forEach((product) => {
      product.addEventListener("mouseover", function () {
        product.style.backgroundColor = "#f4f4f4";
        product.style.boxShadow = "0 0 5px rgba(0, 0, 0, 0.3)";
      });

      product.addEventListener("mouseout", function () {
        product.style.backgroundColor = "";
        product.style.boxShadow = "";
      });

      product.addEventListener("click", function () {
        const cartCount = document.querySelector(".cart span");
        cartCount.textContent = parseInt(cartCount.textContent) + 1;
      });
    });

});

function validateForm(){
  var itemImageInput = document.getElementById('imageId');
  var imageUrl = itemImageInput.value;

  if(!imageUrl.startsWith('http://') && !imageUrl.startsWith('https://')){
    alert('Please enter a valid image link address');
    return false;
  }
  return true;

}

function loadTableDataReg() {
  var selectedTable = "registration";
  if (selectedTable !== "") {
      $.ajax({
          type: "POST",
          url: "getRegTableData.php",
          data: { registration: selectedTable },
          success: function (data) {
              $("#tableContainer").html(data);
          }
      });
  }
}

function loadTableDataItems() {
  var selectedTable = "items";
  if (selectedTable !== "") {
      $.ajax({
          type: "POST",
          url: "getItemTableData.php",
          data: { items: selectedTable },
          success: function (data) {
              $("#tableContainer").html(data);
          }
      });
  }
}

function updateRecord(recordId, currentName, currentEmail, currentPhone) {
  var newName = prompt("Enter new name:", currentName);
  var newEmail = prompt("Enter new email:", currentEmail);
  var newPhone = prompt("Enter new phone:", currentPhone);

  if (newName !== null && newEmail !== null && newPhone !== null) {
      $.ajax({
          type: "POST",
          url: "updateRecord.php",
          data: {
              id: recordId,
              name: newName,
              email: newEmail,
              phone: newPhone
          },
          success: function (data) {
              alert(data);
          },
          error: function (error) {
              alert("Error updating record");
          }
      });
  }
}

function deleteRecord(recordId) {
  var confirmation = confirm("Are you sure you want to delete record with ID: " + recordId);
  if (confirmation) {
      $.ajax({
          type: "POST",
          url: "deleteRecord.php",
          data: { id: recordId },
          success: function (data) {
              alert(data);
          }
      });
  }
}
