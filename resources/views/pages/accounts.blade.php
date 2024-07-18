@extends('templates.base')

@section('content')
<div class="">
   <div class="flex justify-between my-3">
      <h1 class="text-4xl content-center">Account</h1>

      <!-- button modal -->
      <button type="button" class="btn btn-primary mx-3"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="resetModal()">
         Add Account
      </button>
   </div>

   <div id="account_list" class="flex flex-wrap gap-3 justify-between mt-3" hx-get="/api/accounts" hx-trigger="load" hx-swap="innerHTML">

   </div>

</div>

<script>
   function resetModal() {
        document.getElementById('student_id_error').innerHTML = '';
        document.getElementById('section_error').innerHTML = '';
        document.getElementById('remarks_error').innerHTML = '';

        document.getElementById('addProductMessage').innerHTML = '';
   }
</script>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
               <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Account</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="" 
               hx-post="/api/accounts"
               hx-trigger="submit"
               hx-target="#account_list"
               hx-swap="innerHTML"
               hx-on::after-request="this.reset()"
         >
         @csrf
            <div class="modal-body">
               
               <div class="mb-3">
                  <label for="student_id" class="form-label">Student</label>
                  <select class="form-select" id="student_id" name="student_id">
                     <option selected disabled>Select a student</option>
                     @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                     @endforeach
                  </select>
                  <div id="student_id_error" hx-swap-oob="true"></div>
               </div>

               <div class="mb-3">
                    <label for="section" class="form-label">Section</label>
                    <input type="text" class="form-control" id="section" name="section" >
                    <div id = "section_error" hx-swap-oob="true"> </div>
                </div>

                <div class="mb-3">
                    <label for="remarks" class="form-label">Remarks</label>
                    <input type="text" class="form-control" id="remarks" name="remarks" >
                    <div id = "remarks_error" hx-swap-oob="true"> </div>
                </div>

            </div>

            <div id="addProductMessage" hx-swap-oob="true">
            </div>

            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Add</button>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection