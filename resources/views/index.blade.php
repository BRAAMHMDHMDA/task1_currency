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
                    @if (session('success'))
                        <script>
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: "{{ session('success') }}",
                                timeout: 2000,
                                killer: true
                            }).show();
                        </script>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Currencies</h3>
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#formModal">
                                Add New Currency
                            </button>
                            <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="btn-add"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" id="currencyForm" action="{{ route('currencies.store') }}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="btn-add">Add New Currency</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-4 col-form-label">Name*</label>
                                                    <div class="col-sm-12">
                                                        <input type="name" name="name" class="form-control" id="name" placeholder="name"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="code" class="col-sm-4 col-form-label">Code*</label>
                                                    <div class="col-sm-12">
                                                        <input type="code" name="code" class="form-control" id="code" placeholder="code"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="decimal_numbers" class="col-sm-4 col-form-label">Decimal Numbers*</label>
                                                    <div class="col-sm-12">
                                                        <input type="decimal_numbers" name="decimal_numbers" class="form-control"
                                                               id="decimal_numbers" placeholder="decimal numbers" required>
                                                    </div>
                                                </div>
                                                <fieldset class="form-group">
                                                    <div class="">
                                                        <legend class="col-form-label">Primary*</legend>
                                                        <div class="">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="is_primary" id="true"
                                                                       value=1 >
                                                                <label class="form-check-label" for="true">
                                                                    True
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="is_primary" id="false"
                                                                       value=0 checked>
                                                                <label class="form-check-label" for="false">
                                                                    False
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" id="save" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($currencies->count() !=0)
                                <table id="currencyTable" class="table">
                                    <thead style="background-color: #2b2b2b; color: #b7f5c4">
                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" >Currency Name</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Decimal Numbers</th>
                                        <th scope="col">Primary</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($currencies as $currency)
                                        <tr>
                                            <td>{{$currency->id}}</td>
                                            <td>{{$currency->name}}</td>
                                            <td>{{$currency->code}}</td>
                                            <td>{{$currency->decimal_numbers}}</td>
                                            <td>{{$currency->is_primary==0?'false':'true'}}</td>
                                            <td>
                                                <a href="{{ route('currencies.edit', $currency->id) }}"
                                                   class="btn btn-info">Edit</a>
                                                <!-- start of form -->
                                                <form action="{{ route('currencies.destroy', $currency->id) }}" method="post"
                                                      style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger delete">Delete</button>
                                                </form>
                                                <!-- end of form -->
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                            @else
                                <h3>No Data</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
     <script>
        $("#currencyForm").submit(function (e){
           e.preventDefault();

            let name = $('#name').val();
            let code = $('#code').val();
            let decimal_numbers = $('#decimal_numbers').val();
            let is_primary;
            if ($('#false').is(":checked")){
                 is_primary = 0;
            }else {
                 is_primary = 1;
            }
            let _token = $("input[name=_token]").val();
            $.ajax({
               url: "{{route('currencies.store')}}",
               type:"POST",
               data:{
                   name:name,
                   code:code,
                   decimal_numbers:decimal_numbers,
                   is_primary:is_primary,
                   _token:_token
               },
                success:function (response)
                {
                   if (response)
                   {
                       $("#currencyTable tbody").prepend('<tr><td>'+ response.id +'</td><td>'+ response.name +'</td><td>'+ response.code +'</td><td>'+ response.decimal_numbers +'</td><td>'+ response.is_primary +'</td>' +
                            '<td>' +
                           '<a href="currencies/edit/'+response.id+'"class="btn btn-info">Edit</a> '+
                       '<form action="currencies/'+response.id+'" method="post" style="display: inline-block">'+
                           ' {{ csrf_field() }}{{ method_field('delete') }}'+
                       '<button type="submit" class="btn btn-danger delete">Delete</button> </form>' +
                            '</td>' +
                   '</tr>');


                       $("#currencyForm")[0].reset();
                       $('#formModal').modal('hide');
                       new Noty({
                           type: 'success',
                           layout: 'topRight',
                           text: "Currency created Successfuly",
                           timeout: 2000,
                           killer: true
                       }).show();
                   }
                },
                error: function (masseges) {
                    console.log(masseges);
                }
            });
        });


        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "<div><h4 style='color:#ffffff;'>Confirm Delete?</h4></div>",
                layout: 'topCenter',
                type: "error",
                killer: true,
                buttons: [
                    Noty.button("Yes, Delete", 'btn btn-info mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("No", 'btn btn-default mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete
    </script>


</html>

