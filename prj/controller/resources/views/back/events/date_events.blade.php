@extends('back.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> مدیریت رخدادها </h4>
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
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>نوع</th>
                                    <th> تصویر گرفته شده</th>
                                    <th>اقدام به ایمیل</th>
                                    <th>تاریخ رخداد</th>
                                    <th>تاریخ اقدام</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($events as $event)

                                    <tr>
                                        <td>{{$event->type}}</td>
                                        <td><a href="{{route('events.show_image',$event->image)}}"><img src="/images/{{$event->image}}" width="70" height="70"></a></td>
                                        <td>{{$event->done}}</td>
                                        <td>{{$event->created_at}}</td>
                                        <td>{{$event->updated_at}}</td>
                                        <td>
                                            <form action="{{route('events.destroy',$event)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn-danger" type="submit" onclick="return confirm('آیا سطر مورد نظر حذف شود؟')"> حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
