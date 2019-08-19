@extends('back-end.layouts.app')
@section('title') Add Page @endsection

@section('content')
@component('back-end.layouts.header')
    @slot('nav_title')
        add new
    @endslot
@endcomponent
@component('back-end.shared.edit',['pageTitle'=>$pageTitle,'pageDesc'=>$pageDesc])                <div class="card-body">

                  <form action="{{route($routeName.'.store')}}" method="post" enctype="multipart/form-data">
                    @include('back-end.'.$routeName.'.form') 
                    <button type="submit" class="btn btn-primary pull-right">Add {{$modulName}}</button>
                    <div class="clearfix"></div>
                  </form>
              
@endcomponent

           
@endsection
