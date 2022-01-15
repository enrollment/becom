<x-app-layout>
    <div class="container py-5">

        @foreach ($categories as $category)
            <section>
                <div class="row">
                    <div class="col-6">
                        <h1 class="uppercase">{{ $category->name }}</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-secondary">Ver más <i class="ms-2 fas fa-angle-double-right"></i></a>
                    </div>
                </div>
               

                @livewire('category-products' , ['category' => $category])
            </section>
        @endforeach
       

    </div>
    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 4.5,
                    slidesToScroll: 4,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>
