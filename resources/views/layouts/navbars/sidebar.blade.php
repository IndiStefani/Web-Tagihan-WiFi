<div class="sidebar" data-image="{{ asset('img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ __('SOSES.NET') }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if ($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples"
                    @if ($activeButton == 'master') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Master') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if ($activeButton == 'master') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if ($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if ($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if ($activePage == 'roles') active @endif">
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __('Role & Permission') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>

            <li class="nav-item @if ($activePage == 'pelanggan') active @endif">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __('Pelanggan') }}</p>
                </a>
            </li>
            </li>
        </ul>
    </div>
</div>
