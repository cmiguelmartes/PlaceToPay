<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <form action="./api/create-transaction" method="post" class="form-inline">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="bank_list">Lista de bancos</label>
                            <select name="bank_list" id="bank_list" class="form-control input_size">
                                @foreach ($bankList as $bank)
                                    <option value="{{ $bank->bankCode }}">{{ $bank->bankName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="document_type">Tipo Identificación</label>
                            <select name="document_type" id="document_type" class="form-control input_size">
                                <option value="-">Seleccione tipo de documento</option>
                                <option value="CC">Cédula de ciudanía colombiana</option>
                                <option value="CE">Cédula de extranjería</option>
                                <option value="TI">Tarjeta de identidad</option>
                                <option value="PPN">Pasaporte</option>
                                <option value="NIT">Número de identificación tributaria</option>
                                <option value="SSN">Social Security Number</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="document">Documento</label>
                            <input type="text" class="form-control input_size" name="document" id="document" placeholder="Documento">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="names">Nombres</label>
                            <input type="text" class="form-control input_size" name="names" id="names" placeholder="Carlos Miguel">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="last_names">Apellidos</label>
                            <input type="text" class="form-control input_size" name="last_names" id="last_names" placeholder="Martes Vega">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="mobile">Numero de Celular</label>
                            <input type="text" class="form-control input_size" name="mobile" id="mobile" placeholder="00000000">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="text" class="form-control input_size" name="phone" id="phone" placeholder="000000">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control input_size" name="address" id="address" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="postalCode">Código Postal</label>
                            <input type="text" class="form-control input_size" name="postalCode" id="postalCode" placeholder="000000">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control input_size" name="email" id="email" placeholder="carlosmiguel782@gmail.com">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="company">Compañia</label>
                            <input type="text" class="form-control input_size" name="company" id="company" placeholder="Compañia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="country">País</label>
                            <input type="text" class="form-control input_size" name="country" id="country" placeholder="carlosmiguel782@gmail.com">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="province">Departamento</label>
                            <input type="text" class="form-control input_size" name="province" id="province" placeholder="Compañia">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input type="text" class="form-control input_size" name="city" id="city" placeholder="Compañia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary center_btn">Enviar</button>
                </div>
            </form>
        </div>
    </body>
</html>
