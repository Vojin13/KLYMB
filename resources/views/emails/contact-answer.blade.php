<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLYMB Support Response</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #ffffff;
            color: #000000;
            text-transform: uppercase;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #ffffff;
            padding-bottom: 40px;
        }
        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border: 3px solid #000000;
            margin-top: 20px;
        }
        .header {
            background-color: #000000;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 900;
            letter-spacing: -1px;
        }
        .content {
            padding: 40px 30px;
            text-align: left; /* Odgovor je pregledniji poravnat ulevo */
        }
        .label-text {
            font-size: 12px;
            font-weight: 900;
            color: #dc2626; /* KLYMB Crvena */
            margin-bottom: 5px;
            display: block;
        }
        .user-query {
            background-color: #f3f4f6;
            border-left: 4px solid #000000;
            padding: 15px;
            font-size: 13px;
            font-style: italic;
            margin-bottom: 30px;
            color: #4b5563;
        }
        .main-title {
            font-size: 22px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 20px;
            text-align: center;
        }
        .answer-box {
            border: 2px solid #000000;
            padding: 20px;
            font-size: 15px;
            font-weight: bold;
            line-height: 1.5;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            font-weight: bold;
            color: #9ca3af;
            padding: 20px;
            border-top: 1px solid #eeeeee;
        }
    </style>
</head>
<body>
<center class="wrapper">
    <table class="main" width="100%">
        <tr>
            <td class="header">
                <h1>KLYMB <span style="color: #dc2626;">BASECAMP</span></h1>
            </td>
        </tr>

        <tr>
            <td class="content">
                <h2 class="main-title">MESSAGE RESPONSE</h2>

                <span class="label-text">YOUR INQUIRY:</span>
                <div class="user-query">
                    "{{ $contactMessage->message }}"
                </div>

                <span class="label-text">OFFICIAL ANSWER FROM KLYMB GUIDE:</span>
                <div class="answer-box">
                    {{ $answer }}
                </div>

                <p style="font-size: 12px; font-weight: 900; text-align: center; margin-top: 40px;">
                    STAY HIGH. STAY SAFE.
                </p>
            </td>
        </tr>

        <tr>
            <td class="footer">
                &copy; {{ date('Y') }} KLYMB GEAR & GYM MANAGEMENT. ALL RIGHTS RESERVED.<br>
                YOU ARE RECEIVING THIS BECAUSE YOU CONTACTED OUR SUPPORT TEAM.
            </td>
        </tr>
    </table>
</center>
</body>
</html>
