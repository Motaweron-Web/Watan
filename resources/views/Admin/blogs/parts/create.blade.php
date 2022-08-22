<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('blogs.store')}}">
    @csrf
    <div class="form-group">
        <label for="image" class="form-control-label">الصورة</label>
        <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg"/>
        <span class="form-text text-danger text-center">مسموح بالصيغ الاتية png, gif, jpeg, jpg</span>
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



    <div class="row">

        <div class="col-12">

            <div class="form-floating">
                <label for="floatingTextarea1"> وصف المقال بالعربي</label>
                <textarea class="form-control mytextarea" name="description_ar" placeholder="" id="floatingTextarea1"></textarea>
            </div>


        </div>

        <div class="col-12">

            <div class="form-floating">
                <label for="floatingTextarea1">  وصف المقال بالانجليزي</label>
                <textarea class="form-control mytextarea" name="description_en" placeholder="" id="floatingTextarea1"></textarea>
            </div>


        </div>


    </div>









    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>

<script>
    $('.dropify').dropify();
    CKEDITOR.replace( 'description_ar' );
    CKEDITOR.replace( 'description_en' );


</script>








