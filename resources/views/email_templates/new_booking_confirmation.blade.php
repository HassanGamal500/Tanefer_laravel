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
            margin-bottom: 20px;
            text-align: center;
        }

        h1 {
            color: #C90;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 18pt;
        }

        .h2, h2 {
            color: #C90;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 16pt;
        }

        .p, p {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
            margin: 0pt;
        }

        .s2 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 11pt;
        }
        .s8 {
            color: #C90;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
        }

        h4 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        h3 {
            color: black;
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
            font-family: "Times New Roman", serif;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img height="150" width="100%" src="{{ asset('images/logo.png') }}" alt="check" >
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
                    <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                       - {{ $adventure->title }}
                    </h1><br />
                    <h2 style="text-indent: 0pt;text-align: left;">18/2/2024</h2>
                    <p style="padding-top: 4pt;text-indent: 0pt;text-align: left;">
                        Start From {{ $formattedStartTime }} - {{ $formattedEndTime }}
                    </p>
                    <p class="s8" style="text-indent: 0pt;text-align: left;">overview:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!!$adventure->overview!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">intro:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!!$adventure->intro!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">itinerary:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {!!$adventure->itinerary!!}
                    </p><br />
                    <p class="s8" style="text-indent: 0pt;text-align: left;">includes:</p><br>
                    <p style="padding-top: 5pt;text-indent: 0pt;text-align: left;">
                        {{ str_replace(['[', ']'], '', $adventure->excludes) }}
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
                                @endphp
                                <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                                    - {{ $adventure->title }}
                                </h1><br />
                                <h2 style="text-indent: 0pt;text-align: left;">
                                    @if ($day_number > 1)
                                        {{ $formattedDate }} - {{ $formattedEndDate }}
                                    @else
                                        {{ $formattedDate }}
                                    @endif
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
                                    {{ str_replace(['[', ']'], '', $adventure->excludes) }}
                                </p><br />
                            @else
                                @php
                                    $day_number = $adventureCollection['day_number'];
                                    $package_city_id = $adventureCollection['package_city_id'];
                                    $formattedDate = $currentDate->format('Y-m-d');
                                    $formattedEndDate = $currentDate->copy()->addDays($day_number - 1)->format('Y-m-d');
                                    $currentDate->addDay($day_number);

                                @endphp
                                <h2 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                                    - Free Day
                                </h1><br />
                                <h2 style="text-indent: 0pt;text-align: left;">
                                    @if ($day_number > 1)
                                        {{ $formattedDate }} - {{ $formattedEndDate }}
                                    @else
                                        {{ $formattedDate }}
                                    @endif
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
                            @endphp
                            <h1 style="padding-top: 3pt;text-indent: 0pt;text-align: left;">
                                - {{ $cruise->name }}
                            </h1><br />
                            <h2 style="text-indent: 0pt;text-align: left;">
                                @if ($day_number > 1)
                                    {{ $formattedDate }} - {{ $formattedEndDate }}
                                @else
                                    {{ $formattedDate }}
                                @endif
                            </h2>
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
            </div>
        @endif
    </body>
</html>
