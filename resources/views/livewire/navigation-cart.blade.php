<li class="nav-item dropdown ms-5">
    <a class="nav-link dropdown-toggle" href="#" id="dropdownProfile" role="button"
        data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
        <i style="font-size: 1.5rem" class="fas fa-shopping-cart"></i>

        @if(Cart::count())
            <span class="badge bg-danger rounded-pill">{{ Cart::count() }}</span>
        @else
            <span class="badge bg-danger rounded-pill"></span>
        @endif
    </a>

   

    <ul class="dropdown-menu dropdown-menu-end" style="width: 400px;" aria-labelledby="dropdownProfile">
        @forelse (Cart::content() as $item)
            <li class="mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class="ps-4 pt-3" src="{{ $item->options->image }}" height="260px" width="125px" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="text-primary card-title">{{ $item->name }}</h5>
                            <div>
                                <div class="row">
                                    <div class="col-6">
                                        @isset($item->options['color'])
                                        <p class="card-text">Color: {{ __($item->options->color) }}</p>
                                        @endisset
                                    </div>
                                    <div class="col-6">
                                        @isset($item->options['size'])
                                        <p class="card-text">Talla: {{ __($item->options->size) }}</p>
                                        @endisset
                                    </div>
                                </div>              
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">Qty: {{ $item->qty }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text">${{ $item->price }}</p>
                                    </div>
                                </div>                 
                                
                            </div>
                         
                        </div>
                      </div>
                    </div>
            </li>
            <hr>
            
        @empty
            <li class="text-center"><span class="dropdown-item-text text-secondary">No tiene agregado ningún item en el carrito</span></li>
        @endforelse

        @if(Cart::count())
        <div class="row mb-2">
            <div class="col-6">
                <p class="uppercase px-4 pb-2 pt-3 text-success">Total: $ <span>{{ Cart::subtotal() }}</span></p>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-success mt-2 me-3" href="{{ route('shopping-cart') }}">Carrito de compras</a>
            </div>
        </div>
        @endif
    </ul>


    
</li>