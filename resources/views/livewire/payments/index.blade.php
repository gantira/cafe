<div>
    <div class="container-fluid">
        <!-- First comes a content container -->
        <div class="content">
            @if (session()->has('alert'))
                <x-alert :type="session('alert')['type']" :title="session('alert')['title']"
                    :message="session('alert')['message']" :icon="session('alert')['icon']"/>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-20">
                <h1 class="content-title font-size-22">
                    Payment
                </h1>
                <div>
                    <a href="{{ route('payments.create') }}" class="btn btn-primary">Tambah Payment</a>
                </div>
            </div>
            <hr>
        </div>
        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Payment Metode</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->payments as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="{{ route('payments.edit', $item->id) }}">Edit</a>
                                <a class="pointer" wire:click="destroy({{ $item }})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
