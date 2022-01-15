<x-app-layout>
    
    <div class="container py-5">


        <div class="row mt-3 mb-5">
            <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn {{ ($order->status >= 2 && $order->status != 5) ? 'js-active' : '' }}" type="button" title="Recibido">Pedido recibido</button>
                <button class="multisteps-form__progress-btn {{ ($order->status >= 3 && $order->status != 5) ? 'js-active' : '' }}" type="button" title="Enviado">Pedido enviado</button>
                <button class="multisteps-form__progress-btn {{ ($order->status >= 4 && $order->status != 5) ? 'js-active' : '' }}" type="button" title="Entregado">Pedido entregado</button>
            </div>
        </div>


        <div class="mt-5 card p-3">
            <h5 class="uppercase">Número de orden: <span class="text-primary">OID-{{ $order->id }}</span> </h5>
        </div>

        

        <div class="row">
            <div class="col-md-6">
                <div class="mt-3 card p-3">
                    <h5 class="mt-2 mb-3 uppercase text-primary">Resumen de compra</h5>

                    @foreach ($items as $item)
                        <div class="mb-2 mt-2">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img class="py-2" src="{{ $item->options->image }}" height="260px"
                                        width="125px" alt="...">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="text-primary card-title">{{ $item->name }}</h5>
                                        <div>
                                            <div class="row">
                                                <div class="col-6">
                                                    @isset($item->options->color)
                                                        <p class="card-text">Color: {{ __($item->options->color) }}
                                                        </p>
                                                    @endisset
                                                </div>
                                                <div class="col-6">
                                                    @isset($item->options->size)
                                                        <p class="card-text">Talla: {{ __($item->options->size) }}
                                                        </p>
                                                    @endisset
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="card-text">Qty: {{ $item->qty }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="card-text">Price: ${{ $item->price }}</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <div class="mt-3 card py-3 px-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mt-2 mb-3 uppercase text-primary">Datos de contacto</h5>
                            <p>Nombre: <span class="text-primary">{{ $order->contact }} </span></p>
                            <p>Teléfono: <span class="text-primary">{{ $order->phone }} </span></p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mt-2 mb-3 uppercase text-primary">Datos de envío</h5>
                            @if ($order->envio_type == 1)
                                <p class="text-secondary mb-2">Recoger en tienda</p>
                                <p>Dirección de nuestra tienda: <span class="text-primary">Calle Falsa 123</span></p>
                            @else
                                <p class="text-secondary mb-2">Envío a domicilio</p>
                                <p>Dirección: <span class="text-primary">{{ $order->address }}</span></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Referencia: <span class="text-primary">{{ $order->references }}</span></p>
        
                                    </div>
                                    <div class="col-md-6">
                                        <p>Departamento: <span class="text-primary">{{ $order->department->name }}</span>
                                        </p>
        
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Ciudad: <span class="text-primary">{{ $order->city->name }}</span></p>
        
                                    </div>
                                    <div class="col-md-6">
                                        <p>Distrito: <span class="text-primary">{{ $order->district->name }}</span></p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>



</x-app-layout>
    