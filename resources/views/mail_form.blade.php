
<div class="container">
    <div class="row justify-content-center p-0">
        <div class="col-md-8 m-0">
            @empty(!$errors->all())
                <div class="alert alert-danger " role="alert">
                    Inputlari doldurun !
                </div>
            @endempty
            @empty(!$_POST)
                <div class="alert alert-success" role="alert">
                    Mesajlar yadda saxlanildi ! Qeyd etdiyiniz vaxtda gonderilecek
                </div>
            @endempty

            <div class="card my-auto">
                <div class="card-header">
                    Mailler
                </div>
                <div class="card-body py-2">

                    <form method="post" action="{{ route('send-email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Receiver mail</label>
                            <input name="receiver" placeholder="receiver" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Sender mail</label>
                            <input name="sender" placeholder="Sender" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Mail title</label>
                            <input name="subject" placeholder="Title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mail content</label>
                            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <input type="submit" value="Send" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
