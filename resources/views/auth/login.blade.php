@extends('template.auth')

@section('main-content')
<section id="auth">
    <div class="container vh-100 d-flex align-items-center">
        <div class="row w-100">
            <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                @if (session('message'))
                    <div class="alert alert-{{ session('message-type') }} rounded-0">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ url('login') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                            <button class="btn btn-outline-secondary rounded-0" type="button" id="show_password"><i class="fa-regular fa-eye"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-theme rounded-pill">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('add-script')
<script>
    $('#show_password').click(function(){
        if($('#password').attr('type') == 'password') {
            $('#password').attr('type','text')
        } else {
            $('#password').attr('type','password')
        }

        if($('#show_password i').attr('class') == 'fa-regular fa-eye') {
            $('#show_password i').attr('class','fa-regular fa-eye-slash')
        } else {
            $('#show_password i').attr('class','fa-regular fa-eye')
        }
    });
</script>
@endsection