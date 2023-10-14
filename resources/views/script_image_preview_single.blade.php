<script>
    var _URL = window.URL || window.webkitURL;
    $("#imageFile").change(function (e) {
      var file, img;
      if ((file = this.files[0])) {
          img = new Image();
          var objectUrl = _URL.createObjectURL(file);
          img.onload = function () {
              _URL.revokeObjectURL(objectUrl);
          };
          img.src = objectUrl
          img.id= "imgId"
          img.style = "max-height:200px;max-width:100%"
          $("#imgDisplay").html(img).show('slow')
      }
  });
</script>