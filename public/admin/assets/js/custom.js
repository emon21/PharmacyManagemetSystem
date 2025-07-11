

// # Sweet alert js code
$(document).ready(function() {
   $('.delete-medicine').on('click', function(e) {
       e.preventDefault();
       var form = $(this).closest('form');
       Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
       }).then((result) => {
           if (result.isConfirmed) {
               form.submit();
           }
       });
   });
});
// # Sweet alert js code for delete medicine stock
$(document).ready(function() {
   $('.delete-medicine-stock').on('click', function(e) {
       e.preventDefault();
       var form = $(this).closest('form');
       Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
       }).then((result) => {
           if (result.isConfirmed) {
               form.submit();
           }
       });
   });
});



@if(session('success'))
   Swal.fire({
       icon: 'success',
       title: 'Success',
       text: '{{ session('success') }}',
       showConfirmButton: false,
       timer: 1500
   });
@endif





// # switch case
       switch (session('type')) {
         case 'success':
           toastr.success("{{ session('message') }}");
           break;
         case 'error':
           toastr.error("{{ session('message') }}");
           break;
         case 'info':
           toastr.info("{{ session('message') }}");
           break;
         case 'warning':
           toastr.warning("{{ session('message') }}");
           break;
         default:
           toastr.info("{{ session('message') }}");
}
       
// # Toastr notification
// $(document).ready(function() {
//     @if(session('message'))
//         toastr.{{ session('type') }}("{{ session('message') }}");
//     @endif
// });
// // # Toastr notification for delete medicine stock
// $(document).ready(function() {
//     @if(session('message'))
//         toastr.{{ session('type') }}("{{ session('message') }}");
//     @endif
// });




// # Delete

function deleteConfirm(id) {
   Swal.fire({
       title: 'Are you sure?',
       text: "You won't be able to revert this!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
       if (result.isConfirmed) {
           document.getElementById('delete-form-' + id).submit();
       }
   })
}