@isset($title)
    {{--<li class="nav-item mt-3">
        <div class="hidden-folded padder mt-1 mb-1 text-muted text-xs m-l">{{ __($title) }}</div>
    </li>--}}
    <div class="sb-sidenav-menu-heading">{{ __($title) }}</div>
@endisset

{{--<li class="nav-item @isset($active) {{active($active)}} @endisset">
    <a class="nav-link"
       @if (!empty($childs))
       href="#menu-{{$slug}}" data-toggle="collapse"
       @else
       href="{{$route ?? '#'}}"
        @endif
    >
        @isset($badge)
            <b class="badge bg-{{$badge['class']}} pull-right mr-3 mt-1">{{$badge['data']()}}</b>
        @endisset
        <i class="{{$icon}} mr-2"></i>{{ __($label) }}
    </a>
</li>--}}

<a class="nav-link"
   @if (!empty($childs))
   href="#menu-{{$slug}}" data-toggle="collapse"
   class="nav-link collapsed" data-target="#collapse-{{$slug}}"
   aria-expanded="false" aria-controls="collapseLayouts"
   @else
   href="{{$route ?? '#'}}"
   @endif >
    @isset($badge)
        <b class="badge bg-{{$badge['class']}} pull-right mr-3 mt-1">{{$badge['data']()}}</b>
    @endisset
    <div class="sb-nav-link-icon"><i class="{{$icon}}"></i></div>
    {{ __($label) }}
</a>

@if($childs)
    <div class="collapse sub-menu {{active($active,'show')}}" id="menu-{{$slug}}" data-parent="#headerMenuCollapse">
        {!! Dashboard::menu()->render($slug,'platform::partials.dropdownMenu') !!}
    </div>

    <div class="collapse" id="collapse-{{$slug}}" aria-labelledby="headingOne"
         data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            {!! Dashboard::menu()->render($slug,'platform::partials.dropdownMenu') !!}
        </nav>
    </div>


@endif

@if($divider)
    <li class="divider my-2"></li>
@endif
