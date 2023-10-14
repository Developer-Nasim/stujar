<div class="border p-2 mb-2 bg-light">
    <legend>Upload Image</legend>
    <div class="row">
        <div class="col-md-6" >
             <div class="position-relative form-group">
                 <input placeholder="Image Name" name="file[1][name]"  type="text" class="form-control">
             </div>
             <div class="position-relative form-group">
                 <input name="file[1][caption]" placeholder="Image Caption"  type="text" class="form-control">
             </div>
             <div class="position-relative form-group">
                <textarea name="file[1][description]" class="form-control">Description...</textarea>
            </div>
         </div>
         <div class="col-md-6">
            <div class="position-relative form-group">
                <input name="file[1][url]" type="text" class="form-control mb-3" placeholder="Image external URL">
                <input name="file[1][item]" id="" type="file" class="form-control pb-2">
                <div class="mt-4 border p-2" id="">
                Image Preview
                </div>
            </div>
         </div>
     </div>
</div>
@section('script_footer')
    @include('script_image_preview_single')
@endsection