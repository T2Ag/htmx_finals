<table class="w-full bg-white shadow-md rounded-lg overflow-hidden mt-3">
    <thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="py-3 px-4 text-left">Account ID</th>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Section</th>
            <th class="py-3 px-4 text-left">Remarks</th>
            <th class="py-3 px-4 text-center">...</th>
            <th class="py-3 px-4 text-center">...</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accounts as $account)
        <tr class="border-b hover:bg-gray-100">
            <td class="py-3 px-4">{{$account->id}}</td>
            <td class="py-3 px-4">{{$account->student->first_name}} {{$account->student->last_name}}</td>
            <td class="py-3 px-4">{{$account->section}}</td>
            <td class="py-3 px-4">{{$account->remarks}}</td>
            <td class="py-3 px-4 text-center">
                <button
                    hx-delete="/api/accounts/{{$account->id}}"
                    hx-swap="innerHTML"
                    hx-target="#account_list"
                    class="text-red-500 hover:text-red-700 mr-2"
                >
                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0' />
                    </svg>
                </button>
                <button
                    hx-get="/accounts/{{$account->id}}/edit"
                    hx-target="#account_list"
                    hx-swap="innerHTML"
                    class="text-blue-500 hover:text-blue-700"
                >
                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10' />
                    </svg>
                </button>

            </td>
            <td class="text-center align-center">
                <button
                    hx-get="/accounts/{{$account->id}}/show"
                    hx-target="body"
                    hx-swap="innerHTML"
                    class="text-blue-500 hover:text-blue-700 "
                >
                    Transaction
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<div id="student_id_error" hx-swap-oob="true"></div>
<div id="section_error" hx-swap-oob="true"></div>
<div id="remarks_error" hx-swap-oob="true"></div>

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-500 text-white text-center p-4">
        <h3>Account Added</h3>
    </div>
</div>