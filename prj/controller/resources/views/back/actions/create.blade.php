@extends('back.index')

@section('title')
    رخداد جدید
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> مطلب جدید </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                                @include('back.message')


                            <form action="{{ route('actions.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="title">رخداد </label>
                                    <select class="form-control" name="event">

                                        <option value="cat">گربه</option>
                                        <option value="face"> چهره</option>
                                        <option value="body">بدن انسان</option>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="title">اقدام </label>
                                    <textarea id="editor" type="text"
                                              class="form-control @error('action') is-invalid @enderror"
                                              name="action"> {{old('action')}} </textarea>


                                    @error('action')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="title"></label>
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                    <a href="{{route('actions')}}" class="btn btn-warning">بازگشت</a>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    @include('back.footer')
    <!-- partial -->
    </div>
@endsection


