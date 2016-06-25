<!--
  Yay Sidebar
  Options [you can use all of theme classnames]:
    .yay-hide-to-small         - no hide menu, just set it small with big icons
    .yay-static                - stop using fixed sidebar (will scroll with content)
    .yay-gestures              - to show and hide menu using gesture swipes
    .yay-light                 - light color scheme
    .yay-hide-on-content-click - hide menu on content click

  Effects [you can use one of these classnames]:
    .yay-overlay  - overlay content
    .yay-push     - push content to right
    .yay-shrink   - shrink content width
-->
    <aside class="yaybar yay-shrink yay-hide-to-small yay-gestures yay-light">

        <div class="top">
            <div>
                <!-- Sidebar toggle -->
                <a href="#" class="yay-toggle">
                    <div class="burg1"></div>
                    <div class="burg2"></div>
                    <div class="burg3"></div>
                </a>
                <!-- Sidebar toggle -->
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">

                <ul>
                    <li class="yay-user-info">
                        <a href="#">
                            <img src="/admin/assets/_con/images/user.png" alt="John Doe" class="circle">
                            <h3 class="yay-user-info-name">{!! Auth::user()->name !!}</h3>
                            <div class="yay-user-location">
                                <i class="fa fa-map-marker"></i> Lebanon
                            </div>
                        </a>
                    </li>

                    <li>
						<a href="/admin/dashboard" class="yay-sub-toggle waves-effect waves-blue"> 
							<i class="fa fa-dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li class="label">Media Center</li>
                    
                    <li>
                        <a href="/admin/posts/news" class=" waves-effect waves-blue"> <i class="fa fa-bullhorn"></i> 
                            News
                        </a>
                    </li>
                    
                    <li>
                        <a href="/admin/posts/interviews" class=" waves-effect waves-blue"> <i class="fa fa-microphone"></i> 
                            Interviews
                        </a>
                    </li>

                    <li>
                        <a href="/admin/posts/galleries" class=" waves-effect waves-blue"> <i class="fa fa-camera-retro"></i> 
                            Galleries
                        </a>
                    </li>

                    <li>
                        <a href="/admin/posts/videos" class=" waves-effect waves-blue"> <i class="fa fa fa-video-camera"></i> 
                            Videos
                        </a>
                    </li>

                    <li class="label">Content</li>

                    <li>
                        <a href="widgets.html" class=" waves-effect waves-blue"> <i class="fa fa-magic"></i> Widgets </a>

                    </li>

                    <li>
                        <a href="/admin/categories" class=" waves-effect waves-blue"> <i class="fa fa-sitemap"></i> 
                            Categories
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </aside>
    <!-- /Yay Sidebar -->