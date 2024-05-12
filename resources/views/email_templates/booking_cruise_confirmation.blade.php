<!DOCTYPE html>
<html>
<head>
    <title>Confirm Booking</title>
</head>
<body>
    
    <h1>Confirm Booking</h1>

    <p>Dear MR: {{ $username }},</p>
    <p>Greetings from Tanefer Team! I’m from the Sales Department, and it will be my pleasure to be your personal tour consultant.</p>
    
    <!--@php-->
    <!--$startDate = \Carbon\Carbon::parse($startDate); // Replace with your actual start date-->
    <!--$endDate = $startDate->copy()->addDays($cruiseData->number_of_nights); // Replace 3 with your actual duration-->
    <!--@endphp-->

    <!--<p>Regarding your request, kindly find below an offer from {{ $startDate->format('d M') }} to {{ $endDate->format('d M Y') }}:</p>-->

    <!--{!! $cruiseData->description !!}-->

    <!--<p><strong>Children Policy</strong></p>-->
    <!--<ul>-->
    <!--    @foreach($cruiseData->policies as $policy)-->
    <!--    <li>{{ $policy }}</li>-->
    <!--    @endforeach-->
    <!--</ul>-->

    <!--<p><strong>Included</strong></p>-->
    <!--<ul>-->
    <!--    @foreach($cruiseData->includes as $include)-->
    <!--    <li>{{ $include }}</li>-->
    <!--    @endforeach-->
    <!--</ul>-->

    <!--<p><strong>Excluded</strong></p>-->
    <!--<ul>-->
    <!--    @foreach($cruiseData->excludes as $exclude)-->
    <!--    <li>{{ $exclude }}</li>-->
    <!--    @endforeach-->
    <!--</ul>-->
    
    @if ($booking->model_ids == null && $booking->model_type == 'App\Models\Package')
        @php
            $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->start_date);
            $startDateFormat = \Carbon\Carbon::parse($booking->start_date);
            $lastDate = null;
        @endphp
        <div class="body">
            <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
            Package Name: {{ $package_name }}
            </h1><br />
            @foreach ($combinedList as $adventureCollection)
                @if(isset($adventureCollection['adventure_id']))
                    @if($adventureCollection['adventure_id'] !== 'null')
                        @php
                            $day_number = $adventureCollection['day_number'];
                            $package_city_id = $adventureCollection['package_city_id'];
                            $formattedDate = $currentDate->format('Y-m-d');
                            $formattedEndDate = $currentDate->copy()->addDays($day_number - 1)->format('Y-m-d');
                            $currentDate->addDay($day_number);
                            $adventure = $adventureCollection['adventure_id'];
                            $carbonStartTime = Carbon\Carbon::createFromFormat('H:i', $adventure->start_time);
                            $formattedStartTime = $carbonStartTime->format('h:i A');
                            $carbonEndTime = Carbon\Carbon::createFromFormat('H:i', $adventure->end_time);
                            $formattedEndTime = $carbonEndTime->format('h:i A');
                            $hotelData = \DB::table('gta_hotel_portfolios')->where('Jpd_code', $booking->hotel_jpcode)->first();
                            $lastDate = calculateAdventureDate($booking->start_date, $day_number);
                        @endphp
                        <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                            - {{ $adventure->title }}
                        </h1><br />
                        <h2 style="text-indent: 0pt;text-align: left;">
                            {{ $lastDate }}
                        </h2>
                        <p style="padding-top: 4pt;text-indent: 0pt;text-align: left;">
                            Start From {{ $formattedStartTime }} - {{ $formattedEndTime }}
                        </p><br />
                        <p class="s8" style="text-indent: 0pt;text-align: left;">overview:</p>
                        <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                            {!!$adventure->overview!!}
                        </p><br />
                        <p class="s8" style="text-indent: 0pt;text-align: left;">intro:</p>
                        <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                            {!!$adventure->intro!!}
                        </p><br />
                        <p class="s8" style="text-indent: 0pt;text-align: left;">itinerary:</p>
                        <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                            {!!$adventure->itinerary!!}
                        </p><br />
                        <p class="s8" style="text-indent: 0pt;text-align: left;">excludes:</p>
                        <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                            {{ str_replace(['[', ']'], '', $adventure->excludes) }}
                        </p><br />
                        <p class="s8" style="text-indent: 0pt;text-align: left;">includes:</p>
                        <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                            {{ str_replace(['[', ']'], '', $adventure->includes) }}
                        </p><br />
                    @else
                        @php
                            $day_number = $adventureCollection['day_number'];
                            $package_city_id = $adventureCollection['package_city_id'];
                            $formattedDate = $currentDate->format('Y-m-d');
                            $formattedEndDate = $currentDate->copy()->addDays($day_number - 1)->format('Y-m-d');
                            $currentDate->addDay($day_number);
                            $lastDate = calculateAdventureDate($booking->start_date, $day_number);
                        @endphp
                        <h2 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                            - Free Day
                        </h1><br />
                        <h2 style="text-indent: 0pt;text-align: left;">
                            {{ $lastDate }}
                        </h2><br />
                        <p style="padding-top: 4pt;text-indent: 0pt;text-align: left;">
                            Breakfast in your hotel and free day to relax and enjoy the river Nile
                        </p>
                    @endif
                @elseif (isset($adventureCollection['cruise_id']))
                    @php
                        $day_number = $adventureCollection['day_number'];
                        $package_city_id = $adventureCollection['package_city_id'];
                        $formattedDate = $currentDate->format('Y-m-d');
                        $formattedEndDate = $currentDate->copy()->addDays($day_number - 1)->format('Y-m-d');
                        $currentDate->addDay($day_number);
                        $cruise = $adventureCollection['cruise_id'];
                        //$endDateFormat = $startDateFormat->copy()->addDays($cruise->number_of_nights);
                        $startDateFormat = \Carbon\Carbon::parse($lastDate);
                        $startDateFormat = $startDateFormat->addDays(1);
                        $endDateFormat = $startDateFormat->copy()->addDays($cruise->number_of_nights - 2);
                    @endphp
                    <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                        - {{ $cruise->name }}
                    </h1><br />
                    <h2 style="text-indent: 0pt;text-align: left;">
                        from {{ $startDateFormat->format('d M') }} to {{ $endDateFormat->format('d M Y') }}
                    </h2>
                    <p class="s8" style="text-indent: 0pt;text-align: left;">Description:</p>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!! $cruise->description !!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">Children Policy:</p>
                    <ul>
                        @foreach($cruise->policies as $policy)
                        <li>{{ $policy }}</li>
                        @endforeach
                    </ul><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">cruise line:</p>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!!$cruise->cruise_line!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">ship name:</p>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!!$cruise->ship_name!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">excludes:</p>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {{ is_array($cruise->excludes) ? implode(', ', $cruise->excludes) : $cruise->excludes }}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">includes:</p>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {{ is_array($cruise->includes) ? implode(', ', $cruise->includes) : $cruise->includes }}
                    </p><br />
                @endif
            @endforeach
            
            @if($booking->hotel_jpcode != NULL)
            <p class="s8" style="text-indent: 0pt;text-align: left;">Accmmodation:</p>
            <p>Check In ({{ $hotelData->name }}) from (Check In {{ $booking->hotel_start_date }}) to (Check Out {{ $booking->hotel_end_date }}) </p>
            <p>Confirmation Code ({{ $booking->hotel_locator }})</p>
            @endif
        </div>
    @endif
    
    
    
    <p><strong>NB:</strong> Above Offer, availability might be changed until we proceed with confirmation.</p>
    
    <p>Waiting for your response to act accordingly.</p>
    
    @if($addtionalMessage)
    
    <p>{{ $addtionalMessage }}</p>
    
    @else
    
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
    
    @endif
    
</body>
</html>