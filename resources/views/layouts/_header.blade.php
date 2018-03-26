<header class="navbar navbar-expand-lg navbar-light bg-light header" id="header">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <i class="fa fa-user-circle" aria-hidden="true"></i>1and1.BBS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item "><a href="{{ route('topics.index') }}"
                                         class="nav-link {{active_class(if_route('topics.index'))}}">话题</a></li>
                <li class="nav-item "><a href="{{ route('categories.show', 1) }}"
                                         class="nav-link {{active_class(if_route('categories.show') && if_route_param('category',1))}}">分享</a>
                </li>
                <li class="nav-item "><a href="{{ route('categories.show', 2) }}"
                                         class="nav-link {{active_class(if_route('categories.show') && if_route_param('category',2))}}">教程</a>
                </li>
                <li class="nav-item "><a href="{{ route('categories.show', 3) }}"
                                         class="nav-link {{active_class(if_route('categories.show') && if_route_param('category',3))}}">问答</a>
                </li>
                <li class="nav-item "><a href="{{ route('categories.show', 4) }}"
                                         class="nav-link {{active_class(if_route('categories.show') && if_route_param('category',4))}}">公告</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">登陆</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">注册</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('topics.create') }}" class="nav-link"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle img-thumbnail" src="{{asset(Auth::user()->avatar)}}" alt=""
                                 width="30px">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{route('users.show',[Auth::user()])}}" class="dropdown-item"><i class="fa fa-user" aria-hidden="true"></i> 个人中心</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('users.edit',[Auth::user()])}}" class="dropdown-item"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑资料</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> 退出登陆
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</header>

