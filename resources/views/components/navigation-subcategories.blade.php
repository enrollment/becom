@props(['category'])

@foreach ($category->subcategories as $subcategory)
    <li><a class="dropdown-item" href="/{{ $subcategory->slug }}">{{ $subcategory->name }}</a></li>
@endforeach
