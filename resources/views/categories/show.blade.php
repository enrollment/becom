<x-app-layout>
    <div class="container pt-5 pb-5">
        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
    </div>

    <div class="container pb-5">
        @livewire('category-filter', ['category' => $category])
    </div>
</x-app-layout>
    