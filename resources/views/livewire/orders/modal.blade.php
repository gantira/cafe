<div class="modal" id="modal-order" tabindex="-1" role="dialog" wire:ignore.self>

    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <a href="#" class="close" role="button" aria-label="Close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </a>
            <div class="container text-break">
                <h5 class="modal-title">{{ $product['nama'] }}</h5>
                <img src="{{ $product['foto_preview'] }}" alt="image" class="img-fluid rounded text-warning">
                @if ($product['deskripsi'])
                    <div class="border rounded p-10 overflow-x-hidden overflow-y-scroll h-150">
                        {{ $product['deskripsi'] }}
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center p-20">
                    <div class="font-size-24">
                        Rp{{ rupiah($product['harga']) }}
                    </div>
                    <div class="">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-default" @if (!$this->product_qty)
                                    disabled @endif type="button" wire:click="decrement">-</button>
                            </div>
                            <input type="text" name="tes" class="form-control w-50 text-muted text-center"
                                placeholder="Input" wire:model.defer="product_qty" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-default" type="button" wire:click="increment">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan <small class="text-muted">optional</small></label>
                    <textarea class="form-control" placeholder="{{ $this->eg }}"
                        wire:model.defer="product_catatan"></textarea>
                </div>

            </div>
            <div class="text-right mt-20">
                @if ($this->product_qty)
                    <button class="btn btn-primary btn-block btn-lg" type="button" wire:click="update">Update Basket -
                        {{ rupiah($this->subtotal) }}</button>
                @else
                    <button class="btn btn-danger btn-block btn-lg" type="button" wire:click="update">Remove</button>
                @endif
            </div>
        </div>
    </div>
</div>
