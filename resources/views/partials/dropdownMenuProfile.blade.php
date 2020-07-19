<a href="{{$route ?? '#'}}" class="dropdown-item">
    <i class="{{$icon}} mr-2" aria-hidden="true"></i>
    <span>{{ __($label) }}</span>
    @isset($badge)
        <span class="col-auto no-padder">
                <b class="badge bg-{{$badge['class']}}">{{$badge['data']()}}</b>
        </span>
    @endisset
</a>
