<div class="btn-group btn-group-sm" role="group" aria-label="First group">
    @if($user)

        <button type="button" class="btn btn-secondary">
            <i class="fa fa-user"></i>
            {{ $user->name }}
        </button>
    @endif

    @if($time)

        <button type="button" class="btn btn-secondary">
            <i class="fa fa-calendar"></i>
            {{ $time }}
        </button>
    @endif
</div>