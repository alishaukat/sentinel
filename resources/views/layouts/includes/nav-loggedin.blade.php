<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>{{ getUserName() }}</b> <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li class="divider"></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </li>
</ul>