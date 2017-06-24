@extends('layout.master')

@section('title')
    Simple Task Manager
@endsection


@section('body')

<br>
    <div class="container" style="margin-left: -3%">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>..fdsfsddfsfs.</h3>
                        <p>fdsfsfs</p>
                    </div>
                    <img src="1.png" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>fdsfsfs</h3>
                        <p>fdsfsfs</p>
                    </div>
                    <img src="1.png" alt="Chicago" style="width:100%;">
                </div>

                <div class="item" >
                    <div class="carousel-caption d-none d-md-block">
                        <h3>fdsfsfs</h3>
                        <p>..fdsfsdfsdfs.</p>
                    </div>
                    <img src="1.png" alt="New york" style="width:100%;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">

            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">

            </a>
        </div>
    </div>
<br>
<button class="btn btn-danger btn-primary btn-default center-block" style="margin-top: 2%" ><a href="/register" >Try it for free!</a> </button>

@endsection
