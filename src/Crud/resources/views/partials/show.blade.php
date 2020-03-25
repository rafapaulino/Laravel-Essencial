@can('access',$route)
    <a href="{{ route($route, ['id' => $id]) }}" title="{{ $label }}" class="btn btn-clear {{ $class }}">
        <i class="fa fa-search" aria-hidden="true"></i>  
    </a>
@endcan