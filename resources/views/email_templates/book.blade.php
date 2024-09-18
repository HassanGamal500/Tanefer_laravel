<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tanefer Mail Test</title>
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

    </style>
</head>
<body>
    <div class="logo">
        <img height="150" width="100%" src="{{ asset('images/logo.png') }}" alt="check" >
    </div>
        {{-- @if($booking->model_ids != null && $booking->model_type == 'App\Models\PackageActivity')
            @foreach ($adventures as $adventure)
                @php
                    $carbonStartTime = Carbon\Carbon::createFromFormat('H:i', $adventure->start_time);
                    $formattedStartTime = $carbonStartTime->format('h:i A');
                    $carbonEndTime = Carbon\Carbon::createFromFormat('H:i', $adventure->end_time);
                    $formattedEndTime = $carbonEndTime->format('h:i A');
                @endphp
                <h1 style="padding-top: 3pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    {{ $adventure->title }}
                </h1><br />
                <h2 style="padding-left: 17pt;text-indent: 0pt;text-align: left;">18/2/2024</h2>
                <p style="padding-top: 4pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    Start From {{ $formattedStartTime }} - {{ $formattedEndTime }}
                </p>
                <p class="s8" style="padding-left: 17pt;text-indent: 0pt;text-align: left;">overview:</p><br>
                <p style="padding-top: 13pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    {{ $adventure->overview }}
                </p><br />
                <p class="s8" style="padding-left: 17pt;text-indent: 0pt;text-align: left;">intro:</p><br>
                <p style="padding-top: 13pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    {{ $adventure->intro }}
                </p><br />
                <p class="s8" style="padding-left: 17pt;text-indent: 0pt;text-align: left;">itinerary:</p><br>
                <p style="padding-top: 13pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    {{ $adventure->itinerary }}
                </p><br />
                <p class="s8" style="padding-left: 17pt;text-indent: 0pt;text-align: left;">includes:</p><br>
                <p style="padding-top: 13pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    {{ str_replace(['[', ']'], '', $adventure->excludes) }}
                </p><br />
                <p class="s8" style="padding-left: 17pt;text-indent: 0pt;text-align: left;">includes:</p><br>
                <p style="padding-top: 13pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    {{ str_replace(['[', ']'], '', $adventure->excludes) }}
                </p><br />

            @endforeach
        @endif --}}
    {{-- <h1 style="padding-top: 3pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
        Classical Egypt 7 Days / 6 Nights
    </h1><br />
    <h2 style="padding-left: 17pt;text-indent: 0pt;text-align: left;">18/2/2024</h2>
    <p style="padding-top: 13pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
        Premium meet upon arrival and assist through the formalities and visa process at Cairo Int. airport through TaNefer representative, private transfer from Cairo Int
    </p><br />
    <p class="s2" style="padding-left: 17pt;text-indent: 0pt;text-align: left;">
        Aracan pyramids hotel
    </p><br />
    <p style="padding-top: 4pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
        Free evening Overnight in Cairo
    </p> --}}
    <h1>Hello this is a testing email</h1>
</body>
</html>
