<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ChartOrders extends Component
{
    public $selectedYear;
    public $thisYearOrders;
    public $lastYearOrders;


    public function mount()
    {
        $this->selectedYear = date('Y');
        $this->updateOrdersCount();
    }

    public function updateOrdersCount()
    {
        $this->thisYearOrders = Order::GetYearOrder($this->selectedYear)
            ->GroupByMonth();

        $this->lastYearOrders = Order::GetYearOrder($this->selectedYear - 1)
            ->GroupByMonth();
            $this->emit('updateTheChart');
    }
    public function render()
    {
        $availableYears = [
            date('Y'), date('Y') - 1, date('Y') - 2, date('Y') - 3
        ];
        return view('livewire.chart-orders', ['availableYears' => $availableYears]);
    }
}
