<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"> <a class="waves-effect waves-dark sidebar-link" href="{{url('/home')}}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                @if (Auth::user()->role == 'admin')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i></i><span
                            class="hide-menu">Users </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('user.index')}}" class="sidebar-link"><i
                                    class="fas fa-list-ul"></i><span class="hide-menu"> List
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('user.create')}}" class="sidebar-link"><i
                                    class="mdi mdi-buffer"></i><span class="hide-menu"> Create
                                </span></a></li>
                    </ul>
                </li>
                @endif
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-key-variant"></i><span
                            class="hide-menu">Credential </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('credential.index')}}" class="sidebar-link"><i
                                    class="fas fa-list-ul"></i><span class="hide-menu"> List
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('credential.create')}}" class="sidebar-link"><i
                                    class="mdi mdi-buffer"></i><span class="hide-menu"> Create
                                </span></a></li>
                    </ul>
                </li>
                @if (Auth::user()->role == 'admin')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Category </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('category.index')}}" class="sidebar-link"><i
                                    class="fas fa-list-ul"></i><span class="hide-menu"> List
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('category.create')}}" class="sidebar-link"><i
                                    class="mdi mdi-buffer"></i><span class="hide-menu"> Create
                                </span></a></li>
                    </ul>
                </li>
                @endif
                <!-- @if (Auth::user()->role == 'admin')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Sub Category </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('category.index')}}" class="sidebar-link"><i
                                    class="fas fa-list-ul"></i><span class="hide-menu"> List
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('category.create')}}" class="sidebar-link"><i
                                    class="mdi mdi-buffer"></i><span class="hide-menu"> Create
                                </span></a></li>
                    </ul>
                </li>
                @endif -->
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span
                            class="hide-menu">Profile </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/profile')}}" class="sidebar-link"><i
                                    class="fas fa-user-circle"></i><span class="hide-menu"> Profile Info
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{url('profile/change_password/'.Auth::user()->id)}}" class="sidebar-link"><i
                                    class="fas fa-user-circle"></i><span class="hide-menu"> Change Password
                                </span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fas fa-power-off"></i><span class="hide-menu"> Logout
                                </span></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>