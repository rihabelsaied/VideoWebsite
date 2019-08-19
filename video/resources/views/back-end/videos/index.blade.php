@extends('back-end.layouts.app')

@section('title') Category Page @endsection

@section('content')
@component('back-end.layouts.header')
    @slot('nav_title')
       Category Page
    @endslot
@endcomponent
   
   @component('back-end.shared.table',['pageTitle' => $pageTitle,'pageDesc'=> $pageDesc])
   @slot('addButton')
      <div class="col-md-4 text-right">
        <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">Add {{$modulName}}</a>
      </div>
  @endslot
                 
                
               
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      <th>
                          ID
                        </th>
                       
                        <th>
                          Name
                        </th>
                        <th>
                          Published
                        </th>
                        <th>
                          Category
                        </th>
                        <th>
                          User
                        </th>
                        
                        <th class="text-right">
                         Control
                        </th>
                       
                       
                      </thead>
                      <tbody>
                      @foreach($rows as $row)
                       <tr>
                       <td>
                          {{$row->id}}

                          </td>
                          <td>
                          {{$row->name}}

                          </td>
                          <td>
                            @if($row->published == 1)
                              Publiched
                            @else
                              Hidden
                            @endif

                          </td>
                          <td>
                          {{$row->category->name}}

                          </td>
                          <td>
                          {{$row->user->name}}

                          </td>
                         
                          <td class="td-actions text-right">

                        @include('back-end.shared.buttons.edit')
                        @include('back-end.shared.buttons.delete')

                          </td>
                        
                        
                         
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                    {{$rows->links()}}
                  </div>
                @endcomponent
@endsection
