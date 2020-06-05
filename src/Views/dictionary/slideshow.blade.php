@extends('vendor.dictionary.layouts.module')
@section('content')
    <p><a href="{{route('home')}}">Главная</a>/<a href="{{route('dictionary.index')}}">Словарик</a> / Cлайд-шоу: </p>
    @if(count($groups)>0)
        <ul class="nav nav-tabs">
        @foreach($groups as $group)
            <li class="nav-item">
                <a class="nav-link" id="nav_link_group_{{$group}}" href="{{route('dictionary.slideshow_group',['id'=>$group])}}">#_{{$group}}</a>
            </li>
        @endforeach
        </ul>
        <div id="slide_show_{{$group}}" class="carousel slide" data-ride="false">
                <div class="carousel-inner">

                    @foreach($dictionaries as $dic)
                       <div class="carousel-item {{($loop->index === 0)?'active':null}}" style="min-height: 200px;">
                           @if(count($dic->attached_file)>0)
                            <img class="d-block w-100" src="{{url($dic->attached_file->first()->file_path)}}"
                                     alt="{{$dic->attached_file->first()->file_name}}">
                           @endif
                            <div class="carousel-caption">
                                 <h4 class="display-4 bg-white text-danger"><b>{{$dic->entity}}</b></h4>
                                 <h5 class="display-5 bg-white text-dark"><i>{{$dic->value}}</i></h5>
                            </div>
                        </div>

                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#slide_show_{{$group}}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slide_show_{{$group}}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    @endif
@endsection
