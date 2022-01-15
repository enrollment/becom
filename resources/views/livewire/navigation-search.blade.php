<div class="d-flex" x-data>
  <form class="d-flex" action="{{ route('search') }}" autocomplete="off">
    <input name="name" wire:model="search" class="form-control me-2" style="width: 20rem" type="search" placeholder="¿Estás buscando algún producto?" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form> 

    <div :class="{'hidden' : !$wire.open }" @click.away="$wire.open = false" class="card hidden" style="position: absolute; top: 66.5px; width: 425px; z-index: 99;">
      <div class="card-body">
          @forelse ($products as $product)
            <div class="row g-0 ps-3 pb-2 pt-2">
              <div class="col-md-3">
                <img src="{{ Storage::url($product->images->first()->url) }}" height="100px" width="75px" alt="...">
              </div>
              <div class="col-md-9">
                <a class="text-primary" href="{{ route('product.show', $product) }}">{{ $product->name }}</a>
                <p>Categoría: <span>{{ $product->subcategory->category->name }}</span></p>
              </div>
            </div>
          @empty
          <p>No existe ningún producto con esos parámetros</span></p>
          @endforelse
      </div>
    </div>
</div>