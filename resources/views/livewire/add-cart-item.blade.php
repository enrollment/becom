<div x-data>
    <h5 class="text-primary uppercase">Stock disponible: <span>({{ $quantity }})</span></h5>
    <div class="row mt-3">
        <div class="col-md-3">
            <button class="btn btn-secondary" disabled
            x-bind:disabled="$wire.qty <= 1"
            wire:loading.attr="disabled"
            wire:target="decrement"
            wire:click="decrement">
            -
            </button>

            <span class="mx-3">{{$qty}}</span>

            <button class="btn btn-secondary" 
            x-bind:disabled="$wire.qty >= $wire.quantity"
            wire:loading.attr="disabled"
            wire:target="increment"
            wire:click="increment">
            +
            </button>
        </div>
    </div>
    <div class="col-md-6 mt-4">
        <button wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem" class="btn btn-success {{ $quantity == 0 ? 'disabled' : '' }}">Agregar al carrito de compras</button>
    </div>
</div>
