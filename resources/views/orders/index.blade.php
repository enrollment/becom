<x-app-layout>
    <div class="container">

        <section class="row mt-5">
                
                <div class="col-md-2">
                    <a href="{{ route('orders.index') }}">
                        <div class="card" style="background-color: #a3a9fd">
                            <div class="card-body text-center">
                                <i class="far fa-credit-card mt-3"></i>
                                <h5 class="text-uppercase mt-3 mb-3">Mis ordenes</h5>
                                <p class="mb-3">{{ $ordenes }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-2">
                    <a href="{{ route('orders.index') . "?status=1" }}">
                        <div class="card" style="background-color: #dcdcdc">
                            <div class="card-body text-center">
                                <i class="fas fa-business-time mt-3"></i>
                                <h5 class="text-uppercase mt-3 mb-3">Pendientes</h5>
                                    <p class="mb-3">{{ $pendiente }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            
                <div class="col-md-2">
                    <a href="{{ route('orders.index') . "?status=2" }}">
                        <div class="card" style="background-color: #9efffa">
                            <div class="card-body text-center">
                                <i class="far fa-credit-card mt-3"></i>
                                <h5 class="text-uppercase mt-3 mb-3">Recibidas</h5>
                                <p class="mb-3">{{ $recibido }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            

                <div class="col-md-2">
                    <a href="{{ route('orders.index') . "?status=3" }}">
                        <div class="card" style="background-color: #ffea95">
                            <div class="card-body text-center">
                                <i class="fas fa-truck mt-3"></i>
                                <h5 class="text-uppercase mt-3 mb-3">Enviadas</h5>
                                <p class="mb-3">{{ $enviado }}</p>
                            </div>
                        </div>
                    </a>
                </div>
          

                <div class="col-md-2">
                    <a href="{{ route('orders.index') . "?status=4" }}">
                        <div class="card" style="background-color: #8fffa2">
                            <div class="card-body text-center">
                                <i class="far fa-check-circle mt-3"></i>
                                <h5 class="text-uppercase mt-3 mb-3">Entregadas</h5>
                                <p class="mb-3">{{ $entregado }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            
                <div class="col-md-2">
                    <a href="{{ route('orders.index') . "?status=5" }}">
                        <div class="card" style="background-color: #ff9a9a">
                            <div class="card-body text-center">
                                <i class="far fa-times-circle mt-3"></i>
                                <h5 class="text-uppercase mt-3 mb-3">Anuladas</h5>
                                <p class="mb-3">{{ $anulado }}</p>
                            </div>
                        </div>
                    </a>
                </div>
           
        </section>

        <hr class="my-5">
        
        <section class="card p-4" style="max-width: 500px">
            <h1 class="uppercase pt-2">Pedidos recientes</h1>
            <hr class="mt-3">
                <div class="mt-4">
                    @foreach ($orders as $order)
                        <a href="{{ route('orders.show', $order) }}">
                        <div class="row mb-2">
                            <div class="col-1">
                                    <span>
                                        @switch($order->status)
                                            @case(1)
                                                <i class="fas fa-business-time mt-3" style="color: #dcdcdc"></i>
                                                @break
                                            @case(2)
                                                <i class="far fa-credit-card  mt-3" style="color: #9efffa"></i>
                                                @break
                                            @case(3)
                                                <i class="fas fa-truck" style="color: #ffea95"></i>
                                                @break
                                            @case(4)
                                                <i class="far fa-check-circle" style="color: #8fffa2"></i>
                                                @break
                                            @case(5)
                                                <i class="far fa-times-circle" style="color: #ff9a9a"></i>
                                                @break
                                            @default
                                        @endswitch
                                    </span>
                            </div>
                            <div class="col-7">
                                <p>Order: {{ $order->id }}</p>
                                <p>{{ $order->created_at->format('d/m/y') }}</p>
                            </div>
                            <div class="col-4 text-end">
                                <p class="font-bold">
                                    @switch($order->status)
                                    @case(1)
                                        Pendiente
                                        @break
                                    @case(2)
                                        Recibido
                                        @break
                                    @case(3)
                                        Enviado
                                        @break
                                    @case(4)
                                        Entregado
                                        @break
                                    @case(5)
                                        Anulado
                                        @break
                                    @default
                                @endswitch
                                </p>
                                <p>${{ $order->total }}</p>
                            </div>
                        </div>
                        </a>
                    @endforeach
                    
                </div>
        </section>




    </div>


</x-app-layout>