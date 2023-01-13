<x-layouts>

	@include('inc.navigation')
    @if (session()->has('comment'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('comment')}}

    </div>
    @endif
    @if (session()->has('message'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}

    </div>
    @endif
	<x-main/>

	<x-_top />

	<!-- //top-header and slider -->

<x-_carousel/>
<br>    <br>
@include('inc._comments')
</x-layouts>
