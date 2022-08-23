    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('agents.update',$agent->id)}}" >
    @csrf
        <input type="hidden" name="id" value="{{$agent->id}}">
        <div class="form-group">
            <label for="image" class="form-control-label">الصورة</label>
            <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg" data-default-file="{{$agent->image}}"/>
            <span class="form-text text-danger text-center">مسموح بالصيغ الاتية  png, gif, jpeg, jpg</span>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="link" class="form-control-label">الاسم باللغة العربية</label>
                    <input type="text" class="form-control" name="name_ar" value="{{$agent->name_ar}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="link" class="form-control-label">الاسم باللغة الانجليزية</label>
                    <input type="text" class="form-control" name="name_en" value="{{$agent->name_en}}">
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="btn_link" class="form-control-label">كود الدولة </label>
                    <input type="text" required class="form-control" value="{{$agent->phone_code}}" name="phone_code" placeholder="">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="btn_link" class="form-control-label">الهاتف</label>
                    <input type="number" required class="form-control" value="{{$agent->phone}}" name="phone" placeholder="">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="btn_link" class="form-control-label">نبذة تعريفية</label>
                    <input type="text" required class="form-control" value="{{$agent->about}}" name="about" placeholder="">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="btn_link" class="form-control-label">الواتساب</label>
                    <input type="text" required class="form-control"  value="{{$agent->whatsapp}}" name="whatsapp" placeholder="">
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
