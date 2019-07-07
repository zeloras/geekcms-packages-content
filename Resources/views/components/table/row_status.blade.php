<button  type="button" class="btn btn-sm btn-{{ $status ? 'primary' : 'secondary' }}">
    <i class="fa {{ $status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
    {{ $status ? 'Enabled' : 'Disabled' }}
</button>
