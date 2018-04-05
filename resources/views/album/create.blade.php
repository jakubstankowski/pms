@extends('layouts.album')
<h1 class="display-4">Dodaj zdjęcie</h1>
@section('content')

    {!!Form::Open(['action'=>'AlbumController@store','method'=>'Post','enctype'=>'multipart/form-data'])!!}

        {{Form::file('image')}}

        {{Form::submit('ZAPISZ')}}

    {!!Form::Close()  !!}
    @endsection

