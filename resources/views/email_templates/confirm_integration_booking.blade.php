<!DOCTYPE html>
<html>
<head>
    <title>Confirm Booking</title>
</head>
<body>
    <h1>Confirm Booking</h1>

    <p>Dear, {{ $username }}</p>
    <p>Greating from tanefer team</p>
    <p>You have been booked successfully in ({{ $hotelName }})</p>
    <p>Your confirmation code is ({{ $codeNumber }})</p>
    <p>Check In ({{ $startDate }})</p>
    <p>Check Out ({{ $endDate }})</p>
    <p>Number of Adults ({{ $adults }})</p>
    <p>Number of Children ({{ $children }})</p>
    <p>Thanks ,</p>
    <p>Tanefer team</p>
</body>
</html>