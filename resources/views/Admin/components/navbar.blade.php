<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">@yield('page-title')</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="">Home</a></li>
                    <li><span>@yield('breadcrumb')</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
                    <!-- Authentication -->
                     <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                        </a>
                     </form>                
                </div>
            </div>
        </div>
    </div>
</div>
