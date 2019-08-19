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
                  <form action="{{route($routeName.'.update',['id' => $row])}}" method="post">
                    {{method_field('PUT')}}
                    @include('back-end.'.$routeName.'.form')
                    
                    <button type="submit" class="btn btn-primary pull-right">Update {{$modulName}}</button>
                    </div>
                    <div class="clearfix"></div>
                  </form>
               

  @endcomponent         
@endsection
