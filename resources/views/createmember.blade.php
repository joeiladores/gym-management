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

  <div class="container m-5 p-5">
    <h1 class="fw-bold">Gym Members</h1>
    <div class="d-flex flex-lg-row flex-column justify-content-between">
      <p>Create New Member</p>
      <p><a href="{{ route('index') }}" class="btn btn-primary btn-small">← Back</a></p>
    </div>

    <div class="card py-5 px-4 mt-3">
      <form method="POST" action="{{ route('storemember') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="memtype" class="form-label">Membership Type</label>
          <input type="text" class="form-control" id="memtype" name="memtype" required>
        </div>
        <div class="mb-3">
          <label for="memexp" class="form-label">Membership Expiration</label>
          <input type="datetime-local" class="form-control" id="memexp" name="memexp" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>   

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>