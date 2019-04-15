<ul class="nav nav-tabs mb-3"> 
    @can ('cabinet')
    <li class="nav-item"><a class="nav-link{{ $page === 'profile' ? ' active' : '' }}" href="{{ route('cabinet.profile.index') }}">Профиль</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'card' ? ' active' : '' }}" href="{{ route('cabinet.card.index') }}">Корзина</a></li>
    @endcan
</ul>