@extends('template.owner')
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
                <div class="ms-4" id="section-greeting">
                    <h4 style="white-space: pre-wrap" contenteditable="true">{{ $profile->profile_greeting }}</h4>
                    <form action="{{ url('owner/profile/greeting/update') }}" method="POST">
                        @method('POST')
                        @csrf
                        <textarea rows="4" name="greeting" id="input-greeting" class="d-none" style="white-space: pre-wrap"></textarea>
                        <a class="btn btn-theme rounded-pill d-none" id="submit-greeting"><i class="fa-solid fa-check"></i></button>
                        <a class="ms-2 btn btn-danger rounded-pill d-none" id="cancel-greeting"><i class="fa-solid fa-x"></i></a>
                    </form>
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
                <div class="py-5 sticky-top bg-theme">
                    <div class="pt-5">
                        <span>OVER 2 YEARS OF</span>
                        <h1 class="display-4 fw-bolder text-highlight text-heading">Experience</h1>
                        <a class="btn btn-theme rounded-pill" id="add-experience">add <i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
                <div class="row d-none pt-5 bg-theme" id="form-experience">
                    <form action="{{ url('owner/experience') }}" method="post" class="mt-5">
                        @method('POST')
                        @csrf
                        <label for="experience_headline">Headline:</label>
                        <input type="text" name="experience_headline" id="experience_headline" class="form-control mb-3" placeholder="Headline" required>
                        <label for="experience_company">Company:</label>
                        <input type="text" name="experience_company" id="experience_company" class="form-control mb-3" placeholder="Company" required>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="experience_start">Start:</label>
                                <input type="month" name="experience_start" id="experience_start" class="form-control mb-3" placeholder="Start" required>
                            </div>
                            <div class="col-md-6">
                                <label for="experience_end">End:</label>
                                <input type="month" name="experience_end" id="experience_end" class="form-control mb-3" placeholder="End" required>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="current-work-check">
                            <label class="form-check-label" for="current-work-check">
                                Currently work here
                            </label>
                        </div>
                        <label for="experience_description">Description:</label>
                        <textarea class="form-control mb-3" name="experience_description" id="experience_description" rows="4" placeholder="Description" required></textarea>
                        <button type="submit" class="btn btn-theme rounded-pill">save <i class="fa-solid fa-check"></i></button> <a class="btn btn-light rounded-pill" id="cancel-experience">cancel <i class="fa-solid fa-x"></i></a>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                @foreach ($experiences as $experience)
                <div class="experience-item py-4">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="experience-headline">{{ $experience->experience_headline }}</h2>
                        </div>
                        <div class="col-md-3 d-flex align-items-center text-end action-experience d-none">
                            <a href="{{ url('owner/experience/'.$experience->experience_id.'/edit') }}" class="btn btn-theme rounded-circle me-2"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ url('owner/experience/'.$experience->experience_id) }}" method="POST" onsubmit="return confirm('Do you really want to remove {{$experience->experience_headline}}?');">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger rounded-circle"><i class="fa-regular fa-trash-can"></i></button>
                            </form>
                        </div>
                    </div>
                    <span class="experience-company">{{ $experience->experience_company }}</span>
                    <?php
                    
                    $start = date_create($experience->experience_start);
                    $end = date_create($experience->experience_end);
                    
                    ?>
                    <br><span class="experience-start text-secondary">{{ date_format($start,"F Y") }}</span>
                    @if ($experience->experience_end != null)
                    <span class="experience-start text-secondary"> - {{ date_format($end,"F Y") }}</span>
                    @else
                    <span class="experience-start text-secondary"> - current</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="portfolio" class="py-5">
    <div class="container">
        <div class="row" id="portfolio-type">
            <div class="col-12 text-center">
                <span>AMAZING PROJECT IN PAST</span>
                <h1 class="display-4 text-highlight text-heading">What I have made</h1>
            </div>
            <div class="col-sm-6 col-md-4 offset-sm-3 offset-md-4 pt-5 text-center">
                @foreach ($types as $type)
                <div class="bg-theme border border-light rounded-pill mb-3 p-2 item-portfolio-type d-flex align-items-center">
                    <i class="{{ $type->type_icon }} me-2"></i> {{ $type->type_name }}
                    <div id="action-portfolio-type" class="d-none d-flex align-items-center text-end ms-auto">
                        <a href="{{ url('owner/portfolio-type/'.$type->type_id.'/edit') }}" class="btn btn-sm btn-theme rounded-pill me-2"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ url('owner/portfolio-type/'.$type->type_id) }}" method="post" id="" onsubmit="return confirm('Do you really want to remove {{$type->type_name}}? All the portfolio(s) related will also being removed');">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger rounded-pill"><i class="fa-regular fa-trash-can"></i></button>    
                        </form>
                    </div>
                </div>
                @endforeach
                <a class="btn btn-sm btn-outline-light px4 py-2 rounded-pill mb-3" id="add-portfolio-type">add <i class="fa-solid fa-plus"></i></a>
            </div>
            <div class="col-sm-6 col-md-4 offset-sm-3 offset-md-4 d-none" id="form-portfolio-type">
                <div class="col-12 text-center">
                    <h3 class="fw-bold">Add new type</h3>
                </div>
                <span>Preview: </span>
                <div class="p-2 border border-light rounded-pill mb-3 bg-light text-dark" id="preview-portfolio-type">
                    <i></i><span id="text" class="ms-2"></span>
                </div>
                <form action="{{ url('owner/portfolio-type') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="type_name">Type Name</label>
                        <input type="text" name="type_name" id="type_name" class="form-control" placeholder="type name" required>
                    </div>
                    <div class="mb-3">
                        <label for="type_icon">Icon class name from font awesome</label>
                        <input type="text" name="type_icon" id="type_icon" class="form-control" placeholder="type icon" required>
                    </div>
                    <div class="col-12 d-flex">
                        <a class="btn btn-light rounded-pill me-auto" id="cancel-portfolio-type">cancel <i class="fa-solid fa-x"></i></a><button type="submit" class="btn btn-theme rounded-pill">save <i class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($portfolios as $counter => $portfolio)
            @if ($counter % 2 == 0)
            <div class="col-lg-4 col-md-6">
                <div class="portfolio-item card rounded-0 p-0 mb-4">
                    <div class="card-header p-0 m-0">
                        <img src="{{ url('assets/portfolio/'.$portfolio->portfolio_image) }}" alt="" class="portfolio-thumbnail">
                    </div>
                    <div class="card-body p-4 m-0">
                        <div class="bg"></div>
                        <h2 class="fw-bolder text-highlight">{{ $portfolio->portfolio_headline }}</h2>
                        <span class="role">{{ $portfolio->portfolio_role }}</span><br>
                        <a href="{{ $portfolio->portfolio_link }}" class="btn btn-sm btn-outline-light mt-4 px-4 py-2 rounded-pill">LOOK UP <i class="ms-4 fa-solid fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-6">
                <div class="portfolio-item card rounded-0 p-0 mb-4">
                    <div class="card-body p-4 m-0">
                        <div class="bg"></div>
                        <h2 class="fw-bolder text-highlight">{{ $portfolio->portfolio_headline }}</h2>
                        <span class="role">{{ $portfolio->portfolio_role }}</span><br>
                        <a href="{{ $portfolio->portfolio_link }}" class="btn btn-sm btn-outline-light mt-4 px-4 py-2 rounded-pill">LOOK UP <i class="ms-4 fa-solid fa-arrow-up"></i></a>
                    </div>
                    <div class="card-header p-0 m-0">
                        <img src="{{ url('assets/portfolio/'.$portfolio->portfolio_image) }}" alt="" class="portfolio-thumbnail">
                    </div>
                </div>
            </div>
            @endif
            @endforeach
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
                <p class="mt-5">{{ $profile->profile_contact }}</p>
                <p>{{ $profile->profile_name }}<br>{{ $profile->profile_location }}</p>
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

@section('add-script')
<script>
    
    $('#section-greeting h4').on('focus', function(){
        $('#section-greeting a').removeClass('d-none');
    })

    $('#section-greeting #cancel-greeting').click(function(){
        $('#section-greeting a').addClass('d-none');
    })

    $('#section-greeting #submit-greeting').click(function(){
        $('#section-greeting #input-greeting').val($('#section-greeting h4').text())
        $('#section-greeting form').submit()
    })
    
    // experience
    $('#experience #add-experience').click(function(){
        $('#experience #add-experience').addClass('d-none');
        $('#experience #form-experience').removeClass('d-none');
        $('#experience #form-experience').addClass('sticky-top');
    })

    $('#experience #cancel-experience').click(function(){
        $('#experience #add-experience').removeClass('d-none');
        $('#experience #form-experience').addClass('d-none');
        $('#experience #form-experience').removeClass('sticky-top');
    })

    $('#experience .experience-item').hover(
        function(e){
            $(this).find('.action-experience').removeClass('d-none');
        },
        function(e){
            $(this).find('.action-experience').addClass('d-none');
        }
    )

    $('#current-work-check').change(function(){
    if(this.checked) {
        $('#experience_end').val('');
        $('#experience_end').attr('required',false);
        $('#experience_end').attr('disabled',true);
    } else {
        $('#experience_end').val('');
        $('#experience_end').attr('required',true);
        $('#experience_end').attr('disabled',false);
    }
    })

    // portfolio type
    $('#portfolio #add-portfolio-type').click(function(){
        $('#portfolio #add-portfolio-type').addClass('d-none');
        $('#portfolio #form-portfolio-type').removeClass('d-none');
    })

    $('#portfolio #cancel-portfolio-type').click(function(){
        $('#portfolio #add-portfolio-type').removeClass('d-none');
        $('#portfolio #form-portfolio-type').addClass('d-none');
    })

    $('#portfolio-type .item-portfolio-type').hover(
        function(e){
            $(this).find('#action-portfolio-type').removeClass('d-none');
        },
        function(e){
            $(this).find('#action-portfolio-type').addClass('d-none');
        }
    )

    $('#portfolio-type #type_name').on('keyup',function(e){
        $('#portfolio-type #preview-portfolio-type #text').html($(this).val())
    })

    $('#portfolio-type #type_icon').on('keyup',function(e){
        $('#portfolio-type #preview-portfolio-type i').attr('class',$(this).val())
    })
</script>
@endsection