<x-app-layout>

    <div class="container py-5">

        <div class="mb-3">
            {!! $products->links() !!}
        </div>

        <ul>
            @forelse($products as $product)
                <x-product-list :product="$product" />
            @empty
                <p>No se han encontrado resultados para esta búsqueda</p>
            @endforelse
        </ul>

        
    </div> 
</x-app-layout>