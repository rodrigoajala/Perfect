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
            <h1>Preencha os campos a baixo</h1>
            <form>
            <form action="{{ route('ticketRoute') }}"method="get">
                <div class="mb-3">
            <div>
                <label for="full_name">Nome Completo: </label>
                <br>
                <input type="full_name" name="full_name" id="name">
            </div>
            <br>
            <div>
                <label for="cpf_cnpj">Cpf ou Cnpj: </label>
                <br>
                <input type="text" name="cpf_cnpj" id="cpf_cnpj">
            </div>
            <br>
            
                <label for="form_of_payment">Forma de Pagamento:</label>
            <br>
            <select name="form_of_payment" id="grapform_of_paymente">
                <option value="pix">Pix</option>
                <option value="ticket">Boleto</option>
                <option value="creditCard">Cartão de Crédito</option>                
            </select>

                </div>
                <button type="submit" id="btnPayment" class="btn btn-primary">Salvar Dados</button>
            </form>
            
                @csrf
               
</body>
</html>