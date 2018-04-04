<div class="header-div">
    <span class="text-white header-font mx-auto">易加益 ● 互联网创新技术解决方案提供商</span>
</div>
<header class="navbar navbar-expand-lg navbar-light bg-light header" id="header">
    <div class="container">
        <a class="navbar-brand nav-item-1" href="{{ url('/') }}">
            <span class="nav-link-1"><img class="navbar-img" src="{{asset('img/logo.jpg')}}" alt=""></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item "><a href="{{ route('pages.root') }}"
                                         class="nav-link nav-link-1 {{active_class(if_route('topics.index'))}}">首页</a>
                </li>
                <li class="nav-item "><a href="#"
                                         class="nav-link {{active_class(if_route('topics.index'))}}">产品案例</a></li>
                <li class="nav-item "><a href="#"
                                         class="nav-link {{active_class(if_route('topics.index'))}}">技术人员</a></li>
                <li class="nav-item "><a href="#"
                                         class="nav-link {{active_class(if_route('topics.index'))}}">发布需求</a></li>
                <li class="nav-item "><a href="#"
                                         class="nav-link {{active_class(if_route('topics.index'))}}">交易大厅</a></li>
                @auth
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
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">登陆</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">注册</a></li>
                @else
                    <li class="nav-item">
                        <a href="{{route('notifications.index')}}" class="nav-link" title="消息提醒">
                            <span class="badge badge-pill badge-{{Auth::user()->notification_count>0 ? 'danger':'secondary'}}">{{Auth::user()->notification_count}}</span>
                        </a>
                    </li>
                    <li class="nav-item"><a href="{{ route('topics.create') }}" class="nav-link"><i class="fa fa-plus"
                                                                                                    aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle img-thumbnail" src="{{asset('storage/'.Auth::user()->avatar)}}"
                                 alt=""
                                 width="30px">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            @can('manage_contents')
                            <a href="{{url(config('administrator.uri'))}}" class="dropdown-item"><i class="fa fa-users" aria-hidden="true"></i>
                                管理后台</a>
                            <div class="dropdown-divider"></div>
                            @endcan
                            <a href="{{route('users.show',[Auth::user()])}}" class="dropdown-item"><i class="fa fa-user"
                                                                                                      aria-hidden="true"></i>
                                个人中心</a>
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

