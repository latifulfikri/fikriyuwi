@extends('template.owner')
@section('main-content')
<section id="header" class="py-5 d-flex align-items-center">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col-12 text-center">
                    <h3 class="fw-bold">Edit type</h3>
                </div>
                <span>Preview: </span>
                <div class="p-2 border border-light rounded-pill mb-3 bg-light text-dark" id="preview-portfolio-type">
                    <i class="{{ $type->type_icon }}"></i><span id="text" class="ms-2">{{ $type->type_name }}</span>
                </div>
                <form action="{{ url('owner/portfolio-type/'.$type->type_id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="type_name">Type Name</label>
                        <input type="text" name="type_name" id="type_name" class="form-control" value="{{ $type->type_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="type_icon">Icon class name from font awesome</label>
                        <input type="text" name="type_icon" id="type_icon" class="form-control" value="{{ $type->type_icon }}" required>
                    </div>
                    <div class="col-12 d-flex">
                        <a href="{{ url('owner') }}" class="btn btn-light rounded-pill me-auto" id="cancel-portfolio-type">cancel <i class="fa-solid fa-x"></i></a><button type="submit" class="btn btn-theme rounded-pill">save <i class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('add-script')
<script>
    $('#type_name').on('keyup',function(e){
        $('#preview-portfolio-type #text').html($(this).val())
    })

    $('#type_icon').on('keyup',function(e){
        $('#preview-portfolio-type i').attr('class',$(this).val())
    })
</script>
@endsection