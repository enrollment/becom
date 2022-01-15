<x-app-layout>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                        <li data-thumb="{{ Storage::url($image->url) }}">
                            <img src="{{ Storage::url($image->url) }}"/>
                        </li> 
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="preview">
                    <h1 class="uppercase">{{ $product->name }}</h1>
                    <p class="mt-3">Marca: <a class="text-primary ms-3" href="#">{{ $product->brand->name }}</a></p>
                    <div class="mt-3">
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <a class="ms-2 text-success" href="#">20913 reseñas</a>
                    </div>
                    <p class="mt-3">${{ $product->price }}</p>
                </div>
                <div class="card mb-5 px-3 py-3 h-15 mt-3">
                    <div class="row">
                        <div class="text-center col-2 mt-1">
                            <i class="text-danger fas fa-3x fa-truck"></i>
                        </div>
                        <div class="col-10">
                            <p class="text-danger mt-1">Se hacen envíos a toda España </p>
                            <p class="mt-1">Recíbelo el <span class="text-danger">{{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</span> </p>
                        </div>
                    </div>
                </div>
               @if ($product->subcategory->size)
                   @livewire('add-cart-item-size', ['product' => $product])
               @elseif($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
               @else
                    @livewire('add-cart-item', ['product' => $product])
               @endif
                
            </div>
        </div>

        @push('script')
            <script>
                $(document).ready(function() {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        controlNav: "thumbnails"
                    });
                });
            </script>
        @endpush

</x-app-layout>
