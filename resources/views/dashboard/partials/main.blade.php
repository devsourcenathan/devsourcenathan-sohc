@if (Auth::user()->type == 'bayeur')

@include('dashboard.partials.bayeur.header')

@elseif(Auth::user()->type == 'client')

@include('dashboard.partials.client.header')

@else

@include('dashboard.partials.admin.header')

@endif



@yield('content')

@include('dashboard.partials.footer')