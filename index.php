<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLog</title>
</head>

<body>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/router.php");
    ?>

    <nav>
        <ul>
            <li><a href="/CarLog/">Home</a></li>
            <li><a href="/CarLog/contactPage/">Contact</a></li>
            <li><a href="/CarLog/brandsPage/">Brands</a></li>
            <li><a href="/CarLog/comparatorPage/">Comparator</a></li>
            <li><a href="/CarLog/newsPage/">News</a></li>
            <li><a href="/CarLog/profilePage/">Profile</a></li>
            <li><a href="/CarLog/reviewsPage/">Reviews</a></li>
            <li><a href="/CarLog/admin/">Admin Dashboard</a></li>
            <li><a href="/CarLog/admin/manageBrandsPage/">Manage Brands</a></li>
            <li><a href="/CarLog/admin/manageNewsPage/">Manage News</a></li>
            <li><a href="/CarLog/admin/manageUsersPage/">Manage Users</a></li>
            <li><a href="/CarLog/admin/manageBrandsReviewsPage/">Manage Brands Reviews</a></li>
            <li><a href="/CarLog/admin/manageVehiculesReviewsPage/">Manage Vehicles Reviews</a></li>
            <li><a href="/CarLog/logInPage/">Login</a></li>
            <li><a href="/CarLog/signUpPage/">Sign Up</a></li>
        </ul>
    </nav>
</body>

</html>