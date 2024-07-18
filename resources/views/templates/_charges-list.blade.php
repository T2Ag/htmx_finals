<div>
   <h2 class="text-2xl font-semibold mb-3">Charges</h2>
   <div class="overflow-x-auto">
      @foreach($account->charges as $charge)
      <div class="flex">
            <div class="w-[10rem] py-2 px-4 border-b">{{ $charge->title }}</div>
            <div class="w-[10rem] py-2 px-4 border-b">${{ number_format($charge->amount, 2) }}</div>
      </div>
      @endforeach
   </div>
   <h3 class="text-xl font-semibold mt-3">Total Charges: ${{ number_format($totalCharges, 2) }}</h3>
</div>