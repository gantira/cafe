<div>
    <div class="container-fluid">
        <!-- First comes a content container -->
        <div class="content ">
            @if (session()->has('alert'))
                <x-alert :type="session('alert')['type']" :title="session('alert')['title']"
                    :message="session('alert')['message']" :icon="session('alert')['icon']"/>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-20">
                <h1 class="content-title font-size-22">
                    Produk
                </h1>
                <div>
                    <a href="{{ route('categories') }}" class="btn">Tambah Kategori</a>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
                </div>
            </div>
            <hr>
        </div>
        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->products as $item)
                        <tr>
                            <td class="d-flex align-items-center">
                                <img src="{{ $item->foto_preview }}" alt="image" class="img-fluid w-50 mr-10">
                                {{ $item->nama }}
                            </td>
                            <td>{{ $item->category->nama }}</td>
                            <td>{{ rupiah($item->harga) }}</td>
                            <td>
                                <a href="{{ route('products.edit', $item->id) }}">Edit</a>
                                <a class="pointer" wire:click="destroy({{ $item }})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
