{{--@empty(!Dashboard::getSearch()->all())--}}
    {{--<div class="p-3">
        <div class="dropdown position-relative" data-controller="layouts--search">
            <div class="input-icon">
                <input
                    data-action="keyup->layouts--search#query blur->layouts--search#blur focus->layouts--search#focus"
                    data-target="layouts--search.query"
                    type="text"
                    value="@yield('search')"
                       class="form-control input-sm padder bg-dark text-white"
                       placeholder="{{ __('What to search...') }}"
                >
                <div class="input-icon-addon">
                    <i class="icon-magnifier"></i>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow bg-white w-100"
                 x-placement="start-left" id="search-result">
            </div>
        </div>
    </div>--}}

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control input-sm padder bg-dark text-white" type="text"
                   data-action="keyup->layouts--search#query blur->layouts--search#blur focus->layouts--search#focus"
                   data-target="layouts--search.query"
                   value="@yield('search')"
                   placeholder="{{ __('What to search...') }}" aria-label="Search"
                   aria-describedby="basic-addon2"/>

            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    {{--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                   aria-describedby="basic-addon2"/>
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>--}}
{{--@endempty--}}
