<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bluemedia</title>

    <style>

        /* ===== Poppins fonts ===== */
        @font-face {
            font-family: 'RobotoRegular';
            src: url("/storage/static/fonts/Roboto-Regular.ttf") format("truetype"); }

        @font-face {
            font-family: 'RobotoBold';
            src: url("/storage/static/fonts/Roboto-Bold.ttf") format("truetype"); }

        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            font-family: RobotoRegular, sans-serif; }

        .container {
            width: 100vw;
            height: 100vh;
            background: url(/storage/static/img/bg-1.png) bottom center no-repeat;
            -webkit-background-size: cover;
            background-size: cover; }
        .container__block {
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            text-align: center; }
        .container__img {
            display: block;
            width: 170px;
            height: 170px;
            margin: 0 auto 50px;
            background: url(/storage/static/img/rocket.png) center no-repeat;
            -webkit-background-size: contain;
            background-size: contain; }
        .container__text {
            font-family: RobotoBold, sans-serif;
            font-size: 110px;
            color: #fff;
            margin-bottom: 50px; }
        .container__contact {
            font-size: 35px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 25px; }
        .container__email {
            font-size: 35px;
            font-weight: 600;
            color: #FFD506; }

        @media screen and (max-width: 700px) {
            .container__text {
                font-size: 70px; } }

        @media screen and (max-width: 440px) {
            .container__img {
                width: 100px;
                height: 100px; }
            .container__text {
                font-size: 48px; }
            .container__contact, .container__email {
                font-size: 22px; } }

        /*# sourceMappingURL=app.css.map */


    </style>

</head>
<body>

<div class="container">
    <div class="container__block">
        <div class="container__img"></div>
        <div class="container__text">
            Website<br>
            Coming Soon
        </div>
        <div class="container__contact">Contact Us At</div>
        <div class="container__email">support@blueomedia.com</div>
    </div>
</div>


</body>
</html>