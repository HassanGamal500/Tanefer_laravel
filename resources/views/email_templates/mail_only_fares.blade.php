<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request To Book Special Fares</title>
    <style>
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
        }
    </style>

</head>
<body>

<table style="width: 1177px;
                        box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px;
                        caret-color: rgb(0, 0, 0);
                        font-family: Helvetica;
                        font-size: 12px;
                        font-style: normal;
                        font-variant-caps: normal;
                        font-weight: normal;
                        letter-spacing: normal;
                        text-align: start;
                        text-indent: 0px;
                        text-transform: none;
                        white-space: normal;
                        word-spacing: 0px;
                        -webkit-text-stroke-width: 0px;
                        text-decoration: none;
                        background-color: #ffb200;">
    <tbody>
    <tr style="break-inside: avoid;">
        <td style="break-inside: avoid;
                            text-align: center;
                            color: rgb(255, 255, 255);
                            font-size: 16px;
                            padding: 30px;
                            line-height: 27px;
                        ">
            <b>Dear Our agent</b>
            <br>
            <b>There is a special fare request from customer on our website
                <span class="Apple-converted-space">&nbsp;</span>
                <a href="{{ $appUrl ?? '#' }}" target="_blank" rel="noreferrer">{{ $appName }}</a>
                <span class="Apple-converted-space">&nbsp;</span>
            </b>
            <br>
            <span>
                Please Contact with Customer to finish this deal
             </span>
        </td>
    </tr>
    </tbody>
</table>

<br style="caret-color: rgb(0, 0, 0);
                    font-family: Helvetica;
                    font-size: 12px;
                    font-style: normal;
                    font-variant-caps: normal;
                    font-weight: normal;
                    letter-spacing: normal;
                    text-align: start;
                    text-indent: 0px;
                    text-transform: none;
                    white-space: normal;
                    word-spacing: 0px;
                    -webkit-text-stroke-width: 0px;
                    background-color: rgb(255, 255, 255);
                    text-decoration: none;">

<br style="caret-color: rgb(0, 0, 0);
        font-family: Helvetica;
        font-size: 12px;
        font-style: normal;
        font-variant-caps: normal;
        font-weight: normal;
        letter-spacing: normal;
        text-align: start;
        text-indent: 0px;
        text-transform: none;
        white-space: normal;
        word-spacing: 0px;
        -webkit-text-stroke-width: 0px;
        background-color: rgb(255, 255, 255);
        text-decoration: none;">

<div style="caret-color: rgb(0, 0, 0);
                    font-family: Helvetica;
                    font-size: 12px;
                    font-style: normal;
                    font-variant-caps: normal;
                    font-weight: normal;
                    letter-spacing: normal;
                    text-align: start;
                    text-indent: 0px;
                    text-transform: none;
                    white-space: normal;
                    word-spacing: 0px;
                    -webkit-text-stroke-width: 0px;
                    background-color: rgb(255, 255, 255);
                    text-decoration: none;
                    margin-top: 5px;">

    <table style="width: 1177px;box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px;">
        <tbody>
        <tr style="break-inside: avoid">
            <th class="passengerDetailsheads">Name</th>
            <th class="passengerDetailsheads">Email</th>
            <th class="passengerDetailsheads">Phone</th>
        </tr>

        <tr style="break-inside: avoid">
            <td class="passengerdetails">{{ $request['name'] }}</td>
            <td class="passengerdetails">{{ $request['email'] }}</td>
            <td class="passengerdetails">{{ $request['phone'] }}</td>
        </tr>
        </tbody>
    </table>
</div>

<br style="caret-color: rgb(0, 0, 0);
                    font-size: 12px;
                    font-style: normal;
                    font-variant-caps: normal;
                    font-weight: normal;
                    letter-spacing: normal;
                    text-align: start;
                    text-indent: 0px;
                    text-transform: none;
                    white-space: normal;
                    word-spacing: 0px;
                    -webkit-text-stroke-width: 0px;
                    background-color: rgb(255, 255, 255);
                    text-decoration: none;">

<div style="caret-color: rgb(0, 0, 0);
                    font-size: 12px;
                    font-style: normal;
                    font-variant-caps: normal;
                    font-weight: normal;
                    letter-spacing: normal;
                    text-align: start;
                    text-indent: 0px;
                    text-transform: none;
                    white-space: normal;
                    word-spacing: 0px;
                    -webkit-text-stroke-width: 0px;
                    background-color: rgb(255, 255, 255);
                    text-decoration: none;
                    margin-top: 5px;">

    <table style="width: 1177px;box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px;">
        <tbody>
        <tr style="break-inside: avoid">
            <th colspan="5" style="break-inside: avoid; text-align: left; padding: 12px; font-size: 20px; background-color: #ffb200; color: rgb(255, 255, 255); font-family: &quot;Trebuchet MS&quot;">
                Flight Details
            </th>
        </tr>
        <tr style="break-inside: avoid">
            <th class="passengerDetailsheads">Airline</th>
            <th class="passengerDetailsheads">Flight Number</th>
            <th class="passengerDetailsheads">Departure</th>
            <th class="passengerDetailsheads">Arrival</th>
            <th class="passengerDetailsheads">Flight Duration</th>
        </tr>

        @foreach($flight->flightSegments as $flightSegments)
            @foreach($flightSegments->Segments as $segment)
                <tr style="break-inside: avoid">
                    <td class="passengerdetails">{{ $segment->MarketingAirlineName }}</td>
                    <td class="passengerdetails">{{ $segment->FlightNumber }}</td>
                    <td class="passengerdetails">{{ \Carbon\Carbon::parse($segment->DepartureDate)->toFormattedDateString() }}<br>
                        {{ $segment->DepartureTime }}<br>
                        {{ $segment->OriginLocation }}
                    </td>
                    <td class="passengerdetails">{{ \Carbon\Carbon::parse($segment->ArrivalDate)->toFormattedDateString() }}<br>
                        {{ $segment->ArrivalTime }}<br>
                        {{ $segment->DestinationLocation }}
                    </td>
                    <td class="passengerdetails">{{ $segment->Duration }}</td>
                </tr>
            @endforeach
        @endforeach

        </tbody>
    </table>
</div>
<br style="caret-color: rgb(0, 0, 0);font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration: none">

<table style="width: 1177px; -webkit-box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px; box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px">
    <tbody>
    <tr style="break-inside: avoid">
        <th colspan="5" style="break-inside: avoid; text-align: left; padding: 12px; font-size: 20px; background-color: #ffb200; color: rgb(255, 255, 255); font-family: &quot;Trebuchet MS&quot;">
            Total Price Details
        </th>
    </tr>
    <tr style="break-inside: avoid">
        <th class="passengerDetailsheads">Total Price</th>
        <th class="passengerDetailsheads">Discount Amount</th>
        <th class="passengerDetailsheads">New Price after discount</th>
    </tr>
    <tr style="break-inside: avoid">
            <td class="passengerdetails">
                {{ $flight->pricingInfo->TotalFare_CurrencyCode }} {{ number_format($flight->pricingInfo->TotalFare,2) }}
            </td>
            <td class="passengerdetails">
                {{ $flight->pricingInfo->TotalFare_CurrencyCode }} {{ $flight->pricingInfo->discount_amount }}
            </td>
            <td class="passengerdetails">
                {{ $flight->pricingInfo->TotalFare_CurrencyCode }}  {{ number_format($flight->pricingInfo->newFare,2) }}
            </td>
    </tr>
    </tbody>
</table>

<br style="caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration: none">
<br style="caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration: none">

<table style="width: 1177px; -webkit-box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px; box-shadow: rgba(0, 0, 0, 0.431373) 2px 3px 3px 1px; caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; background-color: rgb(245, 245, 245)">
    <tbody>
    <tr style="break-inside: avoid">
        <td style="break-inside: avoid; width: 1153px; text-align: left; font-family: &quot;Trebuchet MS&quot;; color: rgb(108, 108, 108); font-size: 16px; padding: 10px; line-height: 27px">
            <b>Regards,</b>
            <br>
            <b>{{ $appName }} admin&nbsp;</b>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
