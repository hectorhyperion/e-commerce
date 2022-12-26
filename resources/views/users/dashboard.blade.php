<x-layouts>

	@include('inc.navigation')
    @if (session()->has('success'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('success')}}

    </div>
    @endif
	<x-main/>

	<x-_top />

	<!-- //top-header and slider -->

<x-_carousel/>
@include('inc.bottombanner')
@include('inc._comments')
</x-layouts>
