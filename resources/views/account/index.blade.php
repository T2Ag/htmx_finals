@extends('templates.base')

@section('content')
<div class="container mx-auto my-10">

   
    <div class="flex justify-end space-x-4 mb-10">
      
      <div class="flex-1">
         <a hx-get="/accounts" hx-target="body" hx href="#" class="bg-green-600 rounded text-white px-3 py-2.5">Back</a>
      </div>

      <div>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chargeModal" onclick="resetModal()">
               Add Charge
         </button>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="resetModal()">
               Add Payment
         </button>
      </div>

    </div>

    <h1 class="text-3xl font-bold mb-5">{{ $account->student->first_name }} {{ $account->student->last_name }}</h1>

    <div class="flex">

         <!-- Charges Table -->
          <div id="charges-table" class="w-full md:w-1/2">
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
          </div>


        <!-- Payments Table -->
         <div id="payments-table" class="w-full md:w-1/2">
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
            
         </div>
    </div>
</div>

<!-- Charge Modal -->
<div class="modal fade" id="chargeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="chargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="chargeModalLabel">Add Charge</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" hx-post="/api/accounts/{{ $account->id }}/charges" hx-trigger="submit" hx-target="#charges-table" hx-swap="innerHTML" hx-on::after-request="this.reset()">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                    </div>
                </div>
                <div id="addProductMessage" hx-swap-oob="true"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="paymentModalLabel">Add Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" hx-post="/api/accounts/{{ $account->id }}/payments" hx-trigger="submit" hx-target="#payments-table" hx-swap="innerHTML" hx-on::after-request="this.reset()">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                    </div>
                </div>
                <div id="addProductMessage" hx-swap-oob="true"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
