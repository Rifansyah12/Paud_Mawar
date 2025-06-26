<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin - Paud Mawar</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    rel="stylesheet"
  />

  <style>
    /* CSS seperti yang sudah kamu buat */
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }
    .wrapper {
      display: flex;
      height: 100vh;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
      width: 100%;
    }
    .card {
      border-radius: 10px;
    }
    .sidebar {
  width: 250px;
  background-color: #343a40; /* warna gelap */
  color: white;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  padding: 20px;
  overflow-y: auto;
}

.sidebar a {
  color: white;
  display: block;
  padding: 10px 0;
  text-decoration: none;
}

.sidebar a.active,
.sidebar a:hover {
  background-color: #495057;
  color: #fff;
}

.sidebar .dropdown-toggle {
  cursor: pointer;
}

.sidebar .collapse a {
  padding-left: 30px;
}

  </style>
</head>
<body>
  <div class="wrapper">
    @include('admin.layouts.sidebar')
    <div class="content">
      @yield('content')
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
