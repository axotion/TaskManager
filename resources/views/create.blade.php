@extends('layout.master')



<div class="container" >

    <form class="form-signin" action="/create" method="POST">
        @if(count($errors))
            @foreach($errors->all() as $error)

                    <script> alert("{{ $error }}") </script>

            @endforeach
        @endif
        {{ csrf_field()  }}
        @section('form')

                <div class="form-group has-success">
                    <label class="form-control-label" for="inputSuccess1" id="count">Characters left: 100</label>
                    <input type="text" class="form-control form-control-success" id="task" name="task"  }} required placeholder="Make a perfect risotto for dinner with friends" onchange="document.getElementById('count').innerHTML = 'Characters left: ' + (100 - this.value.length);">
                </div>
                <button class="btn btn-success btn-primary btn-block" type="submit">Add task</button>
<script>
    document.getElementById('task').onkeyup = function () {
        document.getElementById('count').innerHTML = "Characters left: " + (100 - this.value.length);
    };
</script>
    </form>

</div>
    @endsection