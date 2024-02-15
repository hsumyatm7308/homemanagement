<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        body {
            font-size: 12px;
            padding: 20px;
            margin: 0;
        }

        .card-body {
            text-indent: 50px;
            text-align: justify;
        }

        .list-unstyled {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <section>
        <b>Dear {{$contact->name}}</b>
    </section>
    <section>
        <div class="card">
            <div class="card-body">
                <p>{!! $content !!}</p>
            </div>
        </div>
    </section>

    <section>
        <ul class="list-unstyled">
            <li>Best Regards,</li>
            <li>{{ auth()->user()->name }}</li>
        </ul>
    </section>
</body>

</html>


{{-- mailtrap.io  --}}