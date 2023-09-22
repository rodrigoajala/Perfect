<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            @if(!empty($link))
                <h1>Clik no LInK </h1>
                <p>
                    <a href="{{$link}}">Boleto Acesse Agora</a>
                </p>
            @endif
            <br>
            @if(!empty($creditCard['status']) && $creditCard['type'] === "CREDIT_CARD")
                <h1>Pagamento de Cartão de Credito</h1>
                <p>
                    {{$creditCard['status']}}
                </p>
            @endif

            @if(!empty($pix['qrCode']))
                <h1>Pagamento Pix</h1>
                <img src="data:image/png;base64, {{$pix['qrCode']}}" alt="Red dot" />
                <p>
                    Copie e Cole: {{$pix['copyPaste']}}
                </p>
            @endif
</body>
</html>
