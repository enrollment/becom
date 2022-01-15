<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
            <h5 class="mb-3 mt-2 uppercase text-primary">Datos personales:</h5>
            <div class="mt-3 mb-5 card p-4">
                <div class="mb-3">
                    <label for="contact" class="form-label">Nombre</label>
                    <input wire:model.defer="contact" type="text" class="form-control" id="contact"
                        placeholder="Ingrese su nombre">
                    @if ($errors->has('contact'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('contact') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input wire:model.defer="phone" type="text" class="form-control" id="phone"
                        placeholder="Ingrese un teléfono de contacto">
                    @if ($errors->has('phone'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif

                </div>
            </div>

            <div x-data="{envio_type: @entangle('envio_type')}"> {{-- Envios --}}

                <h5 class="mb-3 mt-2 uppercase text-primary">Envío:</h5>
                <div class="mt-3 card p-3">
                    <div class="form-check">
                        <input x-model="envio_type" class="form-check-input" value="1" type="radio" name="envio_type"
                            id="recogidaTienda">
                        <div class="row">
                            <div class="col-9">
                                <label class="form-check-label" for="recogidaTienda">
                                    Recoger en tienda
                                </label>
                            </div>
                            <div class="col-3 text-end">
                                <p class="text-success">Gratis</p>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('envio_type'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('envio_type') }}
                        </div>
                    @endif
                </div>

                <div class="mt-3 card p-3">
                    <div class="form-check">
                        <input x-model="envio_type" class="form-check-input" value="2" type="radio" name="envio_type"
                            id="envioDomicilio">
                        <label class="form-check-label" for="envioDomicilio">
                            Envío a domicilio
                        </label>
                    </div>
                    @if ($errors->has('envio_type'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('envio_type') }}
                        </div>
                    @endif

                    <div class="hidden" :class="{'d-block' : envio_type == 2}"> {{-- Formulario --}}

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="department" class="mb-2 form-label">Departamento</label>
                                <select wire:model="department_id" class="form-select" name="department"
                                    id="department">
                                    <option value="" selected disabled>Selecciona un departamento</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('department_id') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="city" class="mb-2 form-label">Ciudad</label>
                                <select wire:model="city_id" class="form-select" name="city" id="city">
                                    <option value="" selected disabled>Selecciona una ciudad</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city_id'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('city_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-md-6">
                                <label for="district" class="mb-2 form-label">Distrito</label>
                                <select wire:model="district_id" class="form-select" name="district" id="district">
                                    <option value="" selected disabled>Selecciona un departamento</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('district_id'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('district_id') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="form-label">Dirección</label>
                                <input wire:model="address" type="text" class="form-control" id="address"
                                    placeholder="Ingrese su dirección">
                                @if ($errors->has('address'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <label for="references" class="form-label">Referencia</label>
                        <input wire:model="references" type="text" class="form-control mb-2" id="reference"
                            placeholder="¿Cuál es la referencia?">
                        @if ($errors->has('references'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('references') }}
                            </div>
                        @endif

                    </div> {{-- END Formulario --}}
                </div>
            </div>

            <button wire:loading.attr="disabled" wire:target="create_order" class="mt-5 mb-4 btn btn-success" wire:click="create_order">Continuar con la compra</button>

            <hr>

            <p class="mt-3 text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores officia
                quasi quas explicabo nihil quisquam. Autem ducimus at officia illum, rerum esse molestias reprehenderit
                accusantium unde ipsa aliquid fugit! <a class="text-danger" href="#">Políticas y privacidad</a></p>



        </div>
        <div class="col-md-4">
            <h5 class="mb-3 mt-2 uppercase text-primary">Productos:</h5>
            <div class="mt-3 mb-5 card p-4">

                @foreach (Cart::content() as $item)
                    <div class="mb-2 mt-1">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="py-2" src="{{ $item->options->image }}" height="260px"
                                    width="125px" alt="...">
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
                    </div>
                    <hr class="{{ $loop->last ? 'mb-2' : '' }}">
                @endforeach
                <div class="row mt-4">
                    <div class="col-8">
                        <p>Subtotal</p>
                    </div>
                    <div class="col-4 text-end">
                        <p>${{ Cart::subtotal() }}</p>
                    </div>
                </div>
                <div class="row mt-2 mb-4">
                    <div class="col-8">
                        <p>Envío</p>
                    </div>
                    <div class="col-4 text-end">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            <p>Gratis</p>
                        @else
                            <p>${{ $shipping_cost }}</p>
                        @endif
                        
                    </div>
                </div>

                <hr>

                <div class="row mt-4">
                    <div class="col-8">
                        <p class="font-bold">Total</p>
                    </div>
                    <div class="col-4 text-end">
                        @if ($envio_type == 1)
                            <p>${{ Cart::subtotal() }}</p>
                        @else
                            <p>${{ Cart::subtotal() + $shipping_cost }}</p>
                        @endif
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
