<?php 

include("config.php");
$con=connect();


$news_events=$con->query("SELECT * FROM `news_events`");
$count_news=$news_events->num_rows;
$news_events_edit=$con->query("SELECT * FROM `news_events`");
$news_thumbnail=$con->query("SELECT * FROM `news_events`");

$slideshow_announcement=$con->query("SELECT * FROM `slideshow` WHERE `type`='Announcement'");
$slideshow_banner=$con->query("SELECT * FROM `slideshow` WHERE `type`='Banner'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script href="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/image/logopngplain.png" type="image/x-icon">
    <title>Divine Life Memorial Park</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/01_User_Home.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <script src="Assets/js/index.js" defer></script>

</head>
<body>

    <header class="primary-header" style="z-index:1000">
        <div class="logo">
            <img src="Assets/image/logopngplain.png" alt="navLogo" class="navlogo">
        </div>

        <button aria-controls="primary-nav" aria-expanded="false" class="nav-toggle">
            <span class="sr-only">
                Menu
            </span>
        </button>

        <nav>
            <ul class="primary-nav" id="primary-nav" data-visible="false">
                <li> 
                    <a href="index.php">HOME</a> 
                </li>
                <li> 
                    <a href="index.php">ABOUT</a> 
                </li>
                 <li> 
                    <a href="#product">PRODUCT</a> 
                </li>
                <li> 
                    <a href="index.php">FAQs</a> 
                </li>
                <li> 
                    <a href="index.php">NEWS & EVENTS</a> 
                </li>
                <li> 
                    <a href="index.php">CONTACT</a> 
                </li>
            </ul>
        </nav>

    </header>

    
    
       
        
            <div class="about-content" id="product" style="padding-top: 15px">
    <h1 class="service-text">INTERMENT TYPES</h1>
    <div class="services">
        <div class="service-type">
            <div class="type-img">
                <img class="service-img" src="Assets/image/service-type1.jpg" alt="">
            </div>
            <div class="type-content">
                <i class="fa fa-archway"></i>
                <h1>MAUSOLEUM</h1>
                <p>Our lovely mausoleums provide the privacy of a dry, sanitary tomb for the same (or less) cost as traditional ground burial.
                    Has a lot area of 30sqm (4m x 7.5m), and it is unlimited internment.</p>
            </div>
        </div>

        <div class="service-type">
            <div class="type-img">
                <img class="service-img" src="Assets/image/service-type2.jpg" alt="">
            </div>
            <div class="type-content">
                <i class="fa fa-chess-king"></i>
                <h1>UNDERGROUND</h1>
                <p>Divine Life Memorial Park provides a quiet environment for traditional ground burials, keeps your entire family together in a more private setting.
                    Lawn lot 2.44 meter, Single lot and underground burial only with double interment.
                </p>
            </div>
        </div>
    </div>
</div>

            <div class="about-content" id="product" style="padding-top: 15px">
                
                <div class="services">
                    <div class="service-type">
                        <div class="type-img">
                            <img src="Assets/image/service-type1.jpg" alt="">
                        </div>
                        <div class="type-content">
                            <i class="fa fa-archway"></i>
                            <h1>MAUSOLEUM</h1>
                            <p>Our lovely mausoleums provide the privacy of a dry, sanitary tomb for the same (or less) cost as traditional ground burial.
                                Has a lot area of 30sqm (4m x 7.5m), and it is unlimited internment</p>
                        </div>
                    </div>
                    
                    <div class="service-type">
                        <div class="type-img">
                            <img src="Assets/image/service-type2.jpg" alt="">
                        </div>
                        <div class="type-content">
                            <i class="fa fa-chess-king"></i>
                            <h1>UNDERGROUND</h1>
                            <p>Divine Life Memorial Park provides a quiet environment for traditional ground burials, keeps your entire family together i a more private setting.
                                Lawn lot 2.44 meter, Single lot and underground burial only with double interment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="about-content" id="product" style="padding-top: 15px">
                
                <div class="services">
                    <div class="service-type">
                        <div class="type-img">
                            <img src="Assets/image/service-type1.jpg" alt="">
                        </div>
                        <div class="type-content">
                            <i class="fa fa-archway"></i>
                            <h1>MAUSOLEUM</h1>
                            <p>Our lovely mausoleums provide the privacy of a dry, sanitary tomb for the same (or less) cost as traditional ground burial.
                                Has a lot area of 30sqm (4m x 7.5m), and it is unlimited internment</p>
                        </div>
                    </div>
                    
                    <div class="service-type">
                        <div class="type-img">
                            <img src="Assets/image/service-type2.jpg" alt="">
                        </div>
                        <div class="type-content">
                            <i class="fa fa-chess-king"></i>
                            <h1>UNDERGROUND</h1>
                            <p>Divine Life Memorial Park provides a quiet environment for traditional ground burials, keeps your entire family together i a more private setting.
                                Lawn lot 2.44 meter, Single lot and underground burial only with double interment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="about-content" id="product" style="padding-top: 15px">
                
                <div class="services">
                    <div class="service-type">
                        <div class="type-img">
                            <img src="Assets/image/service-type1.jpg" alt="">
                        </div>
                        <div class="type-content">
                            <i class="fa fa-archway"></i>
                            <h1>MAUSOLEUM</h1>
                            <p>Our lovely mausoleums provide the privacy of a dry, sanitary tomb for the same (or less) cost as traditional ground burial.
                                Has a lot area of 30sqm (4m x 7.5m), and it is unlimited internment</p>
                        </div>
                    </div>
                    
                    <div class="service-type">
                        <div class="type-img">
                            <img src="Assets/image/service-type2.jpg" alt="">
                        </div>
                        <div class="type-content">
                            <i class="fa fa-chess-king"></i>
                            <h1>UNDERGROUND</h1>
                            <p>Divine Life Memorial Park provides a quiet environment for traditional ground burials, keeps your entire family together i a more private setting.
                                Lawn lot 2.44 meter, Single lot and underground burial only with double interment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    
    <br>

    <div class="contact-us" id="contact">
        <div class="contact-div1">
            <div class="contact-div1-img">
                <img src="Assets/image/undraw_personal_email_re_4lx7.svg" alt="">
            </div>
            <div class="contact-div1-content1">
                <div class="content-1">
                    <h1>GET IN TOUCH</h1>
                    <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
                </div>
                <div class="content-2">
                    <div class="soc-med">
                        <div class="soc-med-img">
                            <img src="Assets/image/facebook-square-brands.svg" alt="">
                        </div>
                        <div class="soc-med-link">
                            <a href="">https://www.facebook.com/Divine-Life-Memorial-Park</a>
                        </div>
                    </div>
                    <div class="soc-med">
                        <div class="soc-med-img">
                            <img src="Assets/image/phone-solid.svg" alt="">
                        </div>
                        <div class="soc-med-link">
                            <a href="tel:09569824700">0956 982 4700</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
   
  

    <!-- Your SDK code -->
   
</body>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="Assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>

