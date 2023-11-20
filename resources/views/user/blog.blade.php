@extends('user.layouts.app_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <!--Main layout-->
    <main class="my-5">
        <div class="container">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-12 mb-4">
                    <!--Section: Content-->
                    <section>
                        <!-- Post -->
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="bg-image hover-overlay shadow-1-strong rounded ripple"
                                    data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <h5>Very long post title</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ratione
                                    necessitatibus itaque error alias repellendus nemo reiciendis aperiam quisquam
                                    minus ipsam reprehenderit commodi ducimus, in dicta aliquam eveniet dignissimos
                                    magni.
                                </p>

                                <button type="button" class="btn btn-primary">Read</button>
                            </div>
                        </div>

                        <!-- Post -->
                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <h5>Very long post title</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ratione
                                    necessitatibus itaque error alias repellendus nemo reiciendis aperiam quisquam
                                    minus ipsam reprehenderit commodi ducimus, in dicta aliquam eveniet dignissimos
                                    magni.
                                </p>

                                <button type="button" class="btn btn-primary">Read</button>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="bg-image hover-overlay shadow-1-strong rounded ripple"
                                    data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/002.jpg" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Post -->
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="bg-image hover-overlay shadow-1-strong rounded ripple"
                                    data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/023.jpg" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <h5>Very long post title</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ratione
                                    necessitatibus itaque error alias repellendus nemo reiciendis aperiam quisquam
                                    minus ipsam reprehenderit commodi ducimus, in dicta aliquam eveniet dignissimos
                                    magni.
                                </p>

                                <button type="button" class="btn btn-primary">Read</button>
                            </div>
                        </div>

                        <!-- Post -->
                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <h5>Very long post title</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ratione
                                    necessitatibus itaque error alias repellendus nemo reiciendis aperiam quisquam
                                    minus ipsam reprehenderit commodi ducimus, in dicta aliquam eveniet dignissimos
                                    magni.
                                </p>

                                <button type="button" class="btn btn-primary">Read</button>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="bg-image hover-overlay shadow-1-strong rounded ripple"
                                    data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Section: Content-->
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!-- Pagination -->
            <nav class="my-4" aria-label="...">
                <ul class="pagination pagination-circle justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>
    <!--Main layout-->
@endsection
