@extends('template.owner')
@section('main-content')
<section id="header" class="py-5 d-flex align-items-center">
    <div class="container py-5 my-5">
        <div class="row">
            <form action="{{ url('owner/portfolio/'.$portfolio->portfolio_id) }}" method="POST" enctype="multipart/form-data" id="form-portfolio">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Edit portfolio</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 p-3">
                        <label for="portfolio_image" class="form-label">Image</label>
                        <div class="border border-light p-3">
                            <img src="{{ url('assets/portfolio/'.$portfolio->portfolio_image) }}" alt="" id="portfolio_image_preview" class="rounded-0">
                            <input class="form-control" type="hidden" name="portfolio_image" id="portfolio_image" accept="image/png, image/gif, image/jpeg, image/jpg" value="{{ $portfolio->portfolio_image }}">
                            <a class="btn btn-theme rounded-pill mt-3 d-none" id="cancel_change_image">Cancel change image</a>
                        </div>
                        <a class="btn btn-theme rounded-pill mt-3" id="change_image">Change image</a>
                    </div>
                    <div class="col-md-6 col-lg-8 p-3">
                        <div class="mb-3 row">
                            <div class="col-lg-8 mb-3 mb-lg-0">
                                <label for="portfolio_headline" class="form-label">Headline:</label>
                                <input type="text" name="portfolio_headline" id="portfolio_headline" class="form-control" placeholder="Headline" value="{{ $portfolio->portfolio_headline }}" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="type_id" class="form-label">Type:</label>
                                <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                                    @foreach ($types as $type)
                                    @if ($portfolio->type_id == $type->type_id)
                                        <option value="{{ $type->type_id }}" selected>{{ $type->type_name }}</option>
                                    @else
                                        <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="portfolio_description" class="form-label">Description:</label>
                            <textarea class="form-control" name="portfolio_description" id="portfolio_description" rows="4">{{ $portfolio->portfolio_description }}</textarea>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-8 mb-3 mb-lg-0">
                                <label for="portfolio_role" class="form-label">Role:</label>
                                <input type="text" name="portfolio_role" id="portfolio_role" class="form-control" placeholder="Role" value="{{ $portfolio->portfolio_role }}" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="portfolio_accomplished" class="form-label">Year Accomplished:</label>
                                <input type="number" name="portfolio_accomplished" id="portfolio_accomplished" class="form-control" min="2017" max="2100" placeholder="YYYY" value="{{ $portfolio->portfolio_accomplished }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="portfolio_link" class="form-label">Link:</label>
                            <input type="text" name="portfolio_link" id="portfolio_link" class="form-control" placeholder="portfolio link" value="{{ $portfolio->portfolio_link }}" required>
                        </div>
                        <div class="col-12 d-flex">
                            <a class="btn btn-light rounded-pill ms-auto me-3" id="cancel-portfolio">cancel <i class="fa-solid fa-x"></i></a><button type="submit" class="btn btn-theme rounded-pill">save <i class="fa-solid fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('add-script')
<script>

const portofolio_image = $('#portfolio_image').val()
const portofolio_image_url = $('#portfolio_image_preview').attr('src')

$('#change_image').click(function(){
    $('#portfolio_image').removeAttr('value');
    $('#portfolio_image').attr('type','file');
    $('#portfolio_image').attr('required','true');
    $('#portfolio_image_preview').attr('src','');
    $('#cancel_change_image').removeClass('d-none');
    $('#change_image').addClass('d-none');
})

$('#portfolio_image').on('change', function(e){
    let image = URL.createObjectURL(e.target.files[0]);
    $('#portfolio_image_preview').attr('src',image)
})

$('#cancel_change_image').click(function(){
    $('#portfolio_image').attr('value',portofolio_image);
    $('#portfolio_image').attr('type','hidden');
    $('#portfolio_image').removeAttr('required');
    $('#portfolio_image_preview').attr('src',portofolio_image_url);
    $('#change_image').removeClass('d-none');
    $('#cancel_change_image').addClass('d-none');
})
</script>
@endsection