<div>
    <div class="container-fluid">
        <!-- First comes a content container -->
        <div class="content ">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="content-title font-size-22">
                    Tambah Produk
                </h1>
                <a href="{{ route('products') }}" class="btn">Batal</a>
            </div>
            <hr>
        </div>
        <div class="content">
            <div class="row ">
                <div class="col-12 col-lg-6">
                    <form wire:submit.prevent="submit">
                        <div class="form-group">
                            <label for="Nama Produk" class="required">Nama Produk</label>
                            <input wire:model.defer="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror @error('nama') is-invalid @enderror"
                                id="Nama Produk" placeholder="Nama Produk">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Kategori" class="">Kategori</label>
                            <select class="form-control @error('category_id') is-invalid @enderror"
                                wire:model.defer="category_id">
                                <option value=""></option>
                                @foreach ($this->categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Harga" class="required">Harga</label>
                            <input wire:model.defer="harga" type="text"
                                class="form-control @error('harga') is-invalid @enderror" id="Harga"
                                placeholder="Harga">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Satuan Stok" class="">Satuan Stok</label>
                            <input wire:model.defer="satuan" type="text"
                                class="form-control @error('satuan') is-invalid @enderror" id="Satuan Stok"
                                placeholder="Satuan Stok">
                            @error('satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Deskripsi Produk" class="">Deskripsi Produk</label>
                            <textarea wire:model.defer="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror" id="Deskripsi Produk"
                                placeholder="Berikan deskripsi produk."></textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group @error('foto') is-invalid @enderror">
                            <label for="Foto Produk" class="custom-control-label ">Foto Produk</label>
                            <div class="position-relative">
                                @if ($foto)
                                    <img src="{{ $foto->temporaryUrl() }}" class="w-200">
                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSVYFJoiQl5YPHK2xiOHeyplhJWUpFZT4m0vw&usqp=CAU"
                                        class="w-200">
                                @endif
                            </div>
                            <div class="custom-file mx-5">
                                <input wire:model.defer="foto" type="file" id="Foto Produk" accept=".jpg,.png">
                                <label for="Foto Produk">Choose Foto Produk</label>
                                <div wire:loading wire:target="foto">Uploading...</div>
                            </div>

                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group mt-5">
                            <input class="btn btn-primary btn-block" type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


</div>
