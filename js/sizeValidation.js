$(document).ready(function(){
$('#file').on('change',function(){
  if($(this).get(0).files.length > 0){ // only if a file is selected
    var fileSize = $(this).get(0).files[0].size;
    if(fileSize > 300000){
    $('.gets').html("You Have Exceed the file size limit 3MB choose a different file!");
    $('.gets').fadeIn(3000).fadeOut(3000);
    $('#sub').attr("disabled",'disabled');
    }else{
    $('.gets').html("Make Sure Your File is PDF Before Submitting!!");
    $('.gets').fadeIn(3000).fadeOut(3000);
    $('#sub').removeAttr("disabled",'disabled');
    }
  }
});//needs to minify this
    });
