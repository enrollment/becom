<div>
    <div class="card mb-5 px-3 py-3 h-15">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-danger mt-1 uppercase">{{ $category->name }}</h5>
            </div>
            <div class="col-md-6 text-end">
                <i wire:click="$set('view', 'grid')"
                    class="border p-1 fas fa-border-all cursor-pointer {{ $view == 'grid' ? 'text-danger' : '' }}"></i>
                <i wire:click="$set('view', 'list')"
                    class="border p-1 fas fa-th-list cursor-pointer {{ $view == 'list' ? 'text-danger' : '' }}"></i>
            </div>
        </div>
    </div>

    <section>
        <div class="row">
            <div class="col-md-3 pe-5">
                <div class="card px-3 py-4 h-15">
                    <h5 class="text-danger mb-3 uppercase">Subcategorías</h5>
                    <hr class="mb-2">
                    @foreach ($category->subcategories as $subcategory)
                        <a wire:click="$set('subcategoria', '{{ $subcategory->name }}')"
                            class="mt-2 mb-2 cursor-pointer {{ $subcategoria == $subcategory->name ? 'text-primary' : '' }}">{{ $subcategory->name }}</a>
                    @endforeach
                </div>

                <div class="card mt-5 px-3 py-4 h-15">
                    <h5 class="text-danger mb-3 uppercase">Marcas</h5>
                    <hr class="mb-2">
                    @foreach ($category->brands as $brand)
                        <a wire:click="$set('marca', '{{ $brand->name }}')"
                            class="mt-2 mb-2 cursor-pointer {{ $marca == $brand->name ? 'text-primary' : '' }}">{{ $brand->name }}</a>
                    @endforeach
                </div>

                <a wire:click="limpiar" class="btn btn-danger mt-3">Eliminar filtros</a>
            </div>



            <div class="col-md-9">

                <div class="mb-3">
                    {!! $products->links() !!}
                </div>

                    <div class="row">
                    @if ($view == 'grid')
                        @foreach ($products as $product)
                            <div class="col-md-3 card-group">
                                <div class="card mb-5">
                                    <img src="{{ Storage::url($product->images->first()->url) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="{{ route('product.show', $product) }}">
                                            <h5 class="card-title">{{ Str::limit($product->name, 35) }}</h5>
                                        </a>
                                        <h5 class="card-title">${{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                        @foreach ($products as $product)
                           <x-product-list :product="$product" />
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>

</div>
