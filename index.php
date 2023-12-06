<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLog</title>
</head>

<body>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/routers/userRouter.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/routers/adminRouter.php");
    ?>
</body>

</html>