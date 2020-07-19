@isset($title)
    {{--    <div class="hidden-folded padder m-t-xs m-b-xs text-muted text-xs m-l">{{ __($title) }}</div>--}}
    <div class="sb-sidenav-menu-heading">{{ __($title) }}</div>
@endisset
<a href="{{$route ?? '#'}}" class="nav-link">

    <span class="col-auto mr-auto no-padder">
        <i class="{{$icon}} mr-2"></i>
        {{ __($label) }}
    </span>

    @isset($badge)
        <span class="col-auto no-padder">
                <b class="badge bg-{{$badge['class']}}">{{$badge['data']()}}</b>
        </span>
    @endisset
</a>
