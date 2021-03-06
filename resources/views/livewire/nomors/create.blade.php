<div>
    <div class="container-fluid">
        <!-- First comes a content container -->
        <div class="content ">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="content-title font-size-22">
                    Tambah Nomor
                </h1>
                <a href="{{ route('nomors') }}" class="btn">Batal</a>
            </div>
            <hr>
        </div>
        <div class="content">
            <div class="row ">
                <div class="col-12 col-lg-6">
                    <form wire:submit.prevent="submit">
                        <div class="form-group">
                            <label for="Nama Table" class="required">Nama</label>
                            <input wire:model.defer="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror @error('nama') is-invalid @enderror"
                                id="Nama Table" placeholder="E.g. 1">
                            @error('nama')
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
