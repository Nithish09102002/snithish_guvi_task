$(document).ready(function () {
  $("#profileForm").submit(function (event) {
    event.preventDefault();

    var name = $("#name").val();
    var dob = $("#dob").val();
    var age = $("#age").val();
    var bloodGroup = $("#bloodGroup").val();
    var phone = $("#phone").val();

    var formData = {
      name: name,
      dob: dob,
      age: age,
      bloodGroup: bloodGroup,
      phone: phone,
    };

    $.ajax({
      type: "POST",
      url: "profile.php",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $("#successMessage").text(response.message).show();

          $("#profileForm input, #profileForm select").prop("disabled", true);

          $("#saveButton").hide();

          $("#editButton").prop("disabled", false).show();
        }
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  });

  $("#editButton").click(function () {
    $("#phone").prop("disabled", false);
  });
});
