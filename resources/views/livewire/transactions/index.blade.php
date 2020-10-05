<div>
    <div class="container-fluid">
        <!-- First comes a content container -->
        <div class="content ">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="content-title font-size-22">
                    Transaksi
                </h1>
            </div>
            <hr>
            <button wire:click="export">Export</button>
        </div>
        <div class="content">
            <!-- Collapse group -->
            <div class="collapse-group mw-full">
                <div wire:loading>
                    Processing Transaction...
                </div>
                <div wire:init="loadTransactions">
                    @foreach ($transactions as $item)
                        <details class="collapse-panel">
                            <summary class="collapse-header ">
                                <div class="d-flex justify-content-between">
                                    <strong>Order No. {{ $item->nomor->nama }} </strong>
                                    <strong>{{ $item->created_at }} </strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div><span class="text-muted">Customer: {{ $item->nama }}</span></div>
                                    <div class="text-muted">{!! $item->paid_status !!}</div>
                                </div>
                            </summary>
                            <div class="collapse-content">
                                <table class="table table-sm">
                                    @foreach ($item->orderdetails as $item)
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <img src="{{ $item->product->foto_preview }}" alt="foto"
                                                    class="img-fluid w-25 mr-5">
                                                {{ $item->product->nama }}
                                            </td>
                                            <td>{{ $item->qty }}x</td>
                                            <td class="text-right">{{ rupiah($item->harga) }}</td>
                                            <td class="text-right">{{ rupiah($item->subtotal) }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>
