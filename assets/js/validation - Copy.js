function doValidate() {


  var _Name = document.getElementById("NAME").value;
  var _LAST_NAME = document.getElementById("LAST_NAME").value;
  var _emailID = document.getElementById("emailID").value;
  var _MobileNo = document.getElementById("MobileNo").value;
  var _COMPANY = document.getElementById("COMPANY").value;
  var _COMMENT = document.getElementById("COMMENT").value;

  if (document.getElementById("NAME").value == '') {
    alert("Please enter your first name");
    document.getElementById("NAME").focus();
    return false;
  }
  if (document.getElementById("LAST_NAME").value == '') {
    alert("Please enter your last name");
    document.getElementById("LAST_NAME").focus();
    return false;
  }
  if (document.getElementById("COMPANY").value == '') {
    alert("Please enter your company name!");
    document.getElementById("COMPANY").focus();
    return false;
  }
  if (document.getElementById("MobileNo").value == '') {
    alert("Please enter your phone number!");
    document.getElementById("MobileNo").focus();
    return false;
  }
  if (document.getElementById("emailID").value == '') {
    alert("Please enter your business email id!");
    document.getElementById("emailID").focus();
    return false;
  }

  if (document.getElementById("COMMENT").value == '') {
    alert("Please enter your comment!");
    document.getElementById("COMMENT").focus();
    return false;
  } else {

    $("#doValidate_btn").attr("disabled", "disabled");
    $("#loader").html("<img src='assets/loader.gif' width='30px'/>");
    $.ajax({
      type: "POST",
      url: "post.php",
      data: {
        _NAME: _Name,
        _LAST_NAME: _LAST_NAME,
        _COMPANY: _COMPANY,
        _Email: _emailID,
        _Phone: _MobileNo,
        _COMMENT: _COMMENT
      },
      dataType: "JSON",
      success: function (data) {
        swal.fire({
          title: "Thank you",
          text: "Thank you for your interest, will get back to you asap.",
          icon: "success",
          button: "Cool!!!",
        }).then((result) => {
          location.reload();
        });

        //$("#message").html(data);
      },
      error: function (err) {
        swal.fire({
          title: "Opps!!!",
          text: "Your Message was not sent, please try again",
          icon: "warning",
          button: "Cool!!!",
        }).then((result) => {
          location.reload();
        });
      }
    });


  }


}
