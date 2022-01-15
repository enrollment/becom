<div x-data>

    <h5 class="text-primary uppercase">Stock disponible: 
        <span>
            @if ($quantity)
                ({{ $quantity }})
            @else
                ({{ $product->stock }})
            @endif
        </span>
    </h5>

    <div class="mt-3">
        <label for="size" class="mb-2 form-label">Talla</label>
        <select wire:model="size_id" class="form-select" name="size" id="size">
            <option value="" selected disabled>Selecciona una talla</option>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-3">
        <label for="color" class="mb-2 form-label">Color</label>
        <select wire:model="color_id" class="form-select" name="color" id="color">
            <option value="" selected disabled>Selecciona un color</option>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{__($color->name) }}</option>
            @endforeach
        </select>
    </div>

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
