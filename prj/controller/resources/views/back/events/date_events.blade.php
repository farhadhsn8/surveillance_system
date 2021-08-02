@extends('back.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> پرس و جو براساس تاریخ </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <a> </a>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @include('back.message')
                            <form action="#" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="from">از:</label>
                                    <input type="date"  name="from">
                                </div>
                                <div class="form-group">
                                    <label for="to">تا:  </label>
                                    <input type="date"  name="to">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    @include('back.footer')
    <!-- partial -->
    </div>
@endsection


@section('title')
    پنل مدیریت | مدیریت رخدادها
@endsection
