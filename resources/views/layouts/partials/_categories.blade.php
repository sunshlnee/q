@foreach ($categories as $category)
    {{ $delimiter ?? '' }}<a href="/products/{{$category->getPath()}}"> {{$category->title ?? ''}}</a><br>
    @isset ($category->children)
        @include('layouts.partials._categories', [
            'categories' => $category->children,
            'delimiter' => "—" . $delimiter
        ])
    @endisset
@endforeach