<header class="sticky-header">
    <div class="container">
        <div class="nav-header">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a href="/">
                        <img src="/assets/images/sttimg/stt-logo.png" width="150" alt="Split Saving" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            @foreach ($result as $nav)
                                @php
                                    $parent = $nav['parent_name'];
                                @endphp
                                @switch ($parent)
                                    @case ('Home')
                                        @php
                                            $urlpre = '';
                                        @endphp
                                    @break

                                    @case ('Split Train Tickets')
                                        @php
                                            $urlpre = '/split-train-tickets-to-';
                                        @endphp
                                    @break

                                    @case ('Top Routes')
                                        @php
                                            $urlpre = '/split-train-ticket/';
                                        @endphp
                                    @break

                                    @case ('Train Companies')
                                        @php
                                            $urlpre = '/train-companies/';
                                        @endphp
                                    @break

                                    @case ('Ferries')
                                        @php
                                            $urlpre = '/ferries/';
                                        @endphp
                                    @break

                                    @default
                                        @php
                                            $prefix = '';
                                        @endphp
                                @endswitch
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                        href= "{{ url('/' . $nav['parent_slug'] . '.html') }}">
                                        {{ $nav['parent_name'] }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($nav['children'] as $subnav)
                                            <li><a class="dropdown-item"
                                                    href="{{ $urlpre . $subnav['child_slug'] }}.html">{{ $subnav['child_name'] }}</a>
                                            </li>
                                        @endforeach
                                        <li><a class="dropdown-item"
                                                href="{{ '/' . $nav['parent_slug'] . '.html' }}">View
                                                All...</a></li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
