<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blueomedia</title>

    <link href="/storage/static/css/app.css" rel="stylesheet">

</head>
<body>

<section id="header-menu">
    <div class="container">
        <div class="header-menu">
            <a href="index.html" class="header-menu__logo">
                <img src="/storage/static/img/logo.png" alt="">
            </a>
            <ul class="header-list">
                <li><a href="#about" class="header-list__link justscroll active">about us</a></li>
                <li><a href="#services" class="header-list__link justscroll">ventures</a></li>
                <li><a href="#contact" class="header-list__link justscroll">contact</a></li>
            </ul>
            <div class="icon-toggle">
                <div class="icon-toggle__line"></div>
            </div>
        </div>
    </div>
</section>

<header id="header">
    <div class="container">
        <div class="header">
            <div class="header__text">
                <h1>Welcome to Blue Media!</h1>
                <p>
                    We build premium digital services.<br>
                    We’re all fully committed to driving the ventures we
                    believe in, so they can grow to their full potential.

                </p>
            </div>
        </div>
    </div>
</header>

<section id="about">
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about__img">
                        <img src="/storage/static/img/build.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about__text">
                        <h2>About us</h2>
                        <p>
                            We love all things online – we’re fully fledged techies who think, dream, design and build
                            the products and services that will shape our future. Although we’re big on the subscription
                            model, we’re also open to new ideas, alternative visions and fresh ways of working.
                        </p>
                        <p>
                            By bringing together all the right ingredients – from funding to technologies, analytics to
                            online payment systems -, we construct innovative technologies & services to hatch our
                            in-house ventures and take them to market – we also do the same with inspirational projects
                            from budding entrepreneurs!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <h2>Ventures we’ve already hatched</h2>
        <div class="services">
            <div class="services-block">
                <div class="services-block__elem services-block__elem-gradient">
                    <img src="/storage/static/img/services.png" alt="">
                </div>
                <div class="services-block__elem">
                    <h5>SUBSCRIPTION & CONTENT DISTRIBUTION PLATFORMS (B2C)</h5>
                    <p>
                        Design and manage premium subscription streaming services (Movies, Sports, Music, eBooks &
                        Games) using an intuitive platform adapted to all screens.
                    </p>
                </div>
            </div>
            <div class="services-block">
                <div class="services-block__elem services-block__elem-gradient"></div>
                <div class="services-block__elem">
                    <h5>SOCIAL NETWORK PLATFORMS (B2C)</h5>
                    <p>
                        As the world’s first social network white label provider , support media brands, affiliates and
                        entrepreneurs in effortlessly creating their own online social networks.
                    </p>
                </div>
            </div>
        </div>
        <div class="services">
            <div class="services-block">
                <div class="services-block__elem">
                    <h5>PERFORMANCE MARKETING MANAGEMENT SOLUTIONS (B2B)</h5>
                    <p>
                        Enable media buying teams, agencies and affiliates to track, manage, analyze and optimize all
                        their campaigns in one place.
                    </p>
                </div>
                <div class="services-block__elem services-block__elem-gradient"></div>
            </div>
            <div class="services-block">
                <div class="services-block__elem">
                    <h5>PERFORMANCE MINDSET</h5>
                    <p>
                        Our aim is to get the highest quality of services. We have top level team dedicated to our craft.
                    </p>
                </div>
                <div class="services-block__elem services-block__elem-gradient"></div>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <h2>Contact us</h2>
        <div class="contact">
            <form class="contact-form" id="contact-form"  method="post>

                <input type="text" name="Name" class="contact-form__inp" placeholder="Name">
            <input type="text" name="Email" class="contact-form__inp" placeholder="E-mail">
            <input type="text" name="Subject" class="contact-form__inp" placeholder="Subject">
            <textarea type="text" name="Message" class="contact-form__textarea" placeholder="Message"></textarea>
            <button type="button" class="contact-form__btn-send" id="submit-contact-form">Send <span
                        class="btn-arrow">&#10140;</span></button>
            </form>
            <div class="address">
                <div class="address__email">e-mail: info@blueomedia.com</div>
                <div class="address__phone">
                    phone: +1 (23) 456 77 83
                    <div class="phone_two">+1 (23) 456 77 84</div><br>
                    <div class="address_street">
                        BLUEPLANET MEDIA LIMITED
                        No. 5, 17/F Bonham Trade Centre
                        50 Bonham Strand, Sheung Wan, HK
                    </div>
                </div>

                <img class="bg_footer" src="/storage/static/img/bg_footer.png" alt="">
            </div>
        </div>
    </div>
</section>


<!-- ===== SCRIPTS ===== -->
<script src="/storage/static/libs/jquery/jquery.min.js"></script>
<script src="/storage/static/js/app.js"></script>

</body>
</html>