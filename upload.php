<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function _(el){
  return document.getElementById(el);
}
function uploadFile(){
  var file = _("file1").files[0];
  var name = _("usserid").value ;
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  formdata.append("usserid", name);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "doupload.php");
  ajax.send(formdata);
}
function progressHandler(event){
  _("loaded_n_total").innerHTML = "Uploaded "+(event.loaded)/(1024*1024)+" mb of "+(event.total)/(1024*1024);
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
</script>
</head>
<body>
<h2>HTML5 File Upload Progress Bar Tutorial</h2>
<form id="upload_form" enctype="multipart/form-data" method="post">
  <input type="file" name="file1" id="file1" accept=".zip, .rar/*"><br>
  <input type="text" value="1" name="usserid" id="usserid">
  <input type="button" value="Upload File" onclick="uploadFile()">
  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>
</body>
</html>