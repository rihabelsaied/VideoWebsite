@extends('back-end.layouts.app')
@section('title') Edit Page @endsection

@section('content')
@component('back-end.layouts.header')
    @slot('nav_title')
       Edit
    @endslot
@endcomponent
@component('back-end.shared.edit',['pageTitle'=>$pageTitle,'pageDesc'=>$pageDesc]) 
               <div class="card-body">
                  <form action="{{route($routeName.'.update',['id' => $row])}}" method="post" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @include('back-end.'.$routeName.'.form')
                    
                    <button type="submit" class="btn btn-primary pull-right">Update {{$modulName}}</button>
                    </div>
                    <div class="clearfix"></div>
                  </form>
@slot('md4')
@php $url=getYoutubeId($row->youtube); @endphp
@if($url)
  <iframe width="230" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; allowfullscreen"></iframe>
 @endif
@endslot

  @endcomponent   
@include('back-end.comments.create')
@include('back-end.comments.index')
               
      
@endsection
