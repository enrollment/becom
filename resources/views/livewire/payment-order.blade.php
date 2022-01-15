<div>
   
    <div class="container py-5">
        <div class="mt-3 card p-3">
            <h5 class="uppercase">Número de orden: <span class="text-primary">OID-{{ $order->id }}</span> </h5>
        </div>

        <div class="mt-3 card p-3">
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
                    <h5 class="mt-2 mb-3 uppercase text-primary">Acerca del pago</h5>
                           
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <img src="{{ asset('img/logo-stripe.png') }}" height="200px" width="200px" alt="">
                        </div>
                        <div class="col-md-9">

                            <div class="row text-end">
                                <div class="col-4">
                                    <p class="uppercase mb-2">Subtotal</p>
                                    <p class="text-primary">${{ $order->total - $order->shipping_cost }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="uppercase mb-2">Envío</p>
                                    <p class="text-primary">${{ $order->shipping_cost }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="font-bold uppercase mb-2">Total</p>
                                    <p class="font-bold text-primary">${{ $order->total }}</p>
                                </div>
                             </div>
                        </div>
                    </div>
                    <div id="paypal-button-container" class="text-end mt-4 ">
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

    @push('script')

        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"></script>

        <script>
            paypal.Buttons({
    
            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                purchase_units: [{
                    amount: {
                    value: '{{ $order->total }}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                    }
                }]
                });
            },
    
            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                    
                    Livewire.emit('payOrder');
                    
                    /* console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details'); */
    
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // var element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
            }).render('#paypal-button-container');
    
    </script>

    @endpush

    
</div>
