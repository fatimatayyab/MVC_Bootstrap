<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
    <title>Form Design!</title>
  </head>
  <body>
    <div class="container-fluid bg-dark text-light py-3">
        <header class="d-flex justify-content-between align-items-center">
            <h1 class="display-6 px-4">Dashboard</h1>
            
            <!-- Buttons Container -->
            <div class="px-4">
            <a href="<?=ROOT?>/orderwithuserinfo" class="btn btn-light me-2">View Orders with User Info</a>
                <a href="<?=ROOT?>/read" class="btn btn-light me-2">View All Customers</a>
                <a href="<?=ROOT?>/add" class="btn btn-light">Add New Customer</a>
            </div>
        </header>
    </div>
  </body>
</html>
