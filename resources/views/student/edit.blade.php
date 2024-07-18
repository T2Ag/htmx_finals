
<div class="mt-4 w-full flex justify-center " id="EditPage">
    <div class="w-[100vh] bg-white rounded shadow-md p-3 mt-10">
        <h1 class="text-3xl ">Edit</h1>
        <span class="italic">Let's edit your student</span>

        <form class="mt-6"  hx-put="/api/students/{{$student->id}}"
                            hx-target="#student_list"
                            hx-swap="innerHTML"
                            method="POST">
            @csrf
            
                <div class="mb-2">
                    <label for="first_name" class="text-xl">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="w-full p-2 rounded bg-gray-300 text-black font-bold" value="{{$student->first_name}}">
                </div>

                <div class="mb-2">
                    <label for="last_name" class="text-xl">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="w-full p-2 rounded bg-gray-300 text-black font-bold" value="{{$student->last_name}}">
                </div>
                
                <div class="mb-3">
                  <label for="birth_date" class="form-label">Birth Date</label>
                  <input type="date" id="birth_date" name="birth_date" class="w-full p-2 rounded bg-gray-300 text-black font-bold"  value="{{$student->birth_date}}"></input>
               </div>

               <div class="mb-3">
                  <label for="address" class="form-label">Birth Date</label>
                  <input type="text" id="address" name="address" class="w-full p-2 rounded bg-gray-300 text-black font-bold"  value="{{$student->address}}"></input>
               </div>

            <footer class="flex items-center">

                <div class="flex-1">
                    <a hx-get="/api/students" href="#" class="bg-green-600 rounded text-white px-3 py-2.5">Back</a>
                </div>

                <div >
                    <button class="bg-blue-600 text-white p-2  rounded hover:bg-blue-500 transition ease-linear duration-150s" type="submit">Edit Student</button>
                </div>
            </footer>
        </form>
    </div>
</div>
