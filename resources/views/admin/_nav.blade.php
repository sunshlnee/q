<ul class="nav nav-tabs mb-3"> 
    @can ('admin-panel')
    <li class="nav-item"><a class="nav-link{{ $page === '' ? ' active' : '' }}" href="{{ route('admin.home') }}">Home</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'products' ? ' active' : '' }}" href="{{ route('admin.products.index') }}">Products</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'users' ? ' active' : '' }}" href="{{ route('admin.users.index') }}">Users</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'categories' ? ' active' : '' }}" href="{{ route('admin.categories.index') }}">Categories</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'brands' ? ' active' : '' }}" href="{{ route('admin.brands.index') }}">Brands</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'colors' ? ' active' : '' }}" href="{{ route('admin.colors.index') }}">Colors</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'fabrics' ? ' active' : '' }}" href="{{ route('admin.fabrics.index') }}">Fabrics</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'sizes' ? ' active' : '' }}" href="{{ route('admin.sizes.index') }}">Sizes</a></li>
    @endcan
</ul>