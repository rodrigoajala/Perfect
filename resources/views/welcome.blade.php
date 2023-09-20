<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        #credit_card_section {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Preencha os campos a baixo</h1>
                <form action="{{ route('ticketRoute') }}" method="post">
                    @csrf
                    <div>
                        <label for="full_name">Nome Completo: </label>
                        <br>
                        <input type="text" name="full_name" id="full_name" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="cpf_cnpj">Cpf ou Cnpj: </label>
                        <br>
                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="form_of_payment">Forma de Pagamento:</label>
                        <br>
                        <select name="form_of_payment" id="form_of_payment" class="form-control">
                            <option value="" selected>Selecione uma forma de pagamento</option>
                            <option value="pix">Pix</option>
                            <option value="ticket">Boleto</option>
                            <option value="creditCard">Cartão de Crédito</option>
                        </select>
                    </div>
                    <div id="credit_card_section" class="mt-3">
                        <hr>
                        <h3>Dados de cartao</h3>
                        <div>
                            <label for="holder_name">Titular do Cartão</label>
                            <br>
                            <input type="text" name="credit_card_holder_name" class="form-control">
                        </div>
                        <div>
                            <label for="holder_name">Numero do Cartão</label>
                            <br>
                            <input type="text" name="credit_card_number" class="form-control">
                        </div>
                        <div>
                            <label for="holder_name">Validade do Cartao</label>
                            <br>
                            <input type="text" name="credit_card_validity" class="form-control">
                        </div>
                        <div>
                            <label for="holder_name">Codigo de Segurança</label>
                            <br>
                            <input type="text" name="credit_card_cvv" class="form-control">
                        </div>
                    </div>
                    <br>
                    <button type="submit" id="btnPayment" class="btn btn-primary">Gerar Cobrança</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#form_of_payment").change(function() {
                const paymentMethod = $(this).val();
                const selectorForCreditCardSection = "#credit_card_section"
                if(paymentMethod === "creditCard") {
                    $(selectorForCreditCardSection).fadeIn();
                    $(selectorForCreditCardSection).css('display', 'none');
                    $(selectorForCreditCardSection).show();
                    return;
                }
                $(selectorForCreditCardSection).fadeOut();
            });
        });
    </script>
</body>
</html>
