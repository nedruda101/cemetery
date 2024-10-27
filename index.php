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
                    <a href="#">HOME</a> 
                </li>
                <li> 
                    <a href="#about">ABOUT</a> 
                </li>
                 <li> 
                    <a href="product.php">PRODUCT</a> 
                </li>
                <li> 
                    <a href="#faqs">FAQs</a> 
                </li>
                <li> 
                    <a href="#news">NEWS & EVENTS</a> 
                </li>
                <li> 
                    <a href="#contact">CONTACT</a> 
                </li>
            </ul>
        </nav>

    </header>

    
    
        <div class="about" >
            <div class="about-pic">
                <h1>A Memorial Heaven</h1>
                <h1>Where Love And Care Last A Lifetime</h1>
                <p> We recognize the importance of delivering compassionate services to families and loved ones,
                    A cemetery that embraces a culture of healing and compassionate care in every area of stewardship for the living and those that are resting here.</p>
            </div>
            </div>
        
            <div class="about-content" id="product" style="padding-top: 15px">
                <h1 class="service-text">INTERMENT TYPES</h1>
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
    <div id="faqs"></div>
    <div class="faq mt-5" id="faq">
        <div class="container faq-cont">
            <div class="faq-title text-center py-5">
                <h1>FREQUENTLY ASKED QUESTIONS (FAQs)</h1>
            </div>
            <div class="row row-cols-md-2">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="accordion w-100" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Where I can find your location?
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                
                                <p> Our <strong> Main Office </strong> is Located at <strong> 238 JP Rizal Street, Brgy. Poblacion, Cabuyao, Laguna </strong> at the back of Entrepreneur Bank</p>
                                <p> <strong> Main Site</strong> is Located at <strong> Brgy. Gulod 4024 Cabuyao, Laguna </strong>. You can view our contact page for more info</p>
                                
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                What day is available to visit?
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <p>You can visit Divine Life Memorial Park daily at <strong>7:00 AM - 7:00 PM</strong></p>
                                <p>Our main office opens <strong>Monday-Friday 8:00 AM - 4:00 PM</strong> , and in <Strong>Saturdays 9:00 AM - 12:00 PM</Strong> </p>
                                
                                
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                What are the requirements in purchasing Lawn Lot?
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <p>It only needs <strong> Valid ID, Proof of Billing and Buyers Form (BAF) </strong></p>

                                <p>- Assists Buyer and Seller on choosing their desired lot location </p>
                                <p>- Discuss about product type and description, payment, plan, term and other park policies </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-none d-sm-block">
                    <div class="faq-img">
                        <img src="Assets/image/faq.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="news"></div>
    <section class="news pt-5 mt-5">
        <div class="news-header">
            <h1>NEWS AND EVENTS</h1>
        </div>
        <div class="container">
            <?php if($count_news!=0){ ?>
            <div class="row row-cols-lg-3 row-cols-sm-1">
                <?php while($row=$news_events->fetch_array()){ ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 p-2 pt-5">
                        <div class="card news-section shadow news-card h-100">
                            <div class="news-img" style="height: 25vh;">
                                <img style="width: 100%; height: 100%" src="Admin/files/news_img/<?php echo $row["news_img"] ?>">
                            </div>
                            <div class="card-body pb-4">
                                <p class="date-txt fw-light">
                                    <?php echo date("M j, Y", strtotime($row["news_date"]))?>
                                </p>
                                <h4 class="card-title fw-bold">
                                    <?php echo $row["news_title"] ?>
                                </h4>
                                <h4 class="lead fst-italic" style="font-size: 1rem;">
                                    <?php echo $row["news_subtitle"] ?>
                                </h4>
                                <div class="text-desc mb-5">
                                    <p class="card-text">
                                        <?php echo $row["news_description"] ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="User/news_and_events.php?item=<?php echo $row['news_id']?>">
                                        <button class="btn btn-primary" style="position: absolute; bottom: 15px;">
                                            See More
                                        </button>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
            <?php } else { ?>
            <div class="row mt-5 text-center">
                <h1>No News and Events Available</h1>
            </div>
            <?php }?>
            <div class="loadmore">
                <div class="box loadmorebtn">
                    <i class="fa fa-plus"></i>
                    <h2>LOAD MORE</h2>
                </div>

                <div class="box loadlessbtn">
                    <i class="fa fa-plus"></i>
                    <h2>LOAD LESS</h2>
                </div>`
            
            </div>
        </div>
    </section>

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
        <div class="contact-div2">
            <h1>WE'RE HERE</h1>
            <div class="content first">
                <div class="map-text">
                    <h2 class="title"> Main Site</h2>
                    <div class="container">
                        <img src="Assets/image/location-dot-solid.svg" alt="loc-icon">
                        <h2>ADDRESS</h2>
                        <p> 
                            Divine Life Memorial Park Brgy. Gulod 4024 Cabuyao, Laguna Philippines
                        </p>
                    </div>
                    <div class="container">
                        <img src="Assets/image/clock-solid.svg" alt="clock-icon">
                        <h2>OPEN HOURS</h2>
                        <p>8:00 AM - 5:00 PM</p>
                    </div>
                </div>
                <div class="map-img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d683.5756017754296!2d121.16375680627579!3d14.259779832677799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d8aebf42856b%3A0x674c6f6d3961adac!2sDivine%20Life%20Memorial%20Park!5e0!3m2!1sfil!2sph!4v1645258826002!5m2!1sfil!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="content second">
                <div class="map-img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d287.3841362068981!2d121.12316709448048!3d14.278593412900142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d9251f952dd1%3A0xb6153326caa17181!2sDivine%20Life%20Memorial%20Park%20Office!5e0!3m2!1sfil!2sph!4v1645280477530!5m2!1sfil!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="map-text">
                    <h2 class="title"> Main Office</h2>
                    <div class="container">
                        <img src="Assets/image/location-dot-solid.svg" alt="loc-icon">
                        <h2>ADDRESS</h2>
                        <p> 
                            238 JP Rizal St, Cabuyao, Laguna Philippines
                        </p>
                    </div>
                    <div class="container">
                        <img src="Assets/image/clock-solid.svg" alt="clock-icon">
                        <h2>OPEN HOURS</h2>
                        <p>8:00 AM - 5:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "113919594640619");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="Assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
