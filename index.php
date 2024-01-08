<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLog</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="/CarLog/public/styles/user.css">
    <link rel="stylesheet" href="/CarLog/public/styles/main.css">
    <link rel="stylesheet" href="/CarLog/public/styles/admin.css">

    <!-- External JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    <script src="https://kit.fontawesome.com/06aa4f4a0c.js" crossorigin="anonymous"></script>

    <!-- Custom Scripts -->
    <script src="/CarLog/public/scripts/main.js"></script>
</head>

<body>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/router.php");
    ?>
</body>

</html>