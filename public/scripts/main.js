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

/************************** */
/** COMPARISION COMPARISON */
/************************* */

function handleBrandChange(brandSelect, vehiculeNumber) {
  var brandId = $(brandSelect).val();
  var modelSelect = $('[name="model-' + vehiculeNumber + '"]');
  var yearSelect = $('[name="year-' + vehiculeNumber + '"]');
  var resultDiv = $(".result-" + vehiculeNumber);

  modelSelect
    .prop("disabled", true)
    .empty()
    .append('<option value="0">Select a model</option>');
  yearSelect
    .prop("disabled", true)
    .empty()
    .append('<option value="0">Select a year</option>');
  resultDiv.empty();

  if (brandId !== "0") {
    modelSelect.prop("disabled", false);
  }

  $.ajax({
    url: "/CarLog/app/api/comparisions/getBrandVehicules.php",
    method: "POST",
    data: { brandId: brandId },
    success: function (response) {
      var vehiculeModels = JSON.parse(response);

      $.each(vehiculeModels, function (index, { id, model }) {
        var option = $("<option></option>");
        option.val(id);
        option.text(model);
        modelSelect.append(option);
      });
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function handleModelChange(modelSelect, vehiculeNumber) {
  var modelName = $(modelSelect).find(":selected").text();
  var brandId = $('[name="brand-' + vehiculeNumber + '"]').val();
  var yearSelect = $('[name="year-' + vehiculeNumber + '"]');
  var resultDiv = $(".result-" + vehiculeNumber);

  yearSelect
    .prop("disabled", true)
    .empty()
    .append('<option value="0">Select a year</option>');
  resultDiv.empty();

  if (modelName !== "Select a model") {
    yearSelect.prop("disabled", false);
  }

  $.ajax({
    url: "/CarLog/app/api/comparisions/getBrandVehicules.php",
    method: "POST",
    data: { brandId: brandId },
    success: function (response) {
      var vehiculeModels = JSON.parse(response);

      var vehiculeYears = vehiculeModels.filter(function (vehicule) {
        return vehicule.model == modelName;
      });

      $.each(vehiculeYears, function (index, { id, year }) {
        var option = $("<option></option>");
        option.val(id);
        option.text(year);
        yearSelect.append(option);
      });
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function handleYearsChange(yearSelect, vehiculeNumber) {
  var brandId = $('[name="brand-' + vehiculeNumber + '"]').val();
  var model = $('[name="model-' + vehiculeNumber + '"] :selected').text();
  var year = $(yearSelect).find(":selected").text();
  var resultDiv = $(".result-" + vehiculeNumber);

  if (year !== "Select a year") {
    resultDiv.empty();

    $.ajax({
      url: "/CarLog/app/api/comparisions/getComparisionVehicule.php",
      method: "POST",
      data: { brandId: brandId, model: model, year: year },
      success: function (response) {
        var vehicule = JSON.parse(response);

        var card = $('<div class="vehicule-card"></div>');
        card.append(
          '<img src="/CarLog/public/uploads/vehicules/' +
            vehicule.vehiculePicture +
            '" alt="' +
            vehicule.model +
            '" width="80">'
        );
        card.append("<p>" + vehicule.model + "</p>");
        card.append("<p>Version: " + vehicule.version + "</p>");
        card.append('<p">Year: ' + vehicule.year + "</p>");
        card.append(
          '<input type="hidden" name="vehiculeId-' +
            vehiculeNumber +
            '" value="' +
            vehicule.id +
            '">'
        );
        resultDiv.append(card);
      },
      error: function (error) {
        console.error(error);
      },
    });
  }
}

function showComparisionTable(isNewComparision) {
  console.log(isNewComparision);
  var vehicule1Id = $('[name="vehiculeId-1"]').val();
  var vehicule2Id = $('[name="vehiculeId-2"]').val();
  var vehicule3Id = $('[name="vehiculeId-3"]').val();
  var vehicule4Id = $('[name="vehiculeId-4"]').val();
  if (vehicule3Id || vehicule4Id) isNewComparision = true;
  $.ajax({
    url: "/CarLog/app/api/comparisions/getComparisionVehicules.php",
    method: "POST",
    data: {
      vehicule1Id: vehicule1Id,
      vehicule2Id: vehicule2Id,
      vehicule3Id: vehicule3Id,
      vehicule4Id: vehicule4Id,
    },
    success: function (response) {
      response = JSON.parse(response);

      if (response.error) {
        alert(response.error);
        // Swal.fire({
        //   icon: "error",
        //   title: "Oops...",
        //   text: response.error,
        // });
        console.log(response.error);
      } else {
        var comparisionVehicules = response;
        // remove null values
        comparisionVehicules = comparisionVehicules.filter(function (vehicule) {
          return vehicule !== null;
        });
        console.log(comparisionVehicules);
        var table = $(".comparision-result-table");
        table.empty();
        var headerRow = $("<thead></thead>");
        headerRow.append("<th></th>");
        comparisionVehicules.forEach(function (vehicle, index) {
          headerRow.append("<th>Vehicule " + (index + 1) + "</th>");
        });
        table.append(headerRow);

        var tableBody = $("<tbody></tbody>");
        // SHOW THE IMAGE
        var imageRow = $("<tr><td>Image</td></tr>");
        comparisionVehicules.forEach(function (vehicule) {
          console.log(vehicule.vehiculePicture);
          imageRow.append(
            '<td><img src="/CarLog/public/uploads/vehicules/' +
              vehicule.vehiculePicture +
              '" alt="' +
              vehicule.model +
              '" width="80"></td>'
          );
        });
        tableBody.append(imageRow);

        //SHOW THE BRAND IMAGE
        var brandRow = $("<tr><td>Brand</td></tr>");
        comparisionVehicules.forEach(function (vehicule) {
          // CALL THE API
          $.ajax({
            url: "/CarLog/app/api/comparisions/getBrandById.php",
            method: "POST",
            data: { brandId: vehicule.brand_id },
            success: function (response) {
              var brand = JSON.parse(response);
              brandRow.append(
                '<td><img src="/CarLog/public/uploads/brands/' +
                  brand.brandPicture +
                  '" alt="' +
                  brand.brandName +
                  '" width="80"></td>'
              );
            },
            error: function (error) {
              console.error(error);
            },
          });
        });
        tableBody.append(brandRow);

        for (var attribute in comparisionVehicules[0]) {
          if (
            attribute == "id" ||
            attribute == "vehiculePicture" ||
            attribute == "brand_id"
          )
            continue;
          var row = $("<tr><td>" + attribute + "</td></tr>");
          comparisionVehicules.forEach(function (vehicule) {
            row.append("<td>" + vehicule[attribute] + "</td>");
          });
          tableBody.append(row);
        }

        table.append(tableBody);
        table.show();

        // $(".comparator-container").hide();
        // if (!isNewComparision) {
        //   $(".comparator-container").show();
        // }
        if (isNewComparision) addComparision();
      }
    },
    error: function (error) {
      console.error(error);
    },
  });
}

function addComparision() {
  var vehicule1Id = $('[name="vehiculeId-1"]').val();
  var vehicule2Id = $('[name="vehiculeId-2"]').val();
  var vehicule3Id = $('[name="vehiculeId-3"]').val();
  var vehicule4Id = $('[name="vehiculeId-4"]').val();
  $.ajax({
    url: "/CarLog/app/api/comparisions/addComparision.php",
    method: "POST",
    data: {
      vehicule1Id: vehicule1Id,
      vehicule2Id: vehicule2Id,
      vehicule3Id: vehicule3Id,
      vehicule4Id: vehicule4Id,
    },
    success: function (response) {
      console.log("Comparision adding test");
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}

$(document).ready(function () {
  let currentIndex = 0;
  const images = $(".slider img");
  const totalImages = images.length;

  function showNextImage() {
    $(images[currentIndex]).css("z-index", 1);
    currentIndex = (currentIndex + 1) % totalImages;
    $(images[currentIndex]).css("z-index", 2);
  }

  setInterval(showNextImage, 2000);
});

$(document).ready(function () {
  $("#userTable").DataTable({
    pageLength: 4,
    ordering: true,
    searching: true,
    responsive: true,
    lengthMenu: [4],
    columnDefs: [
      { orderable: false, targets: [5, 7] },
      { searchable: false, targets: [5, 7] },
    ],
  });
  $("#brandTable").DataTable({
    pageLength: 4,
    ordering: true,
    searching: true,
    responsive: true,
    lengthMenu: [4],
    columnDefs: [{ orderable: false, targets: [2] }],
  });
  $("#vehiculeTable").DataTable({
    pageLength: 4,
    ordering: true,
    searching: true,
    responsive: true,
    lengthMenu: [4],
  });
  $("#vehiculeReviewTable").DataTable({
    pageLength: 4,
    ordering: true,
    searching: true,
    responsive: true,
    lengthMenu: [4],
    columnDefs: [{ orderable: false, targets: [2] }],
    initComplete: function () {
      $("#loader").hide();
      $("#vehiculeReviewTable").show();
    },
  });
  $("#brandReviewTable").DataTable({
    pageLength: 4,
    ordering: true,
    searching: true,
    responsive: true,
    lengthMenu: [4],
    columnDefs: [{ orderable: false, targets: [2] }],
    initComplete: function () {
      $("#loader").hide();
      $("#brandReviewTable").show();
    },
  });
  $("#newTable").DataTable({
    pageLength: 4,
    ordering: true,
    searching: true,
    responsive: true,
    lengthMenu: [4],
    columnDefs: [{ orderable: false, targets: [2] }],
  });
});

$(document).ready(function () {
  $("#brandsTable").show();
  $("#toggleButtonBrand").click(function () {
    $("#brandsTable").toggle();
    $("#brandForm").toggle();

    var buttonText = $("#brandsTable").is(":visible")
      ? "Show Form"
      : "Show Table";

    $("#toggleButtonBrand span").text(buttonText);
  });

  $("#vehiculesTable").show();
  $("#toggleButtonVehicule").click(function () {
    $("#vehiculesTable").toggle();
    $("#vehiculeForm").toggle();

    var buttonText = $("#vehiculesTable").is(":visible")
      ? "Show Form"
      : "Show Table";

    $("#toggleButtonVehicule span").text(buttonText);
  });

  $("#newsTable").show();
  $("#toggleButtonNews").click(function () {
    $("#newsTable").toggle();
    $("#newForm").toggle();

    var buttonText = $("#newsTable").is(":visible")
      ? "Show Form"
      : "Show Table";

    $("#toggleButtonNews span").text(buttonText);
  });
});
