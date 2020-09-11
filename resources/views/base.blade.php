<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel 7 & MySQL CRUD Tutorial</title>
  <link href="{{ asset('statics/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">MyContactBook</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts.create')}}">Add Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Contacts</h1>

      </div>
    </div>
  </div>
    @yield('main')
  </div>

  <script>
  
  function deleteData(id){
          // var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var CSRF_TOKEN = `{{ csrf_token() }}`;
              console.log(CSRF_TOKEN);
              $.ajax({
                  type: 'POST',
                  url: "{{url('contacts')}}/" + id,
                  data : {'_method' : 'DELETE', '_token' : CSRF_TOKEN },
               
                  success : function(data) {
                      // table1.ajax.reload();
                      swal({
                        title: "Delete Done!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "Done",
                      });
                      $("#row_"+id).remove();

                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          // text: data.message,
                          timer: '1500'
                      })
                  }
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
        }

  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script src="{{ asset('statics/js/jquery.slim.min.js') }}"></script> -->
  <script src="{{ asset('statics/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('statics/js/sweet-alert.js') }}"></script>
</body>
</html>
