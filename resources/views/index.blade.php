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
    <h1 class="fw-bold">Members</h1>
    <div class="d-flex flex-lg-row flex-column justify-content-between">
      <h5>List of Gym Members</h5>
      <p><a href="#" class="btn btn-primary btn-small">+ Add New Member</a></p>
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

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>