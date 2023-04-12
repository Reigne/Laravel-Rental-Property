<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Send Notification</title>
    </head>
    <body>
        @foreach ($orders as $data) 
        @if ($data->Status == "Accepted")
        <p>
            <h3>Good day! {{ $data->lname }}, {{ $data->fname }}</h3>
             Your transaction to <strong>{{ $data->Address }}</strong> <br>
             from <strong>{{ $data->City }}</strong> has been accepted!
        </p>
        
        @elseif ($data->Status == "Canceled")
        <p>
                Transaction Denied!!
        </p>

        @endif
        @endforeach

    </body>
</html>