<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payeer Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


        body {
            background: linear-gradient(to right, rgba(235, 224, 232, 1) 52%, rgba(254, 191, 1, 1) 53%, rgba(254, 191, 1, 1) 100%);
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border: none;
            max-width: 450px;
            border-radius: 15px;
            margin: 150px 0 150px;
            padding: 35px;
            padding-bottom: 20px !important;
        }

        .heading {
            color: #C1C1C1;
            font-size: 14px;
            font-weight: 500;
        }

        img {
            transform: translate(160px, -10px);
        }

        img:hover {
            cursor: pointer;
        }

        .text-warning {
            font-size: 12px;
            font-weight: 500;
            color: #edb537 !important;
        }

        #cno {
            transform: translateY(-10px);
        }

        input {
            border-bottom: 1.5px solid #E8E5D2 !important;
            font-weight: bold;
            border-radius: 0;
            border: 0;

        }

        .form-group input:focus {
            border: 0;
            outline: 0;
        }

        .col-sm-5 {
            padding-left: 90px;
        }

        .btn {
            background: #F3A002 !important;
            border: none;
            border-radius: 30px;
        }

        .btn:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>

    <?php
    $m_shop = 'merchant_id';
    $m_orderid = '1';
    $m_amount = number_format(100, 2, '.', '');
    $m_curr = 'USD';
    $m_desc = base64_encode('Payment Test');
    $m_key = 'secret_key';

    $arHash = array(
        $m_shop,
        $m_orderid,
        $m_amount,
        $m_curr,
        $m_desc
    );

    $arHash[] = $m_key;

    $sign = strtoupper(hash('sha256', implode(':', $arHash)));
    ?>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12">
                <div class="card mx-auto">
                    <p class="heading">PAYMENT DETAILS</p>
                    <form class="card-details" method="post" action="https://payeer.com/merchant/">

                        <div class="form-group pt-2">
                            <div class="row d-flex">
                                <div class="col-sm-4">
                                    <p class="text-warning mb-0">Amount</p>
                                    <input type="text" name="value" placeholder="100" size="4" id="exp" minlength="7" maxlength="7">
                                    <label for="m_amount">$</label>
                                    <input type="hidden" name="m_shop" value="<?= $m_shop ?>">
                                    <input type="hidden" name="m_orderid" value="<?= $m_orderid ?>">
                                    <input type="hidden" name="m_amount" value="<?= $m_amount ?>">
                                    <input type="hidden" name="m_curr" value="<?= $m_curr ?>">
                                    <input type="hidden" name="m_desc" value="<?= $m_desc ?>">
                                    <input type="hidden" name="m_sign" value="<?= $sign ?>">
                                </div>
                                <div class="col text-center pt-0">
                                    <button type="submit" class="btn btn-primary">Add Fund</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>