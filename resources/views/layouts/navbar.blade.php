<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if ($user)
            <a class="navbar-brand" href="{{ route('site.dashboard') }}">Vendigital</a>
            @else
            <a class="navbar-brand" href="{{ route('site.login') }}">Vendigital</a>
            @endif
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            @if ($user)
            <ul class="nav navbar-nav">
                <li><a href="{{ route('tasks.index') }}">Tasks</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$user->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('site.profile') }}">Profile</a></li>
                        <li><a href="{{ route('site.settings') }}">Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('site.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('site.login') }}">Log in</a></li>
            </ul>
            @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>