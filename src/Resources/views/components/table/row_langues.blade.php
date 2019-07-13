<ul class="nav ">
    @foreach($langs as $lang)
        <li class="nav-item">
            <a class="nav-link" href="{{ $lang['url'] }}" target="_blank">
                <span class="flag-icon flag-icon-{{ $lang['locale'] }}"></span>
                {{ $lang['langue'] }}
            </a>
        </li>
    @endforeach
</ul>