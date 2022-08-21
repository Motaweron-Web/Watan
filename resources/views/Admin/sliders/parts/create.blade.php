<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('sliders.store')}}">
    @csrf
    <div class="form-group">
        <label for="image" class="form-control-label">الصورة</label>
        <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg"/>
        <span class="form-text text-danger text-center">مسموح بالصيغ الاتية png, gif, jpeg, jpg</span>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="btn_link" class="form-control-label">الرابط</label>
                <input type="text" class="form-control" name="link" placeholder="https://www.facebook.com/">
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

