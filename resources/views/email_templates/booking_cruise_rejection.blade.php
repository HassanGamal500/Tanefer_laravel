<!DOCTYPE html>
<html>
<head>
    <title>Reject Booking Cruise</title>
</head>
<body>
    
    <h1>Reject Booking Cruise</h1>

    <p>Dear MR: {{ $username }},</p>
    <p>Greetings from Memphis Tours! I’m Maged Mahmoud from the Sales Department, and it will be my pleasure to be your personal tour consultant.</p>
    
    @php
    $startDate = \Carbon\Carbon::parse($startDate); // Replace with your actual start date
    $endDate = $startDate->copy()->addDays($cruiseData->number_of_nights); // Replace 3 with your actual duration
    @endphp

    <p>Regarding your request, kindly find below an offer from {{ $startDate->format('d M') }} to {{ $endDate->format('d M Y') }}:</p>

    {!! $cruiseData->description !!}

    <p><strong>Accommodation</strong></p>
    <p>Nile Cruise: Salacia Nile Cruise</p>
    <p>Rate DBL (main deck): 20,150 EGP Per Person In Cruise (Valid for Egyptian only)</p>

    <p>The above is an offer, and there is no space booked.</p>

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
    
    <p>Waiting for your response to act accordingly.</p>
</body>
</html>