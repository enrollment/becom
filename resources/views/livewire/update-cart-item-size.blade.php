<div x-data>
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
