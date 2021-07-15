<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currencies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
    <script src="{{ asset('noty/noty.min.js') }}"></script>
</head>
<body>
<section style="padding-top:60px;">
    <div class="container" style="min-width: 70%">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Currencies</h3>

                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" id="currencyForm" action="{{ route('currencies.update', $currency->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <div  >
                                    <input type="name" name="name" class="form-control" id="name" value="{{$currency->name}}" placeholder="name"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="code" >Code*</label>
                                <div  >
                                    <input type="code" name="code" value="{{$currency->code}}" class="form-control" id="code" placeholder="code"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="decimal_numbers">Decimal Numbers*</label>
                                <div  >
                                    <input type="decimal_numbers" name="decimal_numbers" value="{{$currency->decimal_numbers}}" class="form-control"
                                           id="decimal_numbers" placeholder="decimal numbers" required>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="">
                                    <legend class="col-form-label">Primary*</legend>
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_primary" id="true"
                                                   value=1 @if($currency->is_primary==1) checked @endif>
                                            <label class="form-check-label" for="true">
                                                True
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_primary" id="false"
                                                   value=0 @if($currency->is_primary==0) checked @endif>
                                            <label class="form-check-label" for="false">
                                                False
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                            <button type="submit" id="save" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>


</html>

