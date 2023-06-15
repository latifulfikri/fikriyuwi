@extends('template.owner')
@section('main-content')
<section id="header" class="py-5 d-flex align-items-center">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12 text-start" id="form-contact">
                <div class="col-12 text-start">
                    <h3 class="fw-bold">Add new contact</h3>
                </div>
                <span>Preview: </span>
                <div class="p-2 border border-light rounded-pill mb-3 bg-light text-dark" id="preview-contact">
                    <i class="{{ $contact->contact_icon }}"></i><span id="text" class="ms-2">{{ $contact->contact_name }}</span>
                </div>
                <form action="{{ url('owner/contact/'.$contact->contact_id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="contact_name">Name</label>
                        <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="contact name" value="{{ $contact->contact_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_icon">Icon class name from font awesome</label>
                        <input type="text" name="contact_icon" id="contact_icon" class="form-control" placeholder="contact icon" value="{{ $contact->contact_icon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_link">link</label>
                        <input type="text" name="contact_link" id="contact_link" class="form-control" placeholder="contact link" value="{{ $contact->contact_link }}" required>
                    </div>
                    <div class="col-12 d-flex">
                        <a href="{{ url('/owner#reachme') }}" class="btn btn-light rounded-pill me-auto" id="cancel-contact">cancel <i class="fa-solid fa-x"></i></a><button type="submit" class="btn btn-theme rounded-pill">save <i class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('add-script')
<script>
    $('#contact_name').on('keyup',function(e){
        $('#preview-contact #text').html($(this).val())
    })

    $('#contact_icon').on('keyup',function(e){
        $('#preview-contact i').attr('class',$(this).val())
    })
</script>
@endsection