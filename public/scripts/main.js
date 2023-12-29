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

function validateBrandReview(brandReviewId) {
  console.log(brandReviewId);
  $.ajax({
    url: "/CarLog/app/api/reviews/brand/validateReview.php",
    method: "POST",
    data: { brandReviewId: brandReviewId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}
function rejectBrandReview(brandReviewId) {
  $.ajax({
    url: "/CarLog/app/api/reviews/brand/rejectReview.php",
    method: "POST",
    data: { brandReviewId: brandReviewId },
    success: function (response) {
      location.reload();
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}
function validateVehiculeReview(vehiculeReviewId) {
  $.ajax({
    url: "/CarLog/app/api/reviews/vehicule/validateReview.php",
    method: "POST",
    data: { vehiculeReviewId: vehiculeReviewId },
    success: function (response) {
      location.reload();
    },
    error: function (error) {
      console.error(error);
    },
  });
}
function rejectVehiculeReview(vehiculeReviewId) {
  $.ajax({
    url: "/CarLog/app/api/reviews/vehicule/rejectReview.php",
    method: "POST",
    data: { vehiculeReviewId: vehiculeReviewId },
    success: function (response) {
      location.reload();
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function deleteNews(newsId) {
  $.ajax({
    url: "/CarLog/app/api/news/deleteNews.php",
    method: "POST",
    data: { newsId: newsId },
    success: function (response) {
      location.reload();
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function addFavoriteVehicule(userId, vehiculeId) {
  $.ajax({
    url: "/CarLog/app/api/users/addFavoriteVehicule.php",
    method: "POST",
    data: { userId: userId, vehiculeId: vehiculeId },
    success: function (response) {
      location.reload();
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

function getBrandVehicules(brandSelect) {
  var brandId = brandSelect.value;
  console.log(brandId);
  $.ajax({
    url: "/CarLog/app/api/brands/getBrandVehicules.php",
    method: "POST",
    data: { brandId: brandId },
    success: function (response) {
      $("#modelSelect").html(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}
