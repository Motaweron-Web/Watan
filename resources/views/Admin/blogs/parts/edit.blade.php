<form id="updateForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('blogs.update',$blog->id)}}">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$blog->id}}">
    <div class="form-group">
        <label for="image" class="form-control-label">الصورة</label>
        <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg" data-default-file="{{$blog->image}}"/>
        <span class="form-text text-danger text-center">مسموح بالصيغ الاتية  png, gif, jpeg, jpg</span>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="btn_link" class="form-control-label">الاسم باللغة العربية</label>
                <input type="text" required class="form-control" value="{{$blog->name_ar}}" name="name_ar" placeholder="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="btn_link" class="form-control-label">الاسم باللغة الانجليزية</label>
                <input type="text" required class="form-control" value="{{$blog->name_en}}" name="name_en" placeholder="">
            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-12">

            <div class="form-floating">
                <label for="floatingTextarea1"> وصف المقال بالعربي</label>
                <textarea class="form-control mytextarea" name="description_ar" placeholder="" id="floatingTextarea1">{{$blog->description_ar}}</textarea>
            </div>


        </div>

        <div class="col-12">

            <div class="form-floating">
                <label for="floatingTextarea1">  وصف المقال بالانجليزي</label>
                <textarea class="form-control mytextarea" name="description_en" placeholder="" id="floatingTextarea1">{{$blog->description_en}}</textarea>
            </div>


        </div>


    </div>









    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-success" id="updateButton">تعديل</button>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
{{--<script src="{{asset('assets/admin/js/ckeditor.js')}}"></script>--}}

<script>
    $('.dropify').dropify();
    CKEDITOR.replace( 'description_ar' );
    CKEDITOR.replace( 'description_en' );


</script>



