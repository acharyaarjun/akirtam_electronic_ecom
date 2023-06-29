<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Order has been Successfully Placed!</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #fff;
            min-width: 100vw;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 8px 8px #ccc;
            width: 600px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .card .logo {
            text-align: center;
        }

        .card .logo img {
            height: 50px;
        }

        .card .name {
            margin: 20px 0;
        }

        .card .name h3 {
            font-weight: 600;
        }

        .card .heading {
            margin-bottom: 20px;
        }

        .card .heading p {
            font-weight: 100;
        }

        .card .credentials {
            margin-bottom: 20px;
        }

        .card .credentials span {
            color: blue;
            font-weight: bold;
        }

        .card ol {
            margin: 5px 0px 20px 30px;
        }

        .card .link {
            margin-bottom: 20px;
        }

        .card .link a {
            color: blue;
        }

        .card .button {
            text-align: center;
            margin-bottom: 20px;
        }

        .card .button a {
            background-color: #0e82fd;
            padding: 10px 20px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            text-transform: capitalize;
        }

        .card .thanks {
            margin-bottom: 20px;
            /* font-weight: bold; */
        }

        .card .thanks span {
            font-weight: bold;
            color: #0e82fd;
        }

        .card .copyright {
            text-align: center;
        }

        .card .copyright a {
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="logo">
            <img src="http://127.0.0.1:8000/site/image/logo.png" alt="AKIRTAM" title="AKIRTAM LOGO" />
        </div>
        <div class="name">
            <h3>Hello, {{ $name }}</h3>
        </div>
        <div class="heading">
            <p>
                Your order has been successfully placed, wait until our confirmation.
                Please keep this mail safely all your details of your orders is in
                here.
            </p>
        </div>
        <div class="credentials">
            <h2>Here the details of your orders:</h2>
            <br />
            <b>Order Code: </b> <span>#{{ $order_code }}</span> <br />
            <b>Order Date: </b> <span>{{ $order_date }}</span> <br />
            <br />
            <b>Order Items: </b>
            {!! $order_items !!}

            <b><b>Total: </b> <span>Rs. {{ $total_price }}</span> </b> <br />
            <b><b>Shipping Charge: </b> <span>Rs. {{ $shipping_charge }} (all over Nepal)</span> </b>
            <br />
            <b><b>Grand Total: </b> <span>Rs. {{ $grand_total }}</span> </b> <br />
        </div>

        <div class="button">
            <a href="#">view website</a>
        </div>

        <div class="thanks">
            <p>
                Thank You,<br />
                <span>AKIRTAM</span>
            </p>
        </div>

        <div class="copyright">
            <p>&copy; 2023 <a href="">AKIRTAM</a> All rights reserved.</p>
        </div>
    </div>
</body>

</html>
