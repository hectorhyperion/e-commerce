<x-layouts>

	@include('inc.navigation')
	@if (session()->has('message'))
<div class="alert alert-success">
    
    {{session()->get('message')}}
   
</div>
@endif
	<x-main/>

	<x-_top />
	
	<!-- //top-header and slider -->

<x-_carousel/>	
</x-layouts>