<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            {{-- <a class="navbar-brand" href="{{ route('home') }}"> --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                
                {{-- <img src = "/images/logo.png"/> --}}
                <h5>
                    {{ config('app.name', 'Laravel') }}
                </h5>
            </a>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    @php
                         $role = auth()->user()->role;
                    @endphp
                    @if ($role == 1)
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="{{ route('jobs') }}" role="button"  aria-controls="navbar-dashboards">
                                <i class="ni ni-book-bookmark text-primary"></i>
                                <span class="nav-link-text">{{ __('Jobs') }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="{{ route('proposal') }}" role="button"  aria-controls="navbar-dashboards">
                                <i class="ni ni-book-bookmark text-primary"></i>
                                <span class="nav-link-text">{{ __('Proposals') }}</span>
                            </a>
                        </li>                       
                        
                    @else
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="" role="button"  aria-controls="navbar-dashboards">
                            <i class="ni ni-book-bookmark text-primary"></i>
                            <span class="nav-link-text">{{ __('View Survey') }}</span>
                        </a> 
                    </li>
                    @endif
                     

                    
                </ul>
            </div>
        </div>
    </div>
</nav>