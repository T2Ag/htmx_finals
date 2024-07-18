<div>
   <h2 class="text-2xl font-semibold mb-3">Payments</h2>
      <div class="overflow-x-auto">
         <table class="min-w-full bg-white border border-gray-300">
            <thead>
                  <tr>
                     <th class="py-2 px-4 border-b">Date</th>
                     <th class="py-2 px-4 border-b">Amount</th>
                     <th class="py-2 px-4 border-b">Remaining Balance</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach($account->payments as $payment)
                  <tr>
                     <td class="py-2 px-4 border-b">{{ $payment->datetime }}</td>
                     <td class="py-2 px-4 border-b">${{ number_format($payment->amount, 2) }}</td>
                     <td class="py-2 px-4 border-b">${{ number_format($payment->remaining_balance, 2) }}</td>
                  </tr>
                  @endforeach
            </tbody>
         </table>
      </div>
</div>