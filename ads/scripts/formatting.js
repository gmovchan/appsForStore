var btnBold = document.getElementById("btnBold");
btnBold.onclick = obesity;
function obesity() {
  // obtain the object reference for the <textarea>
  var txtarea = document.getElementById("mytextarea");
  // obtain the index of the first selected character
  var start = txtarea.selectionStart;
  // obtain the index of the last selected character
  var finish = txtarea.selectionEnd;
  // obtain the selected text
  var sel = txtarea.value.substring(start, finish);
  // do something with the selected content
  if (sel) {
    sel = "<strong>"+sel+"</strong>";
    var startText = txtarea.value.substring(0, start);
    var finishText = txtarea.value.substring(finish);
    var text = startText + sel + finishText;
    txtarea.value = text;
  }
}
