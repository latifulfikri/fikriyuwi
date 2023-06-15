<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fikriyuwi</title>
        
        <meta property="og:image" content="{{'img/logo/thumbnail.png'}}" />
        <meta name="keywords" content="fikri,fikriyuwi,junior uiux design"/>
        <meta name="author" content="fikriyuwi" />
        <meta name="title" content="fikriyuwi - UI/UX Designer" />
        <meta name="description" content="Hi, I'm Fikri. I love to design and make a great website. I speak Tech, UI/UX, Web Development, and Mobile App Development.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#292D32">
        
        <meta name="google-site-verification" content="FAEHfs6cWN__xNW-AHM51CxaWzWxY29qcUAH9MddZi4" />
        
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('img/icon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('img/icon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('img/icon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{url('img/icon/site.webmanifest')}}">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <style>
            :root {
                --app-height: -webkit-fill-available;
                --color-theme-bg: #19222D;
                --color-theme-text-highlight: #C7F011;
                --color-theme-text-highlight-hover: #E5F0B4;
                --color-theme-text: #ffffff;
                --color-theme-text-secondary: #ffffffb3;
                --color-theme-text-transparent: rgba(255,255,255,.3);
            }

            .fw-600 {
                font-weight: 600;
            }

            * {
                font-family: 'Comfortaa','Poppins', cursive, sans-serif;
            }

            .bg-theme {
                background-color: var(--color-theme-bg) !important;
                color: var(--color-theme-text) !important;
            }

            .bg-highlight {
                background-color: var(--color-theme-text-highlight) !important;
                color: var(--color-theme-bg) !important;
            }

            .text-heading {
                font-family: 'Krona One', sans-serif;
            }

            .text-highlight {
                color: var(--color-theme-text-highlight);
            }

            .bg-highlight .text-highlight {
                color: var(--color-theme-bg);
            }

            .btn-sm {
                --bs-btn-padding-y: .25rem;
                --bs-btn-padding-x: .5rem;
                --bs-btn-font-size: .75rem;
            }

            .btn-theme {
                background-color: var(--color-theme-text-highlight);
                color: var(--color-theme-bg);
                transition: 1s;
            }

            .btn-theme:hover {
                transition: 1s;
                background-color: var(--color-theme-text-highlight-hover);
                color: var(--color-theme-bg);
                font-weight: bolder;
            }

            .btn-outline-theme {
                border: 2px solid var(--color-theme-text-highlight);
                color: var(--color-theme-text-highlight);
                transition: 1s;
            }

            .btn-outline-theme:hover {
                border: 2px solid var(--color-theme-text-highlight-hover);
                color: var(--color-theme-text-highlight-hover);
                transition: 1s;
            }

            .nav-link {
                color: var(--color-theme-text) !important;
            }

            .link {
                transition: 1s;
            }

            .link-theme {
                color: var(--color-theme-text-highlight);
                transition: 1s;
            }

            .link-theme:hover {
                color: var(--color-theme-text-highlight-hover);
            }

            .navbar-brand {
                color: var(--color-theme-text-highlight);
            }


            /* navbar */
            nav .navbar-brand img {
                height: 2rem;
                filter: invert(1);
                margin-right: 0.5rem;
            }

            /* HEADER */
            .vh-100 {
                min-height: var(--app-height);
            }

            .ava-header {
                height: 4rem;
            }

            /* experience */
            .experience-item {
                border-bottom: 2px solid var(--color-theme-text-transparent);
            }
            .experience-title {
                color: var(--color-theme-text-highlight);
                padding: 0px !important;
            }
            .experience-company {
                padding: 0px !important;
            }

            /* portofolio */
            .card {
                background-color: var(--color-theme-bg);
                border: 2px solid var(--color-theme-text-transparent);
            }

            .portfolio-thumbnail {
                width: 100%;
            }

            .portfolio-item:hover {
                
            }

            .portfolio-item .card-body{
                position: relative;
            }

            .portfolio-item .card-body .bg {
                position: absolute;
                z-index: 0;
                top: 0;
                left: 0;
                right: 0;
                background-color: var(--color-theme-text-highlight);
                height: 0%;
                width: 100%;
            }

            .portfolio-item .card-body h2, .portfolio-item .card-body span, .portfolio-item .card-body a , .portfolio-item .card-body .d-flex{
                z-index: 4;
                position: relative;
                transition: 1s;
            }

            .portfolio-item .card-body a i {
                transform: rotate(45deg);
            }

            /* .portfolio-item {
                margin-top:0rem;
                margin-bottom: 0rem !important;
                transition: 1s;
            }

            .portfolio-item:hover {
                margin-top:-2rem;
                margin-bottom:2rem !important;
                transition: 1s;
            } */

            #form-portfolio img {
                width: 100%;
            }

            .portfolio-item-section.show {
                display: block;
                transition: .5s;
            }

            .portfolio-item-section {
                display: none;
                transition: .5s;
            }

            /* slider */
            .slider {
                margin:auto;
                width:auto;
                overflow: hidden;
                position: relative;
                height: 5rem;
            }

            .slider .slide-track {
                display: flex;
                width: calc(var(--skill-length) * 10rem);
                position: relative;
            }

            .slider .slide-track .slide {
                display: flex;
                animation: scroll-right 16s linear infinite;
            }

            .slider .slide-track .slide img {
                height: 5rem;
                width: 5rem;
                object-fit:contain;
                margin-right: 5rem;
            }

            @keyframes scroll-right {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(calc(var(--skill-length) * -10rem));
                }
            }

            .lh-7 {
                line-height: 7rem;
            }

            .animated-scroll-down-text {
                height: 7rem;
                overflow: hidden;
            }

            .animated-scroll-down-text .line {
                line-height: 7rem;
            }

            .animated-scroll-down-text .line:first-child {
                animation: scroll-down 9s infinite;
            }

            @keyframes scroll-down {
                0% {
                    margin-top: 0;
                }
                33% {
                    margin-top: -7rem;
                }
                66% {
                    margin-top: -14rem;
                }
            }

            /* input */
            .form-control , .form-select {
                background-color: var(--color-theme-bg);
                color: var(--color-theme-text);
                border-radius: 0;
                color-scheme: dark;
            }

            .form-control::placeholder , .form-select::placeholder {
                color: var(--color-theme-text-secondary);
            }

            .form-control:focus , .form-select:focus{
                background-color: var(--color-theme-bg);
                color: var(--color-theme-text);
                border: 1px solid var(--color-theme-text-highlight);
                box-shadow: 0 0 10px solid var(--color-theme-text-highlight-hover);
            }

            .form-control:disabled {
                background-color: #000000;
                color: var(--color-theme-text-secondary);
                border: 1px solid #000000;
            }


            /* animation */
            #form-experience {
                transition: 1s;
            }
        </style>