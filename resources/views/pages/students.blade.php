@extends('templates.base')

@section('content')
<div class="">
   <div class="flex justify-between my-3">
      <h1 class="text-4xl content-center">Students</h1>

      <!-- button modal -->
      <button type="button" class="btn btn-primary mx-3"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="resetModal()">
         Add
      </button>
   </div>

   <div id="student_list" class="flex flex-wrap gap-3 justify-between mt-3" hx-get="/api/students" hx-trigger="load" hx-swap="innerHTML">

   </div>

</div>

<script>
   function resetModal() {

      document.getElementById('first_name_error').innerHTML = '';
      document.getElementById('last_name_error').innerHTML = '';
      document.getElementById('birth_date_error').innerHTML = '';
      document.getElementById('address_error').innerHTML = '';
      document.getElementById('addProductMessage').innerHTML = '';
      
   }
</script>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
               <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Student</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="" 
               hx-post="/api/students"
               hx-trigger="submit"
               hx-target="#student_list"
               hx-swap="innerHTML"
               hx-on::after-request="this.reset()"
         >
         @csrf
            <div class="modal-body">
               
               <div class="mb-3">
                  <label for="first_name" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" >
                  <div id = "first_name_error" hx-swap-oob="true"> </div>
               </div>

               <div class="mb-3">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" >
                  <div id = "last_name_error" hx-swap-oob="true"> </div>
               </div>

               <div class="mb-3">
                  <label for="birth_date" class="form-label">Birth Date</label>
                  <input type="date" class="form-control" id="birth_date" name="birth_date" ></input>
                  <div id = "birth_date_error" hx-swap-oob="true"> </div>
               </div>

               <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" >
                  <div id = "address_error" hx-swap-oob="true"> </div>
               </div>

            </div>

            <div id="addProductMessage" hx-swap-oob="true">
            </div>

            <div class="modal-footer">
               
               <button type="submit" class="btn btn-primary" >Add</button>

               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" 

               >Close</button>

            </div>
         </form>
      </div>
   </div>
</div>
@endsection