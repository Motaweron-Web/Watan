@extends('Admin/layouts/master')

@section('title')  {{($setting->title) ?? ''}} | المكاتب العقارية @endsection
@section('page_name') المكاتب العقارية @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">المكاتب العقارية</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th style="min-width: 200px">المكتب</th>
                                <th class="min-w-50px">المستخدم</th>
                                <th class="min-w-50px">الهاتف</th>
                                <th class="min-w-50px">عن المكتب</th>
                                <th class="min-w-50px">التواصل</th>
                                <th class="min-w-50px">الموقع</th>
                                <th class="min-w-50px">الوكلاء</th>

                                <th class="min-w-50px rounded-end">العمليات</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف بيانات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>هل انت متأكد من حذف البيانات التالية <span id="title" class="text-danger"></span>؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            الغاء
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">حذف !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->
    </div>
    @include('Admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'user_id', name: 'user_id'},
            {data: 'number', name: 'number'},
            {data: 'about_ar', name: 'about_ar'},
            {data: 'contact', name: 'contact'},
            {data: 'location', name: 'location'},
            {data: 'agent', name: 'agent'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('companies.index')}}', columns);
        // Delete Using Ajax
        deleteScript('{{route('companies.delete')}}');
    </script>
@endsection


