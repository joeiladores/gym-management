<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gym Management</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }
  </style>

</head>

<body>

  <div class="container-md py-5">
    <h1 class="fw-bold">Gym Members</h1>
    <div class="d-flex flex-lg-row flex-column justify-content-between">
      <h5>List of Gym Members</h5>      
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMemberModal">+ New Member</button>
    </div>

    @if( session('success') )
    <div class="alert alert-success my-3" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive my-3">
      <table class="table table-hover">
        <thead class="bg-secondary bg-gradient text-light fw-bold">
          <tr>
            <td>Member ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Membership Type</td>
            <td>Membership Expiration</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          @if(count($members) > 0)
          @foreach($members as $member)
          <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->membership_type }}</td>
            <td>{{ $member->membership_expiration }}</td>
            <td>
              <a class="btn btn-sm" href="#">🖊️</a>
              <a class="btn btn-sm" href="#">❌</a>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="6" class="p-3 text-center">There are no members yet in the database.</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>    

    <!-- Create Member Modal -->
    <div class="modal modal-lg fade" id="createMemberModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Member</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card py-3 px-4 border-0">
              <form method="POST" action="{{ route('storemember') }}">
                @csrf
                <div class="mb-3">
                  <label for="createmember_name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="createmember_name" required>
                </div>
                <div class="mb-3">
                  <label for="createmember_email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="createmember_email" required>
                </div>
                <div class="mb-3">
                  <label for="createmember_memtype" class="form-label">Membership Type</label>
                  <input type="string" class="form-control" name="membership_type" id="createmember_memtype" required>
                </div>
                <div class="mb-3">
                  <label for="createmember_memexp" class="form-label">Membership Expiration</label>
                  <input type="date" class="form-control" name="membership_expiration" id="createmember_memexp" required>
                  <input type="hidden" name="id" id="id"">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script>



  </script>

</body>

</html>