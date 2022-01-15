<div wire:init="loadProducts">

    @if (count($products))

        <div class="glider-contain">
            <div class="glider-{{ $category->id }} mt-3">
                @foreach ($products as $product)
                    <div class="card mb-5 {{ $loop->last ? '' : 'me-5' }}" style="width: 20rem!important;">
                        <img src="{{ Storage::url($product->images->first()->url) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('product.show', $product) }}">
                                <h5 class="card-title">{{ Str::limit($product->name, 35) }}</h5>
                            </a>
                            <h5 class="card-title">${{ $product->price }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>

    @else
        <div class="glider-contain">
            <div class=" mt-3">
                <div class="card mb-5">
                    <div class="card-1 animate-pulse"> </div>
                    <div class="card-2 p-3">
                        <div class="row">
                            <div class="col-4">
                                <div class="inner-card animate-pulse"> </div>
                            </div>
                            <div class="col-8">
                                <div class="inner-card animate-pulse"> </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="inner-card animate-pulse"> </div>
                            </div>
                            <div class="col-6">
                                <div class="inner-card animate-pulse"> </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <div class="inner-card animate-pulse"> </div>
                            </div>
                            <div class="col-10">
                                <div class="inner-card animate-pulse"> </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>

    @endif

</div>


