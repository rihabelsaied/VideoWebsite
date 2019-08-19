<form action="{{route($routeName.'.destroy',['id' => $row])}}" method="post">
        {{method_field("delete")}}
        @csrf
        <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$modulName}} ">
            <i class="material-icons">close</i>
        </button>

</form>