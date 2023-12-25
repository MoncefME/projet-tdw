function validateUser(userId) {
  $.ajax({
    url: "/CarLog/app/api/users/validateUser.php",
    method: "POST",
    data: { userId: userId },
    success: function (response) {
      console.log(response);
      $("#status-cell").css("background-color", "green");
      location.reload();
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function rejectUser(userId) {
  $.ajax({
    url: "/CarLog/app/api/users/rejectUser.php",
    method: "POST",
    data: { userId: userId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function deleteUser(userId) {
  $.ajax({
    url: "/CarLog/app/api/users/deleteUser.php",
    method: "POST",
    data: { userId: userId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function deleteBrand(brandId) {
  $.ajax({
    url: "/CarLog/app/api/brands/deleteBrand.php",
    method: "POST",
    data: { brandId: brandId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function deleteVehicule(vehiculeId) {
  $.ajax({
    url: "/CarLog/app/api/vehicules/deleteVehicule.php",
    method: "POST",
    data: { vehiculeId: vehiculeId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function validateBrandReview(reviewId) {
  $.ajax({
    url: "/CarLog/app/api/reviews/brand/validateReview.php",
    method: "POST",
    data: { reviewId: reviewId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}
function rejectBrandReview(reviewId) {
  $.ajax({
    url: "/CarLog/app/api/reviews/brand/rejectReview.php",
    method: "POST",
    data: { reviewId: reviewId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}
function validateVehiculeReview(reviewId) {
  $.ajax({
    url: "/CarLog/app/api/reviews/vehicule/validateReview.php",
    method: "POST",
    data: { reviewId: reviewId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}
function rejectVehiculeReview(reviewId) {
  $.ajax({
    url: "/CarLog/app/api/reviews/vehicule/rejectReview.php",
    method: "POST",
    data: { reviewId: reviewId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function previewInputImage(event) {
  console.log("File input changed");
  var file = event.target.files[0];
  var reader = new FileReader();
  reader.onload = function (e) {
    $("#previewImage").attr("src", e.target.result);
    $("#previewImage").css("display", "block");
    $("#previewImage").show();
  };
  reader.readAsDataURL(file);
}
