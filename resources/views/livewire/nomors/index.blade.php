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
                    Nomor
                </h1>
                <div>
                    <a href="{{ route('nomors.create') }}" class="btn btn-primary">Tambah Nomor</a>
                </div>
            </div>
            <hr>
        </div>
        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->nomors as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->label }}</td>
                            <td>
                                <a href="{{ route('nomors.edit', $item->id) }}">Edit</a>
                                <a class="pointer" wire:click="destroy({{ $item }})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
