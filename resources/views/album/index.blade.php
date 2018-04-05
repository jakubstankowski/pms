@extends('layouts.album')

@section('content')

       @foreach($images as $image)
            <div class="row">
                <div class="col-md-4">

                    <img src="photo/{{$image->image}}">

                </div>


            </div>

           {!! Form::open(['action'=>['AlbumController@destroy',$image->id],'method'=>'delete']) !!}

                {{Form::submit('USUŃ')}}

            {!! Form::close() !!}
        @endforeach


    @endsection