@extends('back.index')

@section('title')
    ویرایش  مطلب
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> رخداد جدید </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @include('back.message')

                            <form action="{{ route('actions.update' , $action) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="title">رخداد </label>
                                    <select class="form-control" name="event">
                                        <option value="cat">گربه</option>
                                        <option value="face"> چهره</option>
                                        <option value="body">بدن انسان</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">متن ایمیل </label>
                                    <textarea id="editor" type="text"
                                              class="form-control" @error('action') is-invalid @enderror
                                              name="action"> {{$action->action}} </textarea>
                                    @error('action')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>


                                <hr>

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

    </div>
@endsection


