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
            <div class="d-flex align-items-center" style="width: 1450px; margin: 5px">
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <div id="navbar-search-autocomplete" class="form-outline d-flex flex-direction-column"
                        style="width: 500px">
                        <input type="search" class="form-control" name="query" placeholder="Search" />
                        <button type="submit" class="btn btn-primary"
                            style="background-color: aliceblue; color: #ffff; border: 2px solid #ffff">
                            <i class="fas fa-search" style="color: black"></i>
                        </button>
                    </div>
                </form>



                <div class="container ms-3" style="display: flex; justify-content: flex-end; ">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link" style="color: white; text-decoration: none;">
                            <i class="fas fa-sign-out-alt me-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- search/logout --}}
    </header>

    <main>
        {{-- Bên phải --}}
        <div style="float: right; width: 33%; flex-direction: column; margin-top: 10px; color: #ffffff; height: 600px">
            <div style="display: flex; align-items:flex-start; flex-direction: column; height: 80%">
                <div style="display: flex; flex-direction: row; width: 100%">
                    <p style="color: black; width: 100%; margin: 10px">Total amount</p>
                    <p id="total-amount" style="color: black; width: 90%; margin: 10px; display: flex; justify-content: flex-end">{{ number_format($totalPrice, 0) }}</p>
                </div>

                <div style="display: flex; flex-direction: row; width: 100%">
                    <b style="color: black; width: 100%; margin: 10px">Customer pays</b>
                    <input id="total-amount-paid" type="number" class="form-control">
                </div>

                <div style="display: flex; flex-direction: row; width: 100%">
                    <b style="color: black; width: 100%; margin: 10px">Excess money to pay</b>
                    <p id="change" style="color: black; width: 90%;margin: 10px; display: flex; justify-content: flex-end">{{ number_format(session('total_amount_to_be_returned', 0), 0) }}</p>
                </div>
            </div>

            <div class="d-grid gap-3">
                <a href="{{ route('export-pdf') }}" class="btn btn-primary btn-block">PAY</a>
            </div>
            
                       
        </div>

        {{-- Bên phải --}}


        {{-- Bên trái --}}
        <div
            style="float: left; width: 65%; flex-direction: column; margin-top: 10px; margin-left: 10px; color: #ffffff; height: 600px">
            < style="width: 100%; height: 10%;">
                <div style="display: flex; flex-direction: row; width: 100%">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <form action="{{ route('delete.product', ['productId' => $product['id']]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="id"
                                            value="{{ $product['id'] }}">
                                        <td>{{ $product['id'] }}</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>${{ $product['price'] }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </form>

                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            
            function updateChange() {
                
                var totalAmountPaid = parseFloat($('#total-amount-paid').val()) || 0;
          
                var totalPrice = parseFloat('{{ $totalPrice }}');
    
                var change = Math.max(totalAmountPaid - totalPrice, 0);

                $('#change').text(change.toFixed(2)); 
            }
    
            
            $('#total-amount-paid').on('input', updateChange);
        });
    </script>
    
    
</html>
