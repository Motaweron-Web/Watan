    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('categories.update',$category->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$category->id}}">


        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="link" class="form-control-label">الاسم باللغة العربية</label>
                    <input type="text" class="form-control" name="name_ar" value="{{$category->name_ar}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="link" class="form-control-label">الاسم باللغة الانجليزية</label>
                    <input type="text" class="form-control" name="name_en" value="{{$category->name_en}}">
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success" id="updateButton">تعديل</button>
        </div>
    </form>
