@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')

<div class="container">
         <h2 class="text-center mt-4">Notice Edit</h2>      
        <div >
            <div class="accordion-body">
                <form action="{{URL::to('user/notice/'.$notice->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')             
                    @csrf                 
                    <label for="#">
                        Name
                        <input type="text" name="name" id="" value="{{ $notice->name }}">
                    </label>
                    <label for="#">
                        Notice Details
                        <textarea name="message" id="editor">{{ $notice->message }}</textarea>
                    </label>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
</div>
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
    skin: 'moono',
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode:CKEDITOR.ENTER_P,
    toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                // { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
                { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                { name: 'links', items: [ 'Link', 'Unlink' ] },
                { name: 'insert', items: [ 'Image'] },
                { name: 'spell', items: [ 'jQuerySpellChecker' ] },
                { name: 'table', items: [ 'Table' ] }
                ],
    });

  </script>
@endsection