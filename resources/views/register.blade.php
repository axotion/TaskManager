@extends('layout.master')



<div class="container" >

    <form class="form-signin" action="/register" method="POST">
        @if(count($errors))
            @foreach($errors->all() as $error)

                    <script> alert("{{ $error }}") </script>

            @endforeach
        @endif
        {{ csrf_field()  }}
        @section('form')
                <input type="text" id="name" class="form-control" placeholder="Username" name="name" required autofocus  style="text-align: center" autocomplete="off">
                <input type="email" id="email" class="form-control" placeholder="Email address" name="email" required autofocus  style="text-align: center" autocomplete="off">
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required style="text-align: center" autocomplete="off">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Re-type password" required style="text-align: center" autocomplete="off">

                <div class="alert-info help-block text-center button-blue" style="border-style: solid; margin-top: 10px" id="token_field" >
            Enable Javascript support
            </div>
                <input type="number" id="token" class="form-control" placeholder="Token ID" name="token" required style="text-align: center; "readonly autocomplete="off">
                    <script>
                        (function () {
                            document.getElementById("token_field").innerHTML = "{{ \TaskManager\Services\CaptchaService::GenerateCode() }}";
                            document.getElementById("token").readOnly = false;
                        })();
                    </script>
                    <br><button class="btn btn-success btn-primary btn-block" type="submit">Sign Up</button>
    </form>

</div>
    @endsection