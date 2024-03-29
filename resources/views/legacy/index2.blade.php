<!doctype html>
<html lang="en-US">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css" type="text/css" />

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <title>The Seo Company Free Html Template</title>

    <style>
                /*///////////////////////////////////////////////////////////////////////////////////

            Theme Name: Seo Company
            Description: The Seo Company v1.0
            Author: Diego Velázquez Rabasa - Templune
            Author Personal Website: http://templune.com
            Author Behance Profile: https://www.behance.net/diegovr7
            Author Dribbble Profile: https://dribbble.com/diegovr7
            Author Envato Profile: https://themeforest.net/user/diegovr7
            Version: 1.0

            External Resources:
            Bootstrap 4
            Google Fonts 
            Ionic Icons

            *This Html Theme is royalty free for use in personal and commercial projects with 
            a couple of restrictions.

            Publications
            You are welcome to republish this Html Theme on condition that you link back to
            https://www.behance.net/gallery/67279127/The-Seo-Company-Free-PSD-Template 
            and you should not provide the assets for direct download from your website.

            Prohibitions
            You do not have rights to redistribute, resell, lease, license, sub-license or offer
            this resource to any third party «as is». If you want to use this resource as a part
            of a product intended to be sold via any marketplace, please contact the author 
            templune@gmail.com of the freebie to get an extended license.

        /////////////////////////////////////////////////////////////////////////////////*/

        /* /////////////////////////////

            1. Basic Styles
            2. Navbar
            3. Buttons
            4. Hero
            5. Marketing
            6. Testimonials
            7. Pricing
            8. Call to Action
            9. Footer
            10. Media Queries

        //////////////////////////*/


        body {
            font-family: 'Roboto', sans-serif;
            color: #3a3f52;
        }

        h2 {
            font-size: 44px;
            font-weight: 700;
        }

        h3 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 25px;
        }

        h5 {
            font-size: 16px;
        }

        p {
            font-size: 14px;
            font-weight: 400;
            letter-spacing: .05em;
            color: #53627C;
        }

        ul {
            list-style-type: none;
            padding-left: 0px;
        }

        b {
            font-weight: 700;
        }

        section {
            padding: 100px 0px;
        }

        .title-block {
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            text-align: center;
        }

        .title-block p {
            font-size: 20px;
            font-weight: 300;
            color: #8da2b5;
            margin-bottom: 0px;
        }

        .divider {
            padding: 2rem 0 0;
            margin: 2rem 0 0;
            border-top: 1px solid #3c3f45;
        }

        .divider-light {
            padding: 2rem 0 0;
            margin: 2rem 0 0;
            border-top: 1px solid #edf1f2
        }

        /* ==============================================
        2. Navbar 
        ===============================================*/

        .custom-navbar {
            background-color: #ffffff!important;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,.09);
            height: 70px;
            max-height: 70px;
        }

        .navbar-toggler {
            font-size: 38px;
            background-color: transparent;
        }

        .navbar-toggler:focus {
            text-decoration: none;
            outline: none;
        }

        .navbar-toggler-icon {
            color: #ffffff;
        }

        .navbar-collapse {
            background-color: #ffffff;
        }

        .nav-custom-link {
            font-size: 12px;
            font-weight: 400;
            letter-spacing: .05em;
            margin-top: 5px;
        }

        .navbar a {
            color: #53627C !important;
        }

        .nav-right {
            float: right;
        }

        /* ==============================================
        3. Buttons
        ===============================================*/

        .btn {
            font-size: 14px;
            font-weight: 400;
            border-radius: 3px!important;
            box-shadow: 0 2px 3px 0 rgba(0,0,0,.05), 0 1px 2px 0 rgba(0,0,0,.08);
        }

        .btn:hover {
            text-decoration: none;
        }

        .btn-regular {
            background-color: #0095f7;
            color: #ffffff;
            padding: 10px 25px;
            letter-spacing: .1em;
            margin-top: 25px;
            display: inline-block;
        }

        .btn-regular:hover {
            background-color: #0191f0;
            color: #ffffff;
        }

        .btn-demo {
            color: #ffffff;
            background-color: #6772e5;
            letter-spacing: .1em;
            padding: 15px 48px;
            display: inline-block;
            width: 100%;
            margin-top: 20px;
        }

        .btn-demo:hover {
            color: #ffffff;
            background-color: #636ee1;
        }

        .btn-demo-small {
            font-size: 12px;
            background-color: #6772e5;
            padding: 1px 4px;
        }

        .btn-demo-small:hover {
            background-color: #636ee1;
        }

        .btn-demo-small a {
            color: #ffffff!important;
        }

        .btn-buy {
            color: #ffffff;
            background-color: #0095f7;
            letter-spacing: .1em;
            padding: 15px 48px;
            display: inline-block;
            width: 100%;
            margin-top: 20px;
        }

        .btn-buy:hover {
            background-color: #0191f0;
            color: #ffffff;
        }

        /* ==============================================
        4. Hero
        ===============================================*/

        #hero {
            background-color: #f6f8f9;
        }

        #hero h1 {
            font-size: 50px;
            font-weight: 300;
        }

        #hero p {
            font-size: 24px;
            font-weight: 300;
            color: #8da2b5;
            margin-bottom: 0px;
            padding: 0px;
        }

        #hero span {
            font-weight: 400;
            color: #0095f7;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        /* ==============================================
        5. Marketing
        ===============================================*/

        #marketing p {
            font-size: 20px;
            font-weight: 300;
            color: #8da2b5;
            margin-bottom: 0px;
            padding: 0px;
        }

        #marketing span {
            font-weight: 400;
            color: #0095f7;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .content-box {
            padding: 60px 20px;
        }

        /* ==============================================
        6. Testimonials
        ===============================================*/

        #testimonials {
            background-color: #f6f8f9;
            border-top: 1px solid #F8F9FB;
            border-bottom: 1px solid #F8F9FB;
        }

        .testimonial-box {
            background-color: #ffffff;
            box-shadow: 0 0 1px 0 rgba(0,12,32,0.04), 0 10px 16px 0 rgba(10,31,68,0.06);
            border-radius: 20px;
            padding: 20px 30px;
            margin-top: 30px;
        }

        .testimonial-box h6 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: .05em;
            margin-top: 5px;
            margin-bottom: 0px;
        }

        .testimonial-box p {
            font-size: 16px;
            font-weight: 300;
            margin-top: 25px;
            line-height: 1.8;
            padding: 0px;
        }

        .testimonial-box i {
            color: #ffffff;
        }

        .testimonial-box small {
            color: #8da2b5;
            display: inline-block;
        }

        .testimonial-box span {
            font-size: 14px;
            color: #ffffff;
        }

        .rating {
            background-color: #0095f7;
            padding: 2px 12px;
            border-radius: 50px;
        }

        .profile-picture {
        display: inline-block;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        }

        .review-one {
          background-image: url('{{ asset('images/static/profile-picture-one.jpg') }}');
        }

        .personal-info {
            padding: 5px 0 20px 0;
            border-bottom: 1px solid #edf1f2;
        }

        /* ==============================================
        7. Pricing
        ===============================================*/

        .pricing-box {
            background-color: #ffffff;
            padding: 40px 20px;
            border: 1px solid #F8F9FB;
            border-radius: 6px;
            box-shadow: 0 0 1px 0 rgba(0,12,32,0.04), 0 10px 16px 0 rgba(10,31,68,0.06);
            margin-top: 30px;
        }

        .pricing-box h3 {
            font-size: 22px;
            font-weight: 300;
            letter-spacing: .1em;
            color: #0095f7;
        }

        .pricing-box h6 {
            font-size: 60px;
            font-weight: 700;
            color: #3a3f52;
            margin-bottom: 0px;
        }

        .pricing-box p {
            font-size: 17px;
            margin-top: 15px;
            padding: 0px;
        }

        .pricing-box ul {
            padding-left: 10px;
        }

        .pricing-box li {
            font-size: 14px;
            font-weight: 300;
            color: #8da2b5;
            letter-spacing: .1em;
        }

        .pricing-box span {
            font-weight: 500;
            color: #0095f7;
        }

        .pricing-box small {
            color: #8da2b5;
            letter-spacing: .2em;
        }

        .pricing-box i {
            font-size: 20px;
            color: #0095f7;
            margin-right: 10px;
        }

        .pricing-box .demo {
            color: #6772e5!important;
        }

        /* ==============================================
        8. Call to Action
        ===============================================*/

        #call-to-action {
            background-image: url('{{ asset('images/static/call-to-action.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
        }

        #call-to-action h2 {
            color: #ffffff;
        }

        #call-to-action p {
            font-size: 20px;
            font-weight: 300;
            color: #ffffff;
            opacity: .8;
            margin-bottom: 40px;
        }

        #call-to-action .title-block {
            margin-bottom: 0px;
        }

        #call-to-action .btn-regular {
            background-color: #ffffff!important;
            color: #0095f7!important;
            padding: 15px 45px;
        }

        #call-to-action .title-block {
            margin-bottom: 0px;
        }

        /* ==============================================
        9. Footer
        ===============================================*/

        footer {
            background-color: #292c31;
            padding: 60px 0;
            color: #62656a;
        }

        footer h5 {
            color: #aeb3bd;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-bottom: 20px;
        }

        footer p {
            font-size: 12px;
            font-weight: 300;
            color: #62656a;
            text-align: justify;
            padding: 0px;
        }

        footer li {
            font-size: 14px;
            font-weight: 300;
            letter-spacing: .05em;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        footer a {
            color: #62656a;
        }

        footer a:hover {
            color: #0095f7;
            text-decoration: none;
        }

        footer i {
            font-size: 25px;
            color: #62656a;
            margin-right: 10px;
        }

        footer i:hover {
            color: #0095f7;
        }

        footer small {
            color: #62656a;
            float: right;
        }

        .external-links {
            color: #0095f7;
        }

        /* ==============================================
        9. Media Queries
        ===============================================*/

        /* Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 575.98px) { 
            h2 {
                font-size: 34px!important;
                margin-bottom: 20px;
                line-height: 1.6;
            }
            .title-block h2, p {
                text-align: left;
                padding: 0px 20px;
            }

            #call-to-action h2, p {
                text-align: left!important;
                padding: 0 20px;
            }

            #call-to-action {
                background-image: none;
                background-color: #0095f7;
            }

            footer {
                padding: 60px 25px;
            }
            footer h5 {
                font-size: 18px;
                margin-top: 30px;
            }
            footer li {
                font-size: 16px;
                margin-bottom: 15px;
            }
            footer p {
                font-size: 16px;
            }
            footer i {
                font-size: 30px;
                margin-right: 20px;
            }
            footer small {
                float: left;
                margin-top: 20px;
            }
        }

        @media (max-width: 768px) { 
            #hero h1 {
                font-size: 34px!important;
                margin-bottom: 20px;
            }
            #hero p {
                font-size: 20px!important;
            }
        }

        @media (max-width: 991px) { 
            .nav-right {
                float: left;
            }
            .nav-custom-link {
                border-bottom: 1px solid #EEE;
            }
            .navbar-nav{
                width: 100%;
            }
            .navbar-nav .nav-link {
                padding: 20px 0;
                text-align: left;
            }

            .btn-demo-small {
                background-color: #ffffff;
                border: 0px;
                padding: 0px;
                box-shadow: none;

            }
            .btn-demo-small:hover {
                background-color: #ffffff;
                border: 0px;
                padding: 0px;
                box-shadow: none;

            }
            .btn-demo-small a {
                color: #53627C!important;
            }
            .nav-custom-link {
                font-size: 13px;
            }

            .icon-mobile {
                font-size: 18px;
                float: right;
            }

            .navbar-collapse {
                border-bottom: 1px solid #efefef;
            }

            .nav-logo-mobile {
                margin: auto;
                padding-right: 50px;
            }

            .nav-logo-desktop {
                display: none;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) { 
            .icon-mobile {
                display: none;
            }
            .nav-logo-mobile {
                display: none;
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) { 
            .hero-content {
                margin-top: 100px;
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) and (max-width: 991.98px) { 
            .pricing-box h3 {
                font-size: 17px;
            }
            .pricing-box p {
                font-size: 14px;
            }
            .pricing-box li {
                font-size: 12px;
            }
            .btn-buy {
                font-size: 12px;
                padding: 15px 20px;
            }
            .btn-demo {
                font-size: 12px;
                padding: 15px 20px;
            }
            .profile-picture {
                width: 50px;
                height: 50px;
            }
            .testimonial-box h6 {
                font-size: 14px;
                margin-left: 10px;
            }
            .testimonial-box span {
                font-size: 12px;
            }
            .testimonial-box small {
                font-size: 12px;
                margin-top: 4px;
                margin-left: 10px;
            }
        }
    </style>
  </head>

  <body>

  <!-- N A V B A R -->
  <nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon ion-md-menu"></span>
    </button>
    <img src="{{ asset('images/static/logo.png') }}" class="img-fluid nav-logo-mobile" alt="Company Logo">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="container">
      	<img src="{{ asset('images/static/logo.png') }}" class="img-fluid nav-logo-desktop" alt="Company Logo">
        <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="/">Home <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="#marketing">Features <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="#testimonials">Testimonials <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="#pricing">Pricing <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link btn btn-demo-small">
            <a class="nav-link" href="#">Try for Free <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- E N D  N A V B A R -->
  
  <!-- H E R O -->
  <section id="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
          <img src="{{ asset('images/static/iphone.png') }}" class="img-fluid" alt="Demo image">
        </div>
        <div class="col-md-7 content-box hero-content">
          <span>Unlimited Data</span>
          <h1>Digital Innovation and the <b>Future of Digital Marketing</b></h1>
          <p>Boost your digital marketing campaigns and increase your conversion rates</p>
          <a href="#" class="btn btn-regular">Learn more</a>
        </div>
      </div>
    </div>
  </section>
  <!-- E N D  H E R O -->

  <!-- E N D  M A R K E T I N G -->
  <section id="marketing">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="content-box">
            <span>Organic Search Report</span>
            <h2>Search Insights</h2>
            <p>Grow your search traffic, research your competitors keywords and monitor your ranking in real time.</p>
            <a href="#" class="btn btn-regular">Start Free Trial</a>
          </div>
        </div>
        <div class="col-md-7">
            <img src="{{ asset('images/static/demo-image.png') }}" class="img-fluid" alt="Demo image">
        </div>
      </div>
    </div>
  </section>
  <!-- E N D  M A R K E T I N G -->

  <!-- T E S T I M O N I A L S -->
  <section id="testimonials">
    <div class="container">
      <div class="title-block">
        <h2>The Best Digital Agencies Recommend Our Software</h2>
        <p>Industry experts mention their experience using our software and the excellent results they have achieved</p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="testimonial-box">
            <div class="row personal-info">
              <div class="col-md-2 col-xs-2">
                <div class="profile-picture review-one"></div>
              </div>
              <div class="col-md-10 col-xs-10">
                <h6>Joshua M. Salas <span class="rating">5 <i class="icon ion-md-star"></i></span></h6>
                <small>Marketing Intelligence | Author & Content Creator</small>
              </div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque, tortor nec mattis feugiat, velit purus euismod odio, quis vulputate velit urna sit amet enim. Maecenas vulputate auctor ligula sed sollicitudin.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="testimonial-box">
            <div class="row personal-info">
              <div class="col-md-2 col-xs-2">
                <div class="profile-picture review-one"></div>
              </div>
              <div class="col-md-10 col-xs-10">
                <h6>Michael Edwards <span class="rating">5 <i class="icon ion-md-star"></i></span></h6>
                <small>Seo Consultant | Author & Content Creator</small>
              </div>
            </div>
            <p>In euismod, metus ac elementum tincidunt, dui eros ullamcorper lorem, at euismod augue augue quis leo. Fusce non dui augue. In hac habitasse platea dictumst. Mauris quis lacinia mauris. Proin ut pretium quam. Nam at ex finibus.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- E N D  T E S T I M O N I A L S -->

  <!-- P R I C I N G -->
  <section id="pricing">
    <div class="container">
      <div class="title-block">
        <h2>Plans and Pricing</h2>
        <p>The best software to develop perfect content and advertising strategies to increase leads and sales.</p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="pricing-box">
            <h3 class="demo">Demo Version</h3>
            <h6>Free</h6>
            <small>forever</small>
            <p>Demo gives you full access to all features for 7 days</p>
            <div class="divider-light"></div>
            <ul>
              <li><i class="icon ion-md-checkmark-circle-outline demo"></i>Marketing plan</li>
              <li><i class="icon ion-md-checkmark-circle-outline demo"></i>Seo reporting tool</li>
              <li><i class="icon ion-md-checkmark-circle-outline demo"></i>Keywords explorer</li>
              <li><i class="icon ion-md-checkmark-circle-outline demo"></i>Competitive analysis</li>
              <li><i class="icon ion-md-checkmark-circle-outline demo"></i>Five projects - <span class="demo">¡New!</span></li>
            </ul>
            <div class="text-center">
              <a href="#" class="btn btn-demo">Demo version</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="pricing-box">
            <h3>Standard Version</h3>
            <h6>$47</h6>
            <small>per month</small>
            <p>Outrank your competitors with this amazing software</p>
            <div class="divider-light"></div>
            <ul>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Marketing plan</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Seo reporting tool</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Keywords explorer</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Competitive analysis</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Unlimited projects - <span>¡New!</span></li>
            </ul>
            <div class="text-center">
              <a href="#" class="btn btn-buy">Buy now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="pricing-box">
            <h3>Agency Version</h3>
            <h6>$197</h6>
            <small>per month</small>
            <p>For agencies and businesses with extensive web presence</p>
            <div class="divider-light"></div>
            <ul>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Marketing plan</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Seo reporting tool</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Keywords explorer</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Competitive analysis</li>
              <li><i class="icon ion-md-checkmark-circle-outline"></i>Unlimited projects - <span>¡New!</span></li>
            </ul>
            <div class="text-center">
              <a href="#" class="btn btn-buy">Buy now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- E N D  P R I C I N G -->

  <!-- C A L L  T O  A C T I O N -->
  <section id="call-to-action">
    <div class="container text-center">
      <h2>Increase your conversion rates now</h2>
      <div class="title-block">
        <p>Learn how to increase both your online and offline conversion rates and boost your sales and profits.</p>
        <a href="#" class="btn btn-regular">Get Started</a>
      </div>
    </div>
  </section>
  <!-- E N D  C A L L  T O  A C T I O N -->

  <!--  F O O T E R  -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>Seo Ranking</h5>
          <ul>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Affiliate Program</a></li>
            <li><a href="#">Developer API</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">Video Tutorials</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Main Tools</h5>
          <ul>
            <li><a href="#">Rank Tracker</a></li>
            <li><a href="#">Backlink Checker</a></li>
            <li><a href="#">Keyword Generator</a></li>
            <li><a href="#">Serp Checker</a></li>
            <li><a href="#">Site Audit</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Blog</h5>
          <ul>
            <li><a href="#">Get High Quality Backlinks</a></li>
            <li><a href="#">Top Google Searches</a></li>
            <li><a href="#">Avoid Google Penalties</a></li>
            <li><a href="#">White Hat SEO Tips</a></li>
            <li><a href="#">Google Trends</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Company</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque, tortor nec mattis feugiat, velit purus euismod odio, quis vulputate velit urna.</p>
          <p><a href="mailto:sales@theseocompany.com" class="external-links">sales@theseocompany.com</a></p>
        </div>
      </div> 
      <div class="divider"></div>
      <div class="row">
        <div class="col-md-6 col-xs-12">
            <a href="#"><i class="icon ion-logo-facebook"></i></a>
            <a href="#"><i class="icon ion-logo-instagram"></i></a>
            <a href="#"><i class="icon ion-logo-twitter"></i></a>
            <a href="#"><i class="icon ion-logo-youtube"></i></a>
          </div>
          <div class="col-md-6 col-xs-12">
            <small>2018 &copy; All rights reserved. Made by <a href="http://templune.com/" target="blank" class="external-links">Templune</a></small>
          </div>
      </div>
    </div>
  </footer>
  <!--  E N D  F O O T E R  -->
    

    <!-- External JavaScripts -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>