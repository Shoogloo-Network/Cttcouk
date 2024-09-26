<header class="sticky-header">
    <div class="container">
        <div class="nav-header">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a href="/">
                        <img src="/assets/images/cttimg/ctt-logo.jpg" width="110" alt="Cheap Train Tickets" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 desktop-menu2">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>

                            @foreach ($result as $nav)

                                @php $parent = $nav['parent_name']; @endphp

                                @switch ($parent)
                                    @case ('Routes')
                                        @php
                                            $prefix = '';
                                            $suffix = ' Trains';
                                        @endphp
                                    @break

                                    @case ('Countries')
                                        @php
                                            $prefix = 'Cheap Train Tickets to ';
                                            $suffix = '';
                                        @endphp
                                    @break

                                    @case ('Split Tickets')
                                        @php
                                            $urlto = 'https://www.splittraintickets.net/';
                                        @endphp
                                    @break

                                    @case ('Blog')
                                        @php
                                            $urlto = 'https://blog.cheaptraintickets.co.uk/';
                                        @endphp
                                    @break

                                    @default
                                        @php
                                            $prefix = '';
                                            $suffix = '';
                                        @endphp
                                @endswitch

                                <li class="nav-item dropdown">
                                    @if ($nav['parent_name'] == 'Split Tickets')
                                        <a class="nav-link" href= "{{ $urlto }}" target="_blank">
                                            {{ $nav['parent_name'] }}
                                        </a>
                                    @elseif ($nav['parent_name'] == 'Blog')
                                        <a class="nav-link" href= "{{ $urlto }}" target="_blank">
                                            {{ $nav['parent_name'] }}
                                        </a>
                                    @else
                                        <a class="nav-link dropdown-toggle"
                                            href= "{{ url('/' . $nav['parent_slug'] . '.html') }}">
                                            {{ $nav['parent_name'] }}
                                        </a>
                                    @endif

                                    @if (count($nav['children']) > 0 && $nav['parent_tab_order'] <= 10)
                                        <ul class="dropdown-menu">
                                            @foreach ($nav['children'] as $subnav)

                                                @if ($subnav['child_status'] != 'No')

                                                    @if ($nav['parent_slug'] == 'cities')
                                                        <li><a class="dropdown-item"
                                                                href="{{ url('/trains-to-' . $subnav['child_slug'] . '.html') }}">
                                                                {{ $subnav['child_name'] }}
                                                            </a>
                                                        </li>
                                                    @elseif($nav['parent_slug'] == 'popular-routes')
                                                        @php
                                                            $excities = explode('-to-', $subnav['child_slug']);
                                                            $toCity = $excities[1];
                                                        @endphp
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url('/trains-to-' . $toCity . '/' . $subnav['child_slug'] . '-train.html') }}">
                                                                {{ $subnav['child_name'] . $suffix }}
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url($nav['parent_slug'] . '/' . $subnav['child_slug'] . '.html') }}">
                                                                {{ $prefix . $subnav['child_name'] }}
                                                            </a>
                                                        </li>
                                                    @endif

                                                @endif
                                            @endforeach

                                            @if ($subnav['child_status'] != 'No')
                                                <li><a class="dropdown-item"
                                                        href="{{ '/' . $nav['parent_slug'] . '.html' }}">View
                                                        All...</a></li>
                                            @endif
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mob-menu2">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            @foreach ($result as $nav)
                                @php
                                    $parent = $nav['parent_name'];
                                @endphp
                                @switch ($parent)
                                    @case ('Routes')
                                        @php
                                            $prefix = '';
                                            $suffix = ' Trains';
                                        @endphp
                                    @break

                                    @case ('Countries')
                                        @php
                                            $prefix = 'Cheap Train Tickets to ';
                                            $suffix = '';
                                        @endphp
                                    @break

                                    @case ('Split Tickets')
                                        @php
                                            $urlto = 'https://www.splittraintickets.net/';
                                        @endphp
                                    @break

                                    @case ('Blog')
                                        @php
                                            $urlto = 'https://blog.cheaptraintickets.co.uk/';
                                        @endphp
                                    @break

                                    @default
                                        @php
                                            $prefix = '';
                                            $suffix = '';
                                        @endphp
                                @endswitch

                                <li class="nav-item dropdown">

                                    @if ($nav['parent_name'] == 'Split Tickets')
                                        <a class="nav-link" href= "{{ $urlto }}" target="_blank">
                                            {{ $nav['parent_name'] }}
                                        </a>
                                    @elseif ($nav['parent_name'] == 'Blog')
                                        <a class="nav-link" href= "{{ $urlto }}" target="_blank">
                                            {{ $nav['parent_name'] }}
                                        </a>
                                    @else
                                        <a class="nav-link dropdown-toggle" href= "#">
                                            {{ $nav['parent_name'] }}
                                        </a>
                                    @endif

                                    @if (count($nav['children']) > 0 && $nav['parent_tab_order'] <= 8)
                                        <ul class="dropdown-menu">
                                            @foreach ($nav['children'] as $subnav)
                                                @if ($subnav['child_status'] != 'No')
                                                    @if ($nav['parent_slug'] == 'cities')
                                                        <li><a class="dropdown-item"
                                                                href="{{ url('/trains-to-' . $subnav['child_slug'] . '.html') }}">
                                                                {{ $subnav['child_name'] }}
                                                            </a>
                                                        </li>
                                                    @elseif($nav['parent_slug'] == 'popular-routes')
                                                        @php
                                                            $excities = explode('-to-', $subnav['child_slug']);
                                                            $toCity = $excities[1];
                                                        @endphp
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url('/trains-to-' . $toCity . '/' . $subnav['child_slug'] . '-train.html') }}">
                                                                {{ $subnav['child_name'] . $suffix }}
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url($nav['parent_slug'] . '/' . $subnav['child_slug'] . '.html') }}">
                                                                {{ $prefix . $subnav['child_name'] }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach

                                            @if ($subnav['child_status'] != 'No')
                                                <li><a class="dropdown-item"
                                                        href="{{ '/' . $nav['parent_slug'] . '.html' }}">View
                                                        All...</a></li>
                                            @endif
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
