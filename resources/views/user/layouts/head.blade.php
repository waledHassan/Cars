<!doctype html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Animate CSS --> 
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <!-- Carousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- Carousel Default CSS -->
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Slick Theme CSS -->
    <link rel="stylesheet" href="assets/css/slick-theme.min.css">

    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" href="assets/css/style-en.css">
    @else
        <link rel="stylesheet" href="assets/css/style-ar.css">
    @endif

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive-en.css">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="assets/css/dark.css">

    <?php 
    if(isset($styles) && count($styles)){
        foreach($styles as $style){
            echo "<link rel=\"stylesheet\" href=\"assets/css/{$style}.css\">";
        }
    }
    ?>
    
    <title>Speer || سبير</title>

    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @include('sweetalert::alert')