@props(['product'])

<div class="card mb-3 p-0">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ Storage::url($product->images->first()->url) }}"
                class="img-fluid" alt="...">
        </div>
        <div class="col-md-8 ps-2 pt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('product.show', $product) }}">
                            <h5 class="card-title">{{ Str::limit($product->name, 35) }}</h5>
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <span class="ms-2">(14)</span>
                    </div>
                </div>
                <h5 class="card-title">${{ $product->price }}</h5>
                <a href="#" class="btn btn-primary mt-5">Más información</a>
            </div>
        </div>
    </div>
</div>