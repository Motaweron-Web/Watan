<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('services.store')}}">
    @csrf
<div class="row">

    <div class="form-group col-md-6">
        <label for="image" class="form-control-label">الصورة</label>
        <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg"/>
        <span class="form-text text-danger text-center">مسموح بالصيغ الاتية png, gif, jpeg, jpg</span>
    </div>
    <div class="form-group col-md-6">
        <label for="image" class="form-control-label">الايكون</label>
        <input type="file" class="dropify" name="icon" accept="image/png, image/gif, image/jpeg,image/jpg"/>
        <span class="form-text text-danger text-center">مسموح بالصيغ الاتية png, gif, jpeg, jpg</span>
    </div>

</div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="btn_link" class="form-control-label">الاسم باللغة العربية</label>
                <input type="text" required class="form-control" name="name_ar" placeholder="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="btn_link" class="form-control-label">الاسم باللغة الانجليزية</label>
                <input type="text" required class="form-control" name="name_en" placeholder="">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
    </div>
</form>
<script>
    $('.dropify').dropify()
</script>

