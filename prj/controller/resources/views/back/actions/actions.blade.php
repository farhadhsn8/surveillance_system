@extends('back.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> مدیریت مطالب </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <a href="{{route("actions.create")}}" class="btn btn-primary"> اقدام جدید</a>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @include('back.message')
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>رخداد</th>
                                    <th>متن اقدام</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($actions as $action)
                                    <tr>
                                        <td>{{$action->event}}</td>
                                        <td>{{$action->action}}</td>

                                        <td>

                                            <a href="{{route('actions.edit',$action)}}"><label
                                                    class="badge badge-success">ویرایش</label></a>
                                        </td>
                                        <td>

                                            <form action="{{route('actions.destroy',$action)}}" method="POST">
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
