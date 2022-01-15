<div class="container py-5">
    <div class="card p-4">
        <h5 class="py-3 uppercase text-success font-bold"><i class="me-2 fas fa-shopping-cart"></i>Carrito de compra</h5>

        @if (Cart::count())
        <table class="table align-middle">
            <thead>
              <tr class="uppercase">
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach (Cart::content() as $item)
                <tr>
                    <th scope="row">
                        <div class="d-flex">
                            <img class="img-fluid" height="100px" width="100px" src="{{ $item->options->image }}" alt="">
                            <div class="ps-4 pt-2">
                                <h5 class="mb-2">{{ $item->name }}</h5>
                                <p class="text-secondary">
                                    @isset($item->options['color'])
                                    Color: {{__($item->options->color) }}
                                    @endisset  

                                    @isset($item->options['size'])
                                    | Talla: {{__($item->options->size) }}
                                    @endisset  
                                </p>
                            </div>
                        </div>
                    </th>
                    <td>${{ $item->price }}</td>
                    <td>
                        @if($item->options->size)
                            @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                        @elseif($item->options->color)
                            @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                        @else
                            @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                        @endif
                    </td>
                    <td>${{ $item->qty * $item->price }}</td>
                    <td>
                      <button wire:click="delete('{{ $item->rowId }}')" type="button" class="btn">
                        <i class="text-danger fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>

          <div>
            <button wire:click="destroy" class="btn btn-danger mt-3"><i class="me-2 fas fa-trash"></i> Eliminar carrito de compra actual</button>
          </div>
        @else
            <h5 class="mt-3">No tiene ningún item en el carrito de compra</h5>

            <div class="mt-5">
                <a class="btn btn-secondary" href="/"><i class="me-2 fas fa-angle-double-left"></i>Volver al inicio</a>
              </div>
        @endif
        
    </div>  
    
    @if(Cart::count())
        <div class="card mt-5 p-4">
            <div class="row">
                <div class="col-6">
                    <h5 class="mt-2 uppercase font-bold">Total: ${{ Cart::subtotal() }}</h5>
                </div>
                <div class="col-6 text-end">
                    <a class="btn btn-success" href="{{ route('orders.create') }}">Continuar <i class="ms-2 fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    @endif

</div>
