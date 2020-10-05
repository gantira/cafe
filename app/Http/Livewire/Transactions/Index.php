<?php

namespace App\Http\Livewire\Transactions;

use App\Exports\TransactionsExport;
use App\Models\Order;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    public $readyToLoad = false;

    public function loadTransactions()
    {
        $this->readyToLoad = true;
    }

    public function export()
    {
        $data = Order::get();

        return Excel::download(new TransactionsExport($data), "Transaksi.xlsx");
    }

    public function render()
    {
        return view('livewire.transactions.index', [
            'transactions' => $this->readyToLoad
                ? Order::latest()->get()
                : [],
        ]);
    }
}
