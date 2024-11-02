<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package Details </title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        .logo {
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #CC9900;
            /* font-family: "Alverata Irregular W01 Bold", serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 18pt;
        }

        .h2, h2 {
            color: #CC9900;
            /* font-family: "Alverata Irregular W01 Bold", serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 16pt;
        }

        .p, p {
            color: black;
            /* font-family: "Alverata Irregular W01 Regular" , serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
            margin: 0pt;
        }

        .s2 {
            color: black;
            /* font-family:  "Alverata Irregular W01 Regular" , serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 11pt;
        }
        .s8 {
            color: #CC9900;
            /* font-family:  "Alverata Irregular W01 Regular" , serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
        }
        .s9 {
            color: #CC9900;
            /* font-family:  "Alverata Irregular W01 Regular" , serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 8pt;
        }

        h4 {
            color: black;
            /* font-family: "Alverata Irregular W01 Bold", serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        h3 {
            color: black;
            /* font-family: "Alverata Irregular W01 Bold", serif; */
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 14pt;
        }
        .body{
            padding: 0 10%
        }
        div,h1,h2,h3,h4,h5,h6,p,a,span,ul,li,ol,table{
            /* font-family: "Alverata Irregular W01 Bold", serif; */
            font-family: "Times New Roman", serif;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img height="185px" width="100%" src="{{ asset('images/logo-cover-2.png') }}" alt="Logo" style="display: block; margin: 0; position: relative; top: 0; left: 0;">
    </div>

    
        @if($booking->model_ids != null && $booking->model_type == 'App\Models\PackageActivity')
            @foreach ($combinedList as $adventure)
                @php
                    $carbonStartTime = Carbon\Carbon::createFromFormat('H:i', $adventure->start_time);
                    $formattedStartTime = $carbonStartTime->format('h:i A');
                    $carbonEndTime = Carbon\Carbon::createFromFormat('H:i', $adventure->end_time);
                    $formattedEndTime = $carbonEndTime->format('h:i A');
                @endphp
                <div class="body">
                    <h1 style="padding-top: 10pt;text-indent: 0pt;text-align: left;">
                       {{ $adventure->title }}
                    </h1><br />
                    <h2 style="text-indent: 0pt;text-align: left;">18/2/2024</h2>
                    <p style="padding-top: 4pt;text-indent: 0pt;text-align: left;">
                        Start From {{ $formattedStartTime }} - {{ $formattedEndTime }}
                    </p>
                    <p class="s8" style="text-indent: 0pt;text-align: left;"> You're going to need the following: </p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!!$adventure->overview!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">Overview:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;  color: #000;">
                        {!!$adventure->intro!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">itinerary:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!!$adventure->itinerary!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">includes:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {{ str_replace(['[', ']'], '', $adventure->includes) }}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">excludes:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {{ str_replace(['[', ']'], '', $adventure->excludes) }}
                    </p><br />
                </div>
            @endforeach
        @endif

        @if ($booking->model_ids == null && $booking->model_type == 'App\Models\Package')
            @php
                $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->start_date);
                $startDateFormat = \Carbon\Carbon::parse($booking->start_date);
                $lastDate = null;
            @endphp
            <div class="body">
                <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                {{ $package_name }}
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
                                {{ $adventure->title }}
                            </h1><br />
                            <h2 style="text-indent: 0pt;text-align: left;">
                                <!--@if ($day_number > 1)-->
                                <!--    {{ $formattedDate }} - {{ $formattedEndDate }}-->
                                <!--@else-->
                                <!--    {{ $formattedDate }}-->
                                <!--@endif-->
                                {{ $lastDate }}
                            </h2>
                            <p style="padding-top: 4pt;text-indent: 0pt;text-align: left;">
                                Start From {{ $formattedStartTime }} - {{ $formattedEndTime }}
                            </p><br />
                            <p class="s8" style="text-indent: 0pt;text-align: left;">You're going to need the following: </p>
                            <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                                {!!$adventure->overview!!}
                            </p><br />
                            <p class="s8" style="text-indent: 0pt;text-align: left;">Overview:</p>
                            <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;  color: #000;">
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
                                 Free Day
                            </h1><br />
                            <h2 style="text-indent: 0pt;text-align: left;">
                                <!--@if ($day_number > 1)-->
                                <!--    {{ $formattedDate }} - {{ $formattedEndDate }}-->
                                <!--@else-->
                                <!--    {{ $formattedDate }}-->
                                <!--@endif-->
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
                             {{ $cruise->name }}
                        </h1><br />
                        <h2 style="text-indent: 0pt;text-align: left;">
                            <!--@if ($day_number > 1)-->
                            <!--    {{ $formattedDate }} - {{ $formattedEndDate }}-->
                            <!--@else-->
                            <!--    {{ $formattedDate }}-->
                            <!--@endif-->
                            from {{ $startDateFormat->format('d M') }} to {{ $endDateFormat->format('d M Y') }}
                        </h2>
                        <p class="s8" style="text-indent: 0pt;text-align: left;"></p>
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
                <!--<p>You have been booked successfully in ({{ $hotelData->name }})</p>-->
                <!--<p>Your confirmation code is ({{ $booking->hotel_locator }})</p>ث-->
                <!--<p>Check In ({{ $booking->start_date }})</p>-->
                <!--<p>Check Out ({{ $booking->end_date }})</p>-->
                <!--<p>Number of Adults ({{ $booking->adults }})</p>-->
                <!--<p>Number of Children ({{ $booking->children }})</p>-->
                @endif
            </div>
        @endif
        
        @php use App\Models\Cruise; @endphp
        
        @if($booking->model_type == 'App\Models\Cruise')
            @php
                $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->start_date);
                $startDateFormat = \Carbon\Carbon::parse($booking->start_date);
                $lastDate = null;
                $cruise = Cruise::findOrFail($booking->model_id);
                $startDateFormat = \Carbon\Carbon::parse($lastDate);
                $startDateFormat = $startDateFormat->addDays(1);
                $endDateFormat = $startDateFormat->copy()->addDays($cruise->number_of_nights - 2);
            @endphp
            <div class="body">
                <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                {{ $cruise->name }}
                </h1><br />
                <!--<h2 style="text-indent: 0pt;text-align: left;">-->
                <!--    from {{ $startDateFormat->format('d M') }} to {{ $endDateFormat->format('d M Y') }}-->
                <!--</h2>-->
                <p class="s8" style="text-indent: 0pt;text-align: left;"></p>
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
            </div>
        @endif
        
        @php
        $hotelData = \DB::table('gta_hotel_portfolios')->where('Jpd_code', $booking->hotel_jpcode)->first();
        @endphp
        
        @if($booking->hotel_jpcode != NULL)
        <p class="s8" style="text-indent: 0pt;text-align: left;">Accmmodation:</p>
        <p>Check In ({{ $hotelData->name }}) from (Check In {{ $booking->hotel_start_date }}) to (Check Out {{ $booking->hotel_end_date }}) </p>
        <p>Confirmation Code ({{ $booking->hotel_locator }})</p>
        @endif

        
        <div class="body">
            <p class="s8" style="text-indent: 0pt;text-align: left;">Regards,<br>Tanefer team</p>
            <br>
            <div style="display: flex; justify-content: space-between;">
                <div style="flex: 0 0 48%; width: 250px;">
                    <p class="s9" style="text-indent: 0pt;text-align: left;">Head Quarter - Egypt</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">29 Refaa St. Dokki, Giza</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">(G) Floor, Suite # B1</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">IATA # 90214176</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">Tel: <span style="text-align: right;">+2 333 84000/06</span></p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">Mobile: +201001705555</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">+201224806531</p>
                </div>
                <div style="flex: 0 0 48%; width: 250px;">
                    <p class="s9" style="text-indent: 0pt;text-align: left;">Tanefer Tours Inc - USA</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">6066 Leesburg Pike Suite # 430</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">Falls Church, VA 20141</p>
                    <p class="s9" style="text-indent: 0pt;text-align: left;">IATA # 49575061</p>
                </div>
            </div>
        </div>
    </body>
</html>
