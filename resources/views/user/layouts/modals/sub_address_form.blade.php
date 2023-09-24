<div class="tab-pane fade show active" id="sub_address" role="tabpanel" aria-labelledby="ex1-tab-1">
    <div class=" m-4">
        <div class="card-body">
            <form action="<? route_to('addAddress') ?>" method="post" id="sub_address">

                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tên</p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control text-muted mb-2" value="{{ auth()->user()->name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control text-muted mb-2" value="{{ auth()->user()->email }}">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control text-muted mb-2" value="{{ auth()->user()->phone }}">

                    </div>
                </div>
                <hr>

                <div class="row text-left pt-3 col-sm-1">
                    <button class="btn btn-sm btn-primary">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
