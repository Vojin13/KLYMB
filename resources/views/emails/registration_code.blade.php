<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLYMB Verification</title>
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
            text-align: center;
        }
        .welcome-text {
            font-size: 14px;
            font-weight: 900;
            margin-bottom: 10px;
            color: #dc2626; /* Crvena iz tvog dizajna */
        }
        .main-title {
            font-size: 22px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 30px;
        }
        .code-display {
            background-color: #f3f4f6;
            border: 2px dashed #000000;
            padding: 15px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            font-weight: bold;
            word-break: break-all;
            margin-bottom: 30px;
        }
        .btn-container {
            margin-bottom: 30px;
        }
        .btn {
            background-color: #dc2626;
            color: #ffffff !important;
            padding: 18px 30px;
            text-decoration: none;
            font-weight: 900;
            font-size: 16px;
            display: inline-block;
            border: 2px solid #dc2626;
            transition: all 0.3s ease;
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
                <h1>KLYMB <span style="color: #dc2626;">SYSTEM</span></h1>
            </td>
        </tr>

        <tr>
            <td class="content">
                <p class="welcome-text">HELLO, {{ $username }}</p>
                <h2 class="main-title">YOUR ACCOUNT IS READY.<br>ACTIVATE TO START CLIMBING.</h2>

                <p style="font-size: 12px; font-weight: bold; margin-bottom: 20px;">
                    CLICK THE BUTTON BELOW TO VERIFY YOUR EMAIL:
                </p>

                <div class="btn-container">
                    <a href="{{ route('verify.account', ['code' => $code]) }}" class="btn">
                        VERIFY ACCOUNT
                    </a>
                </div>

                <p style="font-size: 11px; font-weight: bold; margin-top: 40px; margin-bottom: 10px;">
                    OR COPY YOUR UNIQUE IDENTIFIER:
                </p>
                <div class="code-display">
                    {{ $code }}
                </div>
            </td>
        </tr>

        <tr>
            <td class="footer">
                &copy; {{ date('Y') }} KLYMB GEAR & BOULDERING. ALL RIGHTS RESERVED.<br>
                THIS IS AN AUTOMATED MESSAGE. PLEASE DO NOT REPLY.
            </td>
        </tr>
    </table>
</center>
</body>
</html>
