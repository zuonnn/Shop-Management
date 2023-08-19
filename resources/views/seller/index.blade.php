    <!doctype html>
<html lang="en">

<head>
    <title>BÁN HÀNG</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <header>
{{-- search/logout --}}
  <div class="input-group ps-5" style="margin-top: 10px; background-color: rgb(57, 126, 237)">
    <form action="" method="GET">
    <div class="d-flex align-items-center" style="width: 1450px; margin: 5px">
      <div id="navbar-search-autocomplete" class="form-outline d-flex flex-direction-column" style="width: 500px">
          <input type="search" class="form-control" name="tukhoa" placeholder="Tìm hàng hóa" />
          <button type="button" class="btn btn-primary"
              style="background-color:aliceblue; color: #ffff; border: 2px solid #ffff">
              <i class="fas fa-search" style="color: black"></i>
          </button>
      </div>
      <div class="container ms-3" style="display: flex; justify-content: flex-end; ">
        <i class="fas fa-sign-out-alt me-2"></i>
      </div>
    </div>
    </form>
  </div>
{{-- search/logout --}}
    </header>

    <main>
{{-- Bên phải --}}
  <div style="float: right; width: 33%; flex-direction: column; margin-top: 10px; color: #ffffff; height: 600px">
    <div style = "display: flex; align-items:flex-start; flex-direction: column; height: 80%">
        <div class="input-group">
            <span class="input-group-text">Name</span>
            <input type="text" class="form-control" placeholder="Ten khach hang">
        </div>        
        <div style="display: flex; flex-direction: row; width: 100%">
            <p style="color: black; width: 100%; margin: 10px">Tổng tiền hàng</p>
            <p style="color: black; width: 90%;margin: 10px; display: flex; justify-content: flex-end">0 </p>    
        </div> 
       
        <div style="display: flex; flex-direction: row; width: 100%">
            <b style="color: black; width: 100%; margin: 10px">Khách thanh toán</b>
            <input type="text" class="form-control">    
        </div>
        
        <div style="display: flex; flex-direction: row; width: 100%">
            <b style="color: black; width: 100%; margin: 10px">Tiền thừa của khách</b>
            <p style="color: black; width: 90%;margin: 10px; display: flex; justify-content: flex-end">0 </p>    
        </div> 
    </div>

    <div class="d-grid gap-3">
        <button type="button" class="btn btn-primary btn-block">THANH TOAN</button>
    </div>
  </div>

{{-- Bên phải --}}
    

{{-- Bên trái --}}
  <div style="float: left; width: 65%; flex-direction: column; margin-top: 10px; margin-left: 10px; color: #ffffff; height: 600px">
    <div style="width: 100%; height: 10%;">
        <div style="display: flex; flex-direction: row; width: 100%">
            <p style="color: black; width: 100%">1</p>
            <p style="color: black; width: 100%">Sua Milo</p>
            <button type="button" class="btn btn-secondary">
                <i class="fas fa-minus"></i>
            </button>
            <p style="color: black; width: 100%; margin-left: 10%">10</p>
            <button type="button" class="btn btn-secondary">
                <i class="fas fa-plus"></i>
            </button>
            <p style="color: black; width: 100%; margin-left: 10%">8000 </p> 
            <button class="btn btn-danger">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
  </div>
{{-- Bên trái --}}
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</html>
