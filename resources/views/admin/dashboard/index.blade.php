@extends('admin.default')

@section('content')

<!-- Breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col s12 m9 l10">
            <h1>Blank</h1>

            <ul>
                <li>
                    <a href="#"><i class="fa fa-home"></i> Home</a> /
                </li>

                <li>
                    <a href="#">Category</a> /
                </li>

                <li>
                    <a href='page-blank.html'>Blank</a>
                </li>
            </ul>
        </div>
        <div class="col s12 m3 l2 right-align">
            <a href="#!" class="btn grey lighten-3 grey-text z-depth-0 chat-toggle"><i class="fa fa-comments"></i></a>
        </div>
    </div>
</div>


<div class="row">
	<div class="col l8">
		<div class="card">
            <div class="title">
                <h5><i class="fa fa-user"></i> About</h5>
                <a class="close" href="#">
                    <i class="mdi-content-clear"></i>
                </a>
                <a class="minimize" href="#">
                    <i class="mdi-navigation-expand-less"></i>
                </a>
            </div>
            <div class="content">
                Phasellus viverra, lectus quis iaculis gravida, nisl felis cursus dui, id rutrum nibh quam nec ante. In ullamcorper ipsum nec tincidunt convallis. Fusce rhoncus, nisl nec ornare laoreet, ligula eros volutpat odio, sit amet ultricies ex nulla quis dolor. Sed consectetur, elit non ultricies viverra, orci ex feugiat felis, quis suscipit enim metus id ante. Aenean urna elit, laoreet accumsan pharetra et, lobortis nec odio. Ut faucibus, neque at posuere fermentum, ipsum enim lacinia augue, nec malesuada velit orci sed enim. Vivamus porttitor lacus eget arcu dapibus semper. Proin nec pretium nunc, vitae interdum tortor.
            </div>
        </div>

	</div>
</div>


@stop