<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Manrope&display=swap" rel="stylesheet">
    <title>Booking successful</title>
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 16px;
        }
        main {
            width: 50%;
            margin: 20px auto;
        }
        .logo {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
        }
        .name {
            font-size: 20px;
            margin-bottom: 5px;
        }
        .change {
            background-color: #0077CC;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            margin: 15px;
        }
        div {
            margin-bottom: 10px;
        }
        .reservation {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .reservation p {
            color: #888888;
        }
        .info {
            margin-top: 30px;
        }
        .review {
            margin-top: 30px;
            background-color: #E9F0FA;
            border: solid 0.1px #CCE1FF;
            width: 100%;
            padding: 10px;
        }
        .cancel {
            background-color: #0AB21B;
            padding: 15px;
            color: white;
            border: none;
            border-radius: 5px;
            margin-left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
<main>
    <div class="logo">
{{--        <img src="{{ asset('images/logo.png') }}" alt="check" width="300" height="50">--}}
    </div>
    <section>
        <div>
{{--            <img src="{{ asset('images/check.png') }}" alt="check" width="20" height="20">--}}
            <span>
                <Strong class="name">
                    Thanks {{ auth()->guard('api')->check()?auth()->guard('api')->user()->name:$contact_person }}, Your booking was successful
                </Strong>
            </span>
        </div>
        <div>
            <h1>Your Booking Reference Number: {{ $bookingNumber }}</h1>
            <img src="{{ asset('images/tick.png') }}" alt="check" width="15" height="15">
            <span><strong>{{ $hotelData['Hotel']['HotelName'] }} </strong>Hotel is expecting you on {{ $hotelData['Hotel']['checkInDate'] }}</span>
        </div>
{{--        <div>--}}
{{--            <img src="tick.png" alt="check" width="15" height="15">--}}
{{--            <span>Your payment will be handled by Semiramis Hotel. The "Payment" section below has more details</span>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <img src="tick.png" alt="check" width="15" height="15">--}}
{{--            <span>Make changes to your booking or ask the property a question in just a few clicks</span>--}}
{{--        </div>--}}
{{--        <small>Easily make changes online to all your bookings by <a href="#">creating a password.</a></small>--}}
{{--        <br>--}}
{{--        <button class="change">Make changes to your booking</button>--}}
    </section>
    <section>
        <h2 class="hotel-name">{{ $hotelData['Hotel']['HotelName'] }}</h2>
        <p class="address">{{ $hotelData['Hotel']['HotelAddress'] }}</p>
        <p><strong>Phone : </strong>{{ $hotelData['Hotel']['HotelPhone'] }}</p>
{{--        <a href="#">Email-Property</a>--}}
        <br>
        <br>
        @if($hotelData['Hotel']['images'] != '' && count($hotelData['Hotel']['images']) != 0)
        <img src="{{ $hotelData['Hotel']['images'][0] }}" alt="{{ $hotelData['Hotel']['HotelName'] }}" height="300" width="100%">
        @endif
    </section>
    <section class="info">
        <div class="reservation">
            <strong>Check-In</strong>
            <p>{{ $hotelData['Hotel']['checkInDate'] }}</p>
        </div>
        <hr>
{{--        <div class="reservation">--}}
{{--            <strong>Check-Out</strong>--}}
{{--            <p>{{ $hotelData['Hotel']['CheckOutDate'] }}</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Breakfast</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Launch</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Dinner</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Booking number</strong>--}}
{{--            <p>{{ $bookingNumber }}</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>PIN Code</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
        <div class="reservation">
            <strong>Booked by</strong>
            <p>{{ auth()->guard('api')->check()?auth()->guard('api')->user()->name:$contact_person }}
                (<a href="#">{{ auth()->guard('api')->check()?auth()->guard('api')->user()->email:$email }}</a>)</p>
        </div>
    </section>
    @foreach($hotelData['HotelRooms'] as $room)
        <section class="review">
            <h2>{{ $room->roomName }}</h2>
            <div class="reservation">
                <strong>Meal </strong>
                <strong>{{ $room->meal }}</strong>
            </div>
            <div class="reservation">
                <strong>Price  </strong>
                <strong>${{ number_format($room->rateSummary->totalFare,2) }}</strong>
            </div>
{{--            <p>Under Egyptian law all foreign guests must pay in a foreign currency, not in Egyptian currency.--}}
{{--                Egyptian citizens are required to pay in the local currency according to the exchange rate at the time of payment.--}}
{{--            </p>--}}
            @if(! empty($room->supplements))
                @foreach($room->supplements as $supplement)
                    <p>
                        {{ $supplement->type }}
                        <br>
                        {{ $supplement->name }}
                        <br>
                        {{ $supplement->chargeType }}
                        <br>
                        {{ $supplement->currencyCode }}
                         {{ $supplement->price }}
                    </p>
                @endforeach
            @endif
{{--            <p>Please note: additional supplements (e.g. extra bed) are not added to this total.</p>--}}
            <p>The price includes fees such as tax and service charges.</p>
{{--            <p>If you don't show up or cancel, applicable taxes may still be charged by the property.</p>--}}
        </section>
    @endforeach
    <section>
        <h2>Hotel Policies</h2>
            @foreach($hotelData['Hotel']['hotelPolicies'] as $policy)
                <p>{{ $policy }}</p>
            @endforeach
    </section>
    <section>
        <h2>Cancellation Policies</h2>
        @foreach($hotelData['cancellationPolicies'] as $policy)
            <div>
                <p>From: {{ $policy->fromDate }}  To: {{ $policy->toDate }}  Amount:
                    {{ ($policy->chargeType == 'Percentage') ? '%' : $policy->currency }} {{ $policy->cancellationCharge }}</p>
            </div>
        @endforeach

        <h2>Total Amount</h2>
        <div class="reservation">
            <h3>{{ is_null($redeemPoints) ? '$ '.number_format($totalAmount,2) : '(You spent '.$redeemPoints.' points)' }}</h3>
        </div>
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Lorem.</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <hr><div class="reservation">--}}
{{--            <strong>Lorem.</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Lorem.</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <h2>Need help with your booking ?</h2>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Lorem.</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="reservation">--}}
{{--            <strong>Lorem.</strong>--}}
{{--            <p>Lorem, ipsum.</p>--}}
{{--        </div>--}}
    </section>
</main>
</body>
</html>
