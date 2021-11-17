<nav class="navbar navbar-expand-lg navbar-dark bg-secondary justify-content-between" style="border: 1px solid #e1e6ef;">
    <!-- Primary Navigation Menu -->
    <a class="navbar-brand" href="#"> 
       <img src="{{asset('image/cta-logo.png')}}" width="30" height="30" class="d-inline-block align-top mr-2" alt="">E-Filing
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Navigation Links -->
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-5">
            <li class="nav-item mx-2 {{request()->routeIs('dashboard') ? 'active' : ''}}">
                <x-nav-link :href="route('dashboard')" class="nav-link">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            <li class="nav-item mx-2 {{ request()->routeIs('messages') || request()->routeIs('messages.*') ? 'active' : ''}} ">
                <x-nav-link :href="route('messages')" class="nav-link">
                    Messages @include('messenger.unread-count')
                </x-nav-link>
            </li>
        </ul>
    </div>  

    <div class="dropdown">
        <button class="btn btn-link text-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="text-secondary">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
    </div> 
</nav>
