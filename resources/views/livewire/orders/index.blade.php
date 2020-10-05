<div>
    @section('styles')
        <style>
            .animate {
                transition: transform .4s;
            }

            .animate:hover {
                transform: scale(1.1);
                z-index: 1;
            }

        </style>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <!-- Column with the main content -->
            <div class="col-lg-9">
                <div class="d-flex flex-wrap">
                    @foreach ($this->products as $product)
                        <livewire:orders.product-list :product="$product" :key="$product->id" :emitName="'cartAdd'">
                    @endforeach
                </div>
            </div>
            <!-- Column with the side content -->
            <div class="col-12 col-lg-3 border-left h-full">
                <div class="row m-5 ">
                    <div class="col">
                        <div class="form-group">
                            <livewire:orders.cart :emitName="'cartUpdate'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
