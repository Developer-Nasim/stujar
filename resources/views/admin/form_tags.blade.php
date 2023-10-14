@php
// dd($tags);   
@endphp
<div class="position-relative form-group">
    <label for="tags" class="">Select Tags</label>
    <input type="text" name="tagSearch" id="tagSearch" placeholder="Search tag..">
    <a href="{{URL::to('admin/tag/create')}}" target="_blank">Create new tag</a>
    <br>
    <div id="tagAppend">
    
    </div>
</div>
@section('script_footer')
<script>
    $("#tagSearch").keyup(function(){
        console.log('search...')
        devpath = window.location.origin
        var nameValue = $("#tagSearch").val()
        if(nameValue){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST", 
                url: devpath+ "/admin/searchTag/"+nameValue,
                success: function(data) { 
                    // console.log(data)
                    $("#tagAppend").empty()
                    if(data){
                        for (var i=0; i<data.length; i++) {
                            var tag = '<div title="Set tag '+data[i].title+'" class="d-inline-block mb-2 mr-2">'+
                                '<label class="ccontainer">'+data[i].title+
                                    '<input onclick="setTag(`'+data[i].id+'`,`'+data[i].title+'`);" name="tag[]" value='+data[i].id+' type="checkbox">'+
                                    '<span class="checkmark"></span>'+
                                '</label>'+
                            '</div>'
                            $("#tagAppend").append(tag)
                        }
                    }else{
                    //   console.log('Page link not found, or permanently removed')
                    }
                }
                })
        }else{
            $("#tagAppend").empty()
        }
    });
</script>
@endsection

<style>

    /* The container */
.ccontainer,.catcontainer {
  display: block;
  position: relative;
  padding-left: 10px;
  padding-right: 10px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  margin-bottom:0;
  border:1px solid #ddd
}

/* Hide the browser's default checkbox */
.ccontainer input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.ccontainer .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 22px;
  width: 22px;
  background-color: #eee;
  visibility: hidden;
}

/* On mouse-over, add a grey background color */
.ccontainer:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.ccontainer input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.ccontainer .checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.ccontainer input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.ccontainer .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>