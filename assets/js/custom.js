/*$(document).ready(function(){
	console.log("hello") ;
}) ;*/



$(".delete-user").click(function(e){
    e.preventDefault() ;
    $(this).html("<i class='fa fa-spin fa-circle-o-notch'></i>") ;
    ask = window.confirm("Are you sure you want to delete this user?") ;
    if(ask == true)
    {
        id = $(this).attr("id") ;
        id = id.split("_")[1] ;
        url = "php/actionmanager.php" ;
        $doJob = $.post(url , {
            id: id ,
            command: "delete-user"
        }).done(function(data){
            alert(data) ;
            window.location.assign("users.php") ;
        }) ;
    }
    
}) ;

$(".delete-file").click(function(e){
    e.preventDefault() ;
    $(this).html("<i class='fa fa-spin fa-circle-o-notch'></i>") ;
    ask = window.confirm("Are you sure you want to delete this file?") ;
    if(ask == true)
    {
        id = $(this).attr("id") ;
        id = id.split("_")[1] ;
        url = "php/actionmanager.php" ;
        $doJob = $.post(url , {
            id: id ,
            command: "delete-file"
        }).done(function(data){
            alert(data) ;
            window.location.assign("uploaded.php") ;
        }) ;
    }
    
}) ;

$(".toggle-user").click(function(e){
    e.preventDefault() ;
    $(this).html("<i class='fa fa-spin fa-circle-o-notch'></i>") ;
    ask = window.confirm("Are you sure you want to change this user?") ;
    if(ask == true)
    {
        id = $(this).attr("id") ;
        id = id.split("_")[1] ;
        type = $(this).attr("user-type") ;
        url = "php/actionmanager.php" ;
        $doJob = $.post(url , {
            id: id ,
            type: type ,
            command: "toggle-user"
        }).done(function(data){
            alert(data) ;
            window.location.assign("users.php") ;
        }) ;
    }
    
}) ;



function _(el){
  return document.getElementById(el);
}
function uploadFile(){
  var file = _("file1").files[0];
  var name = _("user").value ;
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  formdata.append("user", name);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "doupload.php");
  ajax.send(formdata);
}
function progressHandler(event){
  _("loaded_n_total").innerHTML = "Uploaded "+Math.round((event.loaded)/(1024))+" Kilobytes of "+Math.round((event.total)/(1024));
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0;
}
function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
}




//ajax submit files
// var ajaxSub ;

// var percentageComplete ;
// $("#zipform").submit(function(e){
//     if($("#file").val())
//     {
//         e.preventDefault() ;
//         $(".progress-bar").css("width" , "0%") ;
//         console.log($(".progress-bar").css("width")) ;
//         $(".progress-bar").attr("aria-valuenow" , 0) ;
//         $(this).ajaxSubmit({
//             target: ".Doing" ,
//             beforeSubmit:function(){
//                 $(".progress").show() ;
//                 $(".progress-bar").width("0%") ;
//             } ,
//             uploadProgress: function(event , position , total , percentageComplete){
//                 $(".progress-bar").css("width" , percentageComplete+"%") ;
//                 /*$(".progress-bar").animate({
//                     width: percentageComplete + "%"
//                 }, {
//                     duration: 1000
//                 }) ;*/
//             } ,
//             success:function(data){
//                 console.log(data) ;
//                 console.log($(".progress-bar").css("width")) ;
//                 // console.log(percentageComplete) ;
//                 // $(".progress-bar").css("width" , "0%") ;
//             } ,
//             resetForm: true
//         }) ;
//     }
//     return false ;
// }) ;


/*$("#zipform").on('submit',(function(e) {
    e.preventDefault();
    // $.ajaxSetup({ asynch: false })
    ajaxSub = $.ajax({
        url: "php/actionmanager.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        // async: false ,
        beforeSend : function()
        {
        // $("#err").fadeOut();
        },
        success: function(data){
            // console.log(data) ;
            if(data == 1)
            {
                $(".progress").show() ;
                $(".progress-bar").attr("aria-valuenow" , 25) ;
                $(".progress-bar").css("width" , "25%") ;
                $(".Doing").html("Inspecting your file...") ;
                $(".progreeFlow").html("25% Complete") ;
                // ajaxSub ;

                $.ajax({
                    url: "php/actionmanager.php",
                    type: "POST",
                    data:  new FormData($("#zipform")),
                    contentType: false,
                    cache: false,
                    processData:false,
                    // async: false ,
                    beforeSend : function()
                    {
                    // $("#err").fadeOut();
                    },
                    success: function(data){

                    }
                }) ;


            }
            else
            {
            console.log("<br> there "+data) ;
            }
        }      
    });
}));*/





/*$(".file-folder").click(function(e){
    e.preventDefault() ;
    folder = $(this).attr("folder") ;
    id = $(this).attr("id") ;
    url = "php/actionmanager.php" ;
    $.post(url , {
        folder: folder ,
        command: "findFile"
    }).done(function(data){
        $("#"+id).append(data) ;
        console.log(data) ;
    }) ;
    
}) ;
*/
// parentTree = $(".nested") ;
// console.log(parentTree[0].hide()) ;
/*$(".nested").click(function(e){
    e.preventDefault() ;
    $(this).siblings().hide() ;
}) ;*/

/*$class = document.getElementsByClassName('nested') ;
console.log($class[0].childNodes) ;*/

$(".file-folder").click(function(e){
    e.preventDefault() ;
    id = $(this).attr("id") ;
    folderId = "#folderToggle"+id ;
    $next = $("#"+id).next() ;
    // console.log($next) ;
    $next.toggle() ;
    $(folderId).toggleClass("fa-folder-open fa-folder")
}) ;