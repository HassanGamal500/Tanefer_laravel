<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package Details </title>
    <style>
        .logo {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
        }
        .passengerDetailshe {
            break-inside: avoid;text-align: center;color: rgb(35, 140, 195);
            font-size: 20px;padding: 20px 30px;border-left-width: 1px;border-left-color: rgb(192, 192, 192);
            border-right-width: 1px;border-right-style: solid;
            border-right-color: rgb(192, 192, 192);vertical-align: top;
        }
        .passengerdetails{
            break-inside: avoid;
            text-align: center; color: rgb(108, 108, 108); font-size: 16px; padding: 10px 30px 5px; font-weight: bold;
            border-left-width: 1px; border-left-color: rgb(192, 192, 192);
            border-right-width: 1px;
            border-right-style: solid;
            border-right-color: rgb(192, 192, 192);
            border-bottom-width: 1px;
            border-bottom-style: solid;
            border-bottom-color: rgb(192, 192, 192);
            vertical-align: top;
			min-width: 40vw;
        }
    </style>

</head>
<body>
    <div class="logo">
        <img height="150" width="100%" src="{{ asset('images/logo.png') }}" alt="check" >
    </div>
   <h1> # Hi {{ $username }}</h1>

    <br>
    <p>Your booking is confirmed with total Price: <b>{{ $totalPrice }}</b> </p>
    <table style="width: 100%;box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px;">
        <tbody>
        <tr style="break-inside: avoid">
            <th colspan="12" style="break-inside: avoid; text-align: left; padding: 12px; font-size: 20px; background-color: #4f3316; color: rgb(255, 255, 255); font-family: &quot;Trebuchet MS&quot;">
                Adventure Detils
            </th>
        </tr>
        <tr style="break-inside: avoid">
            @if($booking->model_ids == null) <th class="passengerDetailsheads"> day number </th> @endif
            <th class="passengerDetailsheads">adventure Name</th>
            @if($booking->model_ids == null) <th class="passengerDetailsheads">City</th> @endif
            <th class="passengerDetailsheads">time</th>
            <th class="passengerDetailsheads">adventure includes</th>
            <th class="passengerDetailsheads">adventure excludes</th>
            <th class="passengerDetailsheads">adventure duration</th>

        </tr>
        @if($booking->model_ids != null && $booking->model_type == 'App\Models\PackageActivity')

            @foreach ($adventures as $adventure)
                @php
                    $carbonStartTime = Carbon\Carbon::createFromFormat('H:i', $adventure->start_time);
                    $formattedStartTime = $carbonStartTime->format('h:i A');
                    $carbonEndTime = Carbon\Carbon::createFromFormat('H:i', $adventure->end_time);
                    $formattedEndTime = $carbonEndTime->format('h:i A');
                @endphp
                <tr style="break-inside: avoid">
                    <td class="passengerdetails">{{ $adventure->title }}</td>
                    <td class="passengerdetails">{{ $formattedStartTime }} - {{ $formattedEndTime }}</td>
                    <td class="passengerdetails">{{ str_replace(['[', ']'], '', $adventure->includes) }}</td>
                    <td class="passengerdetails">{{ str_replace(['[', ']'], '', $adventure->excludes) }}</td>
                    <td class="passengerdetails">{{ $adventure->duration_digits }}  {{ $adventure->duration_type }}</td>
                </tr>
            @endforeach
        @endif

        @if ($booking->model_ids == null && $booking->model_type == 'App\Models\Package')
            @foreach ($adventures as $adventureCollection)
                @php
                    $adventure = $adventureCollection['adventure_id'];
                    $day_number = $adventureCollection['day_number'];
                    $package_city_id = $adventureCollection['package_city_id'];
                    $carbonStartTime = Carbon\Carbon::createFromFormat('H:i', $adventure->start_time);
                    $formattedStartTime = $carbonStartTime->format('h:i A');
                    $carbonEndTime = Carbon\Carbon::createFromFormat('H:i', $adventure->end_time);
                    $formattedEndTime = $carbonEndTime->format('h:i A');

                @endphp
                <tr style="break-inside: avoid">
                    <td class="passengerdetails">{{ $day_number }}</td>
                    <td class="passengerdetails">{{ $adventure->title }}</td>
                    <td class="passengerdetails">{{ $package_city_id }}</td>
                    <td class="passengerdetails">{{ $formattedStartTime }} - {{ $formattedEndTime }}</td>
                    <td class="passengerdetails">{{ str_replace(['[', ']'], '', $adventure->includes) }}</td>
                    <td class="passengerdetails">{{ str_replace(['[', ']'], '', $adventure->excludes) }}</td>
                    <td class="passengerdetails">{{ $adventure->duration_digits }}  {{ $adventure->duration_type }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @if ($booking->model_ids == null && $booking->model_type == 'App\Models\Package')
        <br style="caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration: none">
        <table style="width: 100%;box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px;">
            <tbody>
            <tr style="break-inside: avoid">
                <th colspan="12" style="break-inside: avoid; text-align: left; padding: 12px; font-size: 20px; background-color: #4f3316; color: rgb(255, 255, 255); font-family: &quot;Trebuchet MS&quot;">
                cruise Detils
                </th>
            </tr>
            <tr style="break-inside: avoid">
                <th class="passengerdetails">cruise days</th>
                <th class="passengerdetails">cruise name</th>
                <th class="passengerdetails">cruise city</th>
                <th class="passengerdetails">cruise line</th>
                <th class="passengerdetails">ship name</th>
                <th class="passengerdetails">cruise excludes</th>
                <th class="passengerdetails">cruise includes</th>
                <th class="passengerdetails">number of nights</th>
            </tr>
            @foreach ($cruises as $cruisesCollection)
                @php
                    $cru = $cruisesCollection['cruise_id'];
                    $day_number = $cruisesCollection['day_number'];
                    $package_city_id = $cruisesCollection['package_city_id'];
                @endphp
                <tr style="break-inside: avoid">
                    <td class="passengerdetails">{{ $day_number }} days</td>
                    <td class="passengerdetails">{{ $cru->name }}</td>
                    <td class="passengerdetails">{{ $package_city_id }}</td>
                    <td class="passengerdetails">{{ $cru->cruise_line }}</td>
                    <td class="passengerdetails">{{ $cru->ship_name }}</td>
                    <td class="passengerdetails">{{ is_array($cru->excludes) ? implode(', ', $cru->excludes) : $cru->excludes }}</td>
                    <td class="passengerdetails">{{ is_array($cru->includes) ? implode(', ', $cru->includes) : $cru->includes }}</td>
                    <td class="passengerdetails">{{ $cru->number_of_nights }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <br style="caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration: none">

<table style="width: 1177px; -webkit-box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px; box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px; caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; background-color: rgb(245, 245, 245)">
    <tbody>
    <tr style="break-inside: avoid">
        <td style="break-inside: avoid; width: 1153px; text-align: left; font-family: &quot;Trebuchet MS&quot;; color: rgb(108, 108, 108); font-size: 16px; padding: 10px; line-height: 27px">
            <b>Regards,</b>
            <br>
            <b>{{ config('app.name') }}</b>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
