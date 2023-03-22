@extends('template.owner')
@section('main-content')
<section id="header" class="py-5 d-flex align-items-center">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ url('owner/experience/'.$experience->experience_id) }}" method="post" class="mt-5">
                    @method('PUT')
                    @csrf
                    <label for="experience_headline">Headline:</label>
                    <input type="text" name="experience_headline" id="experience_headline" class="form-control mb-3" placeholder="Headline" value="{{ $experience->experience_headline }}">
                    <label for="experience_company">Company:</label>
                    <input type="text" name="experience_company" id="experience_company" class="form-control mb-3" placeholder="Company" value="{{ $experience->experience_company }}">
                    <?php
                    
                    $start = date_create($experience->experience_start);
                    $end = date_create($experience->experience_end);
                    
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="experience_start">Start:</label>
                            <input type="month" name="experience_start" id="experience_start" class="form-control mb-3" placeholder="Start" value="{{ date_format($start,"Y-m") }}">
                        </div>
                        <div class="col-md-6">
                            <label for="experience_end">End:</label>
                            <input type="month" name="experience_end" id="experience_end" class="form-control mb-3" placeholder="End" value="{{ date_format($end,"Y-m") }}">
                        </div>
                    </div>
                    <label for="experience_description">Description:</label>
                    <textarea class="form-control mb-3" name="experience_description" id="experience_description" rows="4" placeholder="Description">{{ $experience->experience_description }}</textarea>
                    <div class="d-flex">
                        <a href="{{ url('owner') }}" class="btn btn-light rounded-pill me-auto"><i class="fa-solid fa-chevron-left"></i> cancel</a><button type="submit" class="btn btn-theme rounded-pill">save <i class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
