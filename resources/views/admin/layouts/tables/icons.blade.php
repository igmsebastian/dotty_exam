<a href="{{ route("{$route}.show", $model) }}" class="btn btn-simple btn-info btn-icon edit"><i class="ti-eye"></i></a>
<a href="{{ route("{$route}.edit", $model) }}" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
<a class="btn btn-simple btn-danger btn-icon remove" onclick="event.preventDefault();document.getElementById('form-delete-data-{{ $model->id }}').submit();"><i class="ti-close"></i></a>
{{ $slot }}
<form id="form-delete-data-{{ $model->id }}" method="POST" action="{{ route("{$route}.destroy", $model) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>
