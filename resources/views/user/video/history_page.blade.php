@extends('user.video.layout')
@php
use App\Helpers\regularModules;
@endphp
@section('mytube_main_section')




<div class="container-fluid pb-0">
    <hr>

    <div class="row">
        @foreach ($history as $history_data )

        <div class="col-md-12">
            <a href="{{  $history_data->description }}">{{ $history_data->description }}</a>
        </div>
        @endforeach


    </div>


</div>



@endsection
