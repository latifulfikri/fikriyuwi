@extends('template.owner')
@section('main-content')
<section id="header" class="py-5 d-flex align-items-center">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col-12 text-center">
                    <h3 class="fw-bold">Edit Experience</h3>
                </div>
                <form action="{{ url('owner/experience/'.$experience->experience_id) }}" method="post" class="mt-5">
                    @method('PUT')
                    @csrf
                    <label for="experience_headline">Headline:</label>
                    <input type="text" name="experience_headline" id="experience_headline" class="form-control mb-3" placeholder="Headline" value="{{ $experience->experience_headline }}" required>
                    <label for="experience_company">Company:</label>
                    <input type="text" name="experience_company" id="experience_company" class="form-control mb-3" placeholder="Company" value="{{ $experience->experience_company }}" required>
                    <?php
                    
                    $start = date_create($experience->experience_start);
                    $end = null;
                    if($experience->experience_end != null) {
                        $end = date_create($experience->experience_end);
                    }
                    
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="experience_start">Start:</label>
                            <input type="month" name="experience_start" id="experience_start" class="form-control mb-3" placeholder="Start" value="{{ date_format($start,"Y-m") }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="experience_end">End:</label>
                            <input type="hidden" id="experience_end_init" value="{{ $end != null ? date_format($end,"Y-m") : '' }}">
                            <input type="month" name="experience_end" id="experience_end" class="form-control mb-3" placeholder="End" value="{{ $end != null ? date_format($end,"Y-m") : '' }}" {{ $end == null ? 'disabled' : '' }} required>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="current-work-check" {{ $end == null ? 'checked' : '' }}>
                        <label class="form-check-label" for="current-work-check">
                            Currently work here
                        </label>
                    </div>
                    <label for="experience_description">Description:</label>
                    <textarea class="form-control mb-3" name="experience_description" id="experience_description" rows="4" placeholder="Description" required>{{ $experience->experience_description }}</textarea>
                    <div class="d-flex">
                        <a href="{{ url('owner') }}" class="btn btn-light rounded-pill me-auto"><i class="fa-solid fa-chevron-left"></i> cancel</a><button type="submit" class="btn btn-theme rounded-pill">save <i class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('add-script')
<script>
$('#current-work-check').change(function(){
    if(this.checked) {
        $('#experience_end').val('');
        $('#experience_end').attr('required',false);
        $('#experience_end').attr('disabled',true);
    } else {
        $('#experience_end').val($('#experience_end_init').val());
        $('#experience_end').attr('required',true);
        $('#experience_end').attr('disabled',false);
    }
})
</script>
@endsection