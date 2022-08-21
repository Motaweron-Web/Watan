    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('sliders.update',$slider->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$slider->id}}">
        <div class="form-group">
            <label for="image" class="form-control-label">الصورة</label>
            <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg" data-default-file="{{$slider->image}}"/>
            <span class="form-text text-danger text-center">مسموح بالصيغ الاتية  png, gif, jpeg, jpg</span>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="link" class="form-control-label">الرابط</label>
                    <input type="text" class="form-control" name="link" value="{{$slider->link}}" placeholder="https://www.facebook.com/">
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
