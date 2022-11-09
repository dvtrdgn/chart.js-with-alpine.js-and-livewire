<x-layout>
    <div>
        <h2 class="bg-white rounded-md border my-8 px-6 py-6 mx-40">Charts</h2>
    

       
       @livewire('chart-orders')


    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    @endpush
</x-layout>
