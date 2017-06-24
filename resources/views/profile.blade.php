@extends('layout.master')

@section('title')
    Hello, {{ auth()->user()->name }}


@endsection


@section('body')
    @can('tasks.create', auth()->user() )
        @if($suc = session('suc_key'))
            <div class="alert alert-success">
                {{ $suc }}
            </div>

        @endif
        <form class="form-signin" action="/token" method="POST">
            @if(count($errors))
                @foreach($errors->all() as $error)

                    <script> alert("{{ $error }}") </script>

                @endforeach
            @endif
            {{ csrf_field()  }}

            @if(!count($api))

                <br><button class="btn btn-success btn-primary btn-default" type="submit">Generate new token</button>

        </form>
    @else

        <div class="" id="api_key" style="margin-top: 25%">
            <button class="btn btn-info btn-primary btn-default" onclick="document.getElementById('api_key').innerHTML='{{ $api->key }}'

                    document.getElementById('api_key').className='alert alert-info'">
                Show API key</button>
        </div>
    @endif
    @endcan
@cannot('tasks.create', auth()->user())
    <div class="alert alert-danger" >
        Your account is suspended
    </div>
    @endcannot




@endsection
