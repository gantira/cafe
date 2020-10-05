<div>
    <div class="container-fluid">
        <!-- First comes a content container -->
        <div class="content ">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="content-title font-size-22">
                    Edit Payment Metode
                </h1>
                <a href="{{ route('payments') }}" class="btn">Batal</a>
            </div>
            <hr>
        </div>
        <div class="content">
            <div class="row ">
                <div class="col-12 col-lg-6">
                    <form wire:submit.prevent="submit">
                        <div class="form-group">
                            <label for="Nama Payment Method">Nama Payment Metode</label>
                            <input wire:model.defer="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="Nama Payment Method" placeholder="Nama Payment Method">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Deskripsi">Deskripsi</label>
                            <textarea wire:model.defer="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="Deskripsi" placeholder="Deskripsi" ></textarea>
                            @error('deskripsi')
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
