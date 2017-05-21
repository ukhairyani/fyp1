$(document).ready(function() {

    $("#gambar_profile").on('change', function(){
      updatePlacholder1(this);
    });

    $("#gambar_lesen").on('change', function(){
      updatePlacholder2(this);
    });


  $("#gambar_ic").on('change', function(){
    updatePlacholder3(this);
  });


  // file upload
  function updatePlacholder1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#gambar_profile_img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  function updatePlacholder2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#gambar_lesen_img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  function updatePlacholder3(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#gambar_ic_img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

})
