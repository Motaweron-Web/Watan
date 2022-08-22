    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('services.update',$service->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$service->id}}">
        <div class="row">

            <div class="form-group col-md-6">
                <label for="image" class="form-control-label">الصورة</label>
                <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg" data-default-file="{{$service->image}}"/>
                <span class="form-text text-danger text-center">مسموح بالصيغ الاتية png, gif, jpeg, jpg</span>
            </div>
            <div class="form-group col-md-6">
                <label for="image" class="form-control-label">الايكون</label>
                <input type="file" class="dropify" name="icon" accept="image/png, image/gif, image/jpeg,image/jpg" data-default-file="{{$service->icon}}"/>
                <span class="form-text text-danger text-center">مسموح بالصيغ الاتية png, gif, jpeg, jpg</span>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="link" class="form-control-label">الاسم باللغة العربية</label>
                    <input type="text" class="form-control" name="name_ar" value="{{$service->name_ar}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="link" class="form-control-label">الاسم باللغة الانجليزية</label>
                    <input type="text" class="form-control" name="name_en" value="{{$service->name_en}}">
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success" id="updateButton">تعديل</button>
        </div>
    </form>
<script>
    $('.dropify').dropify()
</script>
