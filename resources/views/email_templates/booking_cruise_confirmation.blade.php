<!DOCTYPE html>
<html>
<head>
    <title>Confirm Booking</title>
</head>
<body>
    
    <h1>Confirm Booking</h1>

    <p>Dear MR: {{ $username }},</p>
    <p>Greetings from Tanefer Team! I’m from the Sales Department, and it will be my pleasure to be your personal tour consultant.</p>
    
    @php
    $startDate = \Carbon\Carbon::parse($startDate); // Replace with your actual start date
    $endDate = $startDate->copy()->addDays($cruiseData->number_of_nights); // Replace 3 with your actual duration
    @endphp

    <p>Regarding your request, kindly find below an offer from {{ $startDate->format('d M') }} to {{ $endDate->format('d M Y') }}:</p>

    {!! $cruiseData->description !!}

    <p><strong>Children Policy</strong></p>
    <ul>
        @foreach($cruiseData->policies as $policy)
        <li>{{ $policy }}</li>
        @endforeach
    </ul>

    <p><strong>Included</strong></p>
    <ul>
        @foreach($cruiseData->includes as $include)
        <li>{{ $include }}</li>
        @endforeach
    </ul>

    <p><strong>Excluded</strong></p>
    <ul>
        @foreach($cruiseData->excludes as $exclude)
        <li>{{ $exclude }}</li>
        @endforeach
    </ul>

    <p><strong>NB:</strong> Above Offer, availability might be changed until we proceed with confirmation.</p>
    
    <p>Waiting for your response to act accordingly.</p>
    
    <?php
        $paymentLink = 'https://api.tanefer.com/getPaymentPayFort';
        $paymentLink .= '?email=' . urlencode($email);
        $paymentLink .= '&bookingId=' . urlencode($bookId);
        $paymentLink .= '&price=' . urlencode($price);
        $paymentLink .= '&url=' . urlencode(route('confirm-booking'));
    ?>
    
    <!-- Styled button as a hyperlink -->
    <p>To confirm your booking, please proceed to the payment, please click</p>
    
    <a href="{{ $paymentLink }}" style="background-color: #4f3316; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">Proceed to Payment</a>
    
</body>
</html>