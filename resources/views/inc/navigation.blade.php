<!-- navigation -->
<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                @auth
                                <li class="active"><a href="/users/dashboard" class="act">Home</a></li>
                                    @else
                                        <li class="active"><a href="/" class="act">Home</a></li>
                                @endauth

                                <!-- Mega Menu -->
                                @if(count($data) > 0)
                                @foreach ($data as $item)
                                <li><a href="/prodcut/category/{{$item->category_name}}">{{$item->category_name}}</a></li>
                            @endforeach
                            @else

                            @endif
                            </ul>
                        </div>
                        </nav>
        </div>
    </div>

<!-- //navigation -->
