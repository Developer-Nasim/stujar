<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="position-relative form-group">
    <label for="{{$name}}" class="">{{$label}}</label>
    <textarea name="{{$name}}" class="ckeditor" type="text" class="form-control">{{ $value ?? '' }}</textarea>
</div>