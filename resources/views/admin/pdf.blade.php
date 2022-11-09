
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
</head>
<body>
        <h1>Order Details</h1>
    Name::<h3>{{$order->user_name}}</h3>
  Email::  <h3>{{$order->email}}</h3>
  Address::  <h3>{{$order->address}}</h3>
 Phone::   <h3>{{$order->phone}}</h3>
  Product Name::  <h3>{{$order->product_name}}</h3>
  Price::  <h3>${{$order->price}}</h3>
  Quantity::  <h3>{{$order->quantity}}</h3>
 Payment Status::   <h3>{{$order->payment_status}}</h3>
   Delivery::status <h3>{{$order->delivery_status}}</h3>
  Image :: <h3><img id="example" src="storage/{{$order->image}}" alt=" " class="img-responsive" height="150px" width="150px"></h3>
</body>
</html>
