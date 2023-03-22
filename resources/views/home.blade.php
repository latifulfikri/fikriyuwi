@extends('template.raw')
@section('main-content')
<section id="header" class="py-5 d-flex align-items-center">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bolder text-heading">LOVE TO HELP <span class="text-highlight text-heading">SOCIETY</span> WITH <span class="text-highlight text-heading">TECHNOLOGY</span></h1>
            </div>
        </div>
        <div class="row mt-5 pt-0 pt-md-5">
            <div class="col-md-6 d-flex">
                <img src="{{ url('assets/img/ava.jpeg') }}" alt="" class="ava-header rounded-circle">
                <div class="ms-4">
                    <h4>Hi! I'm Fikri</h4>
                    <h4>One of the computer student warior</h4>
                </div>
            </div>
            <div class="col-md-6 text-start text-md-end pt-5 pt-md-0">
                <a href="#reachme" class="btn btn-theme rounded-5 py-2 px-4">REACH ME <i class="ms-3 fa-solid fa-chevron-down"></i></a>
            </div>
        </div>
    </div>
</section>
<section id="headline" class="">
    <div class="container-fluid px-0">
        <div class="row p-0 m-0">
            <div class="col-md-5 text-center text-md-end px-5 bg-light">
                <h2 class="display-6 fw-bolder lh-7 m-0 text-dark">I am a </h2>
            </div>
            <div class="col-md-7 text-center text-md-start animated-scroll-down-text px-5  bg-highlight">
                <div class="fw-bolder display-6 display-md-5 line">
                    UIUX Designer
                </div>
                <div class="fw-bolder display-6 display-md-5 line">
                    Website Dev
                </div>
                <div class="fw-bolder display-6 display-md-5 line">
                    Mobile Apps Dev
                </div>
            </div>
        </div>
    </div>
</section>
<section id="experience">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="py-5 sticky-top">
                    <div class="py-5">
                        <span>OVER 2 YEARS OF</span>
                        <h1 class="display-4 fw-bolder text-highlight text-heading">Experience</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="experience-item py-4">
                    <h2 class="experience-title">Founder of <a href="https://srgepp.fikriyuwi.com" target="_blank" class="link link-theme">Srgepp</a></h2>
                    <span class="experience-company">Bina Nusantara Computer Club</span>
                </div>
                <div class="experience-item py-4">
                    <h2 class="experience-title">UI/UX LnT Trainer</h2>
                    <span class="experience-company">Bina Nusantara Computer Club</span>
                </div>
                <div class="experience-item py-4">
                    <h2 class="experience-title">Marketing Team</h2>
                    <span class="experience-company">Bina Nusantara Group</span>
                </div>
                <div class="experience-item py-4">
                    <h2 class="experience-title">Marketing Designer Team</h2>
                    <span class="experience-company">Bina Nusantara Group</span>
                </div>
                <div class="experience-item py-4">
                    <h2 class="experience-title">Mobile Application Developer</h2>
                    <span class="experience-company">PT. Swamedia Informatika</span>
                </div>
                <div class="experience-item py-4">
                    <h2 class="experience-title">Graphic Designer</h2>
                    <span class="experience-company">Onlenkan.com</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="portfolio" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <span>AMAZING PROJECT IN PAST</span>
                <h1 class="display-4 text-highlight text-heading">What I have made</h1>
            </div>
            <div class="col-12 pt-5 text-center">
                <a href="" class="btn btn-sm btn-outline-light px-4 py-2 rounded-pill mb-3 me-3"><i class="fa-solid fa-display"></i> Website</a>
                <a href="" class="btn btn-sm btn-outline-light px-4 py-2 rounded-pill mb-3 me-3"><i class="fa-solid fa-mobile-screen-button"></i> Mobile</a>
                <a href="" class="btn btn-sm btn-outline-light px-4 py-2 rounded-pill mb-3"><i class="fa-regular fa-object-ungroup"></i> UI/UX</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 col-md-6">
                <div class="portfolio-item card rounded-0 p-0 mb-4">
                    <div class="card-header p-0 m-0">
                        <img src="{{ url('assets/portfolio/srgepp.png') }}" alt="" class="portfolio-thumbnail">
                    </div>
                    <div class="card-body p-4 m-0">
                        <div class="bg"></div>
                        <h2 class="fw-bolder text-highlight">Srgepp</h2>
                        <span class="role">Full Stack Developer</span><br>
                        <a href="" class="btn btn-sm btn-outline-light mt-4 px-4 py-2 rounded-pill">LOOK UP <i class="ms-4 fa-solid fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="portfolio-item card rounded-0 p-0 mb-4">
                    <div class="card-body p-4 m-0">
                        <div class="bg"></div>
                        <h2 class="fw-bolder text-highlight">Binusmaya</h2>
                        <span class="role">UI/UX Designer</span><br>
                        <a href="" class="btn btn-sm btn-outline-light mt-4 px-4 py-2 rounded-pill">LOOK UP <i class="ms-4 fa-solid fa-arrow-up"></i></a>
                    </div>
                    <div class="card-header p-0 m-0">
                        <img src="{{ url('assets/portfolio/binusmaya.png') }}" alt="" class="portfolio-thumbnail">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="portfolio-item card rounded-0 p-0 mb-4">
                    <div class="card-header p-0 m-0">
                        <img src="{{ url('assets/portfolio/village-hub.png') }}" alt="" class="portfolio-thumbnail">
                    </div>
                    <div class="card-body p-4 m-0">
                        <div class="bg"></div>
                        <h2 class="fw-bolder text-highlight">Village Hub</h2>
                        <span class="role">Full Stack Developer</span><br>
                        <a href="" class="btn btn-sm btn-outline-light mt-4 px-4 py-2 rounded-pill">LOOK UP <i class="ms-4 fa-solid fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="skill" class="bg-highlight">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 my-auto">
                <div class="sticky-top">
                    <div class="py-5">
                        <span class="fw-bolder">ALL I'M IN LOVE WITH</span>
                        <h1 class="display-4 fw-bolder text-highlight text-heading">Skill</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5">
                <div class="slider">
                    <div class="slide-track">
                        <div class="slide">
                            <img src="{{ url('assets/img/skill/figma.png') }}" alt="Figma Icon">
                            <img src="{{ url('assets/img/skill/swift.png') }}" alt="Swift Icon">
                            <img src="{{ url('assets/img/skill/laravel.png') }}" alt="Laravel Icon">
                            <img src="{{ url('assets/img/skill/flutter.png') }}" alt="Flutter Icon">
                            <img src="{{ url('assets/img/skill/node.png') }}" alt="NodeJS Icon">
                            <img src="{{ url('assets/img/skill/blender.png') }}" alt="Blender Icon">
                            <img src="{{ url('assets/img/skill/illustrator.png') }}" alt="Adobe Illustrator Icon">
                        </div>
                        <div class="slide">
                            <img src="{{ url('assets/img/skill/figma.png') }}" alt="Figma Icon">
                            <img src="{{ url('assets/img/skill/swift.png') }}" alt="Swift Icon">
                            <img src="{{ url('assets/img/skill/laravel.png') }}" alt="Laravel Icon">
                            <img src="{{ url('assets/img/skill/flutter.png') }}" alt="Flutter Icon">
                            <img src="{{ url('assets/img/skill/node.png') }}" alt="NodeJS Icon">
                            <img src="{{ url('assets/img/skill/blender.png') }}" alt="Blender Icon">
                            <img src="{{ url('assets/img/skill/illustrator.png') }}" alt="Adobe Illustrator Icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="reachme">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 py-5 text-center">
                <a href="" class="link link-theme"><h1 class="display-3 fw-bolder text-heading">Reach Me!</h1></a>
                <p class="mt-5">I love to design and make a great website. I speak Tech, UI/UX, Web Development, and Mobile App Development.</p>
                <p>Fikriyuwi<br>Malang, Indonesia</p>
                <div class="row">
                    <div class="col-12 text-center pt-5">
                        <a href="https://www.linkedin.com/in/latifulfikri" target="_blank" class="link link-theme me-3 me-md-5"><i class="fw-bolder display-6 fa-brands fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/vikriyuwi/" target="_blank" class="link link-theme me-3 me-md-5"><i class="fw-bolder display-6 fa-brands fa-instagram"></i></a>
                        <a href="https://dribbble.com/latifulfikri" target="_blank" class="link link-theme me-3 me-md-5"><i class="fw-bolder display-6 fa-brands fa-dribbble"></i></a>
                        <a href="mailto:hallo@fikriyuwi.com" target="_blank" class="link link-theme"><i class="fw-bolder display-6 fa-regular fa-envelope-open"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection