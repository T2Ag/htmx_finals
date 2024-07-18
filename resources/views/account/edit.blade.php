
<div class="mt-4 w-full flex justify-center " id="EditPage">
    <div class="w-[100vh] bg-white rounded shadow-md p-3 mt-10">
        <h1 class="text-3xl ">Edit</h1>
        <span class="italic">Let's edit your account</span>

        <form class="mt-6"  hx-put="/api/accounts/{{$account->id}}"
                            hx-target="#account_list"
                            hx-swap="innerHTML"
                            method="POST">
            @csrf
            
            <div class="mb-2">
                <label for="student_id" class="text-xl">Student</label>
                <select id="student_id" name="student_id" class="form-select w-full p-2 rounded bg-gray-300 text-black font-bold">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $account->student_id == $student->id ? 'selected' : '' }}>
                            {{ $student->first_name }} {{ $student->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="section" class="text-xl">Section:</label>
                <input type="text" name="section" id="section" class="w-full p-2 rounded bg-gray-300 text-black font-bold" value="{{$account->section}}">
            </div>

            <div class="mb-2">
                <label for="remarks" class="text-xl">Rsemarks:</label>
                <input type="text" name="remarks" id="remarks" class="w-full p-2 rounded bg-gray-300 text-black font-bold" value="{{$account->remarks}}">
            </div>

            <footer class="flex items-center">

                <div class="flex-1">
                    <a hx-get="/api/accounts" href="#" class="bg-green-600 rounded text-white px-3 py-2.5">Back</a>
                </div>

                <div >
                    <button class="bg-blue-600 text-white p-2  rounded hover:bg-blue-500 transition ease-linear duration-150s" type="submit">Edit Account</button>
                </div>
            </footer>
        </form>
    </div>
</div>
