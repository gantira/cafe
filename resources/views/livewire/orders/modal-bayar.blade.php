<div class="modal text-monospace" id="modal-bayar" tabindex="-1" role="dialog" data-overlay-dismissal-disabled="true"
    data-esc-dismissal-disabled="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" role="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
            <h5 class="modal-title text-center">{{ env('APP_NAME') }}</h5>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <div>
                        <div>No. {{ $order['id'] }}</div>
                        <div>TGL. {{ $order['created_at'] }}</div>
                    </div>
                    <div>
                        <div>OP: SARI</div>
                        <div>PL: CASH</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                @foreach (collect($order['orderdetails']) as $key => $item)
                    <div class="d-flex">
                        <div class="mr-20 align-text-top">{{ $key + 1 }}</div>
                        <div class="flex-grow-1 ">
                            {{ $item->product->nama }} <br>
                            <div class="d-flex justify-content-between">
                                <div>{{ rupiah($item->product->harga) }} x</div>
                                <div>{{ $item->qty }}</div>
                                <div>{{ rupiah($item->subtotal) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <div class="d-flex text-right">
                    <div class="w-three-quarter">Subtotal :</div>
                    <div class="w-quarter">{{ rupiah($this->subtotal) }}</div>
                </div>
                <div class="d-flex text-right">
                    <div class="w-three-quarter">Diskon :</div>
                    <div class="w-quarter">0</div>
                </div>
                <div class="d-flex text-right">
                    <div class="w-three-quarter">Pajak :</div>
                    <div class="w-quarter">{{ rupiah($this->pajak) }}</div>
                </div>
                <div class="d-flex text-right">
                    <div class="w-three-quarter">Total :</div>
                    <div class="w-quarter">{{ rupiah($this->total) }}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="Pembayaran">Pembayaran</label>
                <div class="d-flex ">
                    @foreach ($payments as $item)
                        <div class="custom-radio d-inline-block mr-10">
                            <input type="radio" wire:model="payment_id" id="{{ $item->id }}" value="{{ $item->id }}">
                            <label for="{{ $item->id }}">{{ $item->nama }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <div class="custom-radio d-inline-block mr-10">
                        <input type="radio" wire:model="nominal" id="Uang Pas" value="0" >
                        <label for="Uang Pas">Uang Pas</label>
                    </div>
                    <div class="custom-radio d-inline-block">
                        <input type="radio" wire:model="nominal" id="50000" value="50000">
                        <label for="50000">{{ rupiah(50000) }}</label>
                    </div>
                    <div class="custom-radio d-inline-block">
                        <input type="radio" wire:model="nominal" id="100000" value="100000">
                        <label for="100000">{{ rupiah(100000) }}</label>
                    </div>
                    <div class="custom-radio d-inline-block">
                        <input type="radio" wire:model="nominal" id="200000" value="200000">
                        <label for="200000">{{ rupiah(200000) }}</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="d-flex text-right">
                    <div class="w-three-quarter">Kembalian :</div>
                    <div class="w-quarter">{{ rupiah($this->kembali) }}</div>
                </div>
            </div>

            <div class="text-right mt-20">
                <!-- text-right = text-align: right, mt-20 = margin-top: 2rem (20px) -->
                <a class="btn mr-5" role="button" onclick="halfmoon.toggleModal('modal-bayar')">Close</a>
                <button class="btn btn-primary" role="button" wire:click="bayar" {{ $this->active }}>BAYAR</button>
            </div>
        </div>
    </div>
</div>
