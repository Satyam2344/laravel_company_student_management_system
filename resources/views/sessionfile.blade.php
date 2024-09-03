@if (empty(session('user.email')))
    {{ route('login') }}
    {{ exit() }}
@endif
