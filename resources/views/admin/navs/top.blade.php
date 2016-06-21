<nav class="navbar-top">
    <div class="nav-wrapper">

        <!-- Sidebar toggle -->
        <a href="#" class="yay-toggle">
            <div class="burg1"></div>
            <div class="burg2"></div>
            <div class="burg3"></div>
        </a>
        <!-- Sidebar toggle -->


        <!-- Menu -->
        <ul>
            <li class="user">
                <a class="dropdown-button" data-activates="user-dropdown" href="#!">
                    <img src="/admin/assets/_con/images/user.png" class="circle"> 
                    {!! Auth::User()->name !!} <i class="mdi-navigation-expand-more right"></i>
                </a>

                <ul id="user-dropdown" class="dropdown-content">
                    <li>
                        <a href="/admin/post-types">
                            <i class="fa fa-cubes"></i> Post Types
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-cogs"></i> Settings
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="page-sign-in.html">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /Menu -->

    </div>
</nav>
<!-- /Top Navbar -->