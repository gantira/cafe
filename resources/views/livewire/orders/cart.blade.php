<div class="px-5">
    @if ($this->cart)
        <form wire:submit.prevent="submit">
            <!-- Radio -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nomor</span>
                    </div>
                    <select class="form-control @error('nomor_id') is-invalid @enderror" wire:model.defer="nomor_id">
                        <option value="" selected="selected"></option>
                        @foreach ($this->nomors as $item)
                            <option value="{{ $item->id }}" @if ($item->status_filled)
                                disabled
                        @endif>
                        {{ $item->nama }}
                        {{ $item->label }}
                        </option>
    @endforeach
    @error('nomor_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    </select>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Mr/Mrs"
        wire:model.defer="nama">
</div>
</div>

<!-- Select -->
<div class="form-group">
    <select class="form-control @error('jenis') is-invalid @enderror" id="area-of-specialization" wire:model="jenis">
        <option value="Dine in">Dine in</option>
        <option value="Take away">Take away</option>
    </select>
    @error('jenis')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<!-- Multi-select -->
<div class="form-group">
    @foreach ($this->cart as $item)
        <div class="d-flex py-10 align-items-center ">
            <div>
                <a class="btn btn-sm"
                    wire:click="$emit('edit', {{ $item['product_id'] }}, '{{ $emitName }}')">{{ $item['product_qty'] }}x</a>
            </div>
            <div class="flex-grow-1 ml-10 text-wrap">
                <div>{{ $item['product_nama'] }}</div>
                <div class="font-size-12">
                    <div class="text-muted ">{{ $item['product_catatan'] }}</div>
                    <div class="mt-5"><a wire:click="$emit('edit', {{ $item['product_id'] }}, '{{ $emitName }}')"
                            class="text-decoration-none pointer">Edit</a></div>
                </div>
            </div>
            <div class="text-muted">{{ rupiah($item['product_subtotal']) }}</div>
        </div>
    @endforeach

    <div class="d-flex text-muted mb-5 mt-10">
        <div class="flex-grow-1">Subtotal</div>
        <div>Rp{{ rupiah($this->subtotal) }}</div>
    </div>
    <div class="d-flex text-muted  mb-5">
        <div class="flex-grow-1">Diskon</div>
        <div>Rp{{ rupiah($this->diskon) }}</div>
    </div>
    <div class="d-flex text-muted  mb-5">
        <div class="flex-grow-1">Pajak</div>
        <div>Rp{{ rupiah($this->tax) }}</div>
    </div>
    <div class="d-flex font-size-16 ">
        <div class="flex-grow-1">Total</div>
        <div>Rp{{ rupiah($this->total) }}</div>
    </div>
</div>

<div class="form-group">
    <div class="btn-group btn-group w-full" role="group" aria-label="Large button group" disabled>
        <button class="btn" type="submit" @if ($jenis == 'Take away') disabled @endif><i class="fa fa-floppy-o" aria-hidden="true"></i> SIMPAN</button>
        <button class="btn" type="button" wire:click="clearCart"><i class="fa fa-trash-o" aria-hidden="true"></i>
            HAPUS</button>
    </div>
</div>
<div class="form-group">
    <button class="btn btn-lg btn-block btn-primary">BAYAR</button>
</div>
</form>
@else
<i class="fa fa-arrow-left" aria-hidden="true"></i>
Silahkan Pesan
<hr>


@foreach ($this->dineinwithnomor as $item)
    @if ($loop->first)
        <p>Daftar Dine In </p>
    @endif

    <div class="dropdown dropleft with-arrow ">
        <button class="btn align-items-center mb-5" data-toggle="dropdown" type="button" id="" aria-haspopup="true"
            aria-expanded="false">
            <i class="fa fa-angle-left mr-5" aria-hidden="true"></i> {{ $item->nomor->nama }}
        </button>
        <div class="dropdown-menu" aria-labelledby="">
            <h6 class="dropdown-header"> {{ $item->nomor->nama }} {{ $item->nama }}</h6>
            <div class="dropdown-divider"></div>
            <a href="{{ route('orders.edit', $item->id) }}" class="dropdown-item">Tambah</a>
            <div class="dropdown-divider"></div>
            <div class="dropdown-content">
                <button class="btn btn-block" type="button" wire:click="$emit('bill',{{ $item->id }})">BILL</button>
            </div>
        </div>
    </div>
@endforeach


@endif

</div>
