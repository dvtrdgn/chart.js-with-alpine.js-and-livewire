<div
wire:ignore
x-data="{

    selectedYear:@entangle('selectedYear'),
    thisYearOrders:@entangle('thisYearOrders'),
    lastYearOrders:@entangle('lastYearOrders'),

    init() {
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'Jul'
        ];

        const data = {
            labels: labels,
            datasets: [{
                    label: 'Lat year order',
                    backgroundColor: 'lightgray',
                    borderColor: 'rgb(255, 99, 132)',
                    data: this.lastYearOrders,
                },
                {
                    label: 'This year order',
                    backgroundColor: 'lightgreen',
                    borderColor: 'rgb(255, 99, 132)',
                    data: this.thisYearOrders,
                },
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            this.$refs.canvas,
            config
        );
        Livewire.on('updateTheChart', ()=>{
            console.log('updated');
            myChart.data.datasets[0].data = this.lastYearOrders;
            myChart.data.datasets[1].data = this.thisYearOrders;
            myChart.update();
        })
    }
}">
    <span>Year</span>
    <select name="selectedYear" id="selectedYear" wire:model="selectedYear" wire:change="updateOrdersCount">
        @foreach ($availableYears as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
    <div>
        Selected Year <span x-text="selectedYear"></span>
    </div>
    <div class="my-6">
        <div>Last Year: {{ array_sum($lastYearOrders) }}</div>
        <div>This Year: {{ array_sum($thisYearOrders) }}</div>
    </div>
    <canvas id="myChart" x-ref="canvas"></canvas>
</div>
