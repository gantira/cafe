<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 p-5 animate " wire:click="$emit('{{ $emitName }}', {{ $product->id }})">
    <div>
        <img src="{{ $product->foto_preview }}" class="img-fluid w-full" alt="image">
        <div class="text-break ">
            {{ $product->nama }}
        </div>
    </div>
</div>
