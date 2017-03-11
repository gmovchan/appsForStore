window.onload = function () {
    var btnBoldTop = document.getElementById("btnBoldTop");
    var btnBold = document.getElementById("btnBold");
    
    // вешаю событие клика по кнопке и передаю ID поля в котором следует отредактировать
    // текст
    btnBold.onclick = function () {
        obesity('mytextarea');
    }
    btnBoldTop.onclick = function () {
        obesity('mytextareaTop');
    }
    
    function obesity(textareaId) {
        // obtain the object reference for the <textarea>
        var txtarea = document.getElementById(textareaId);
        // obtain the index of the first selected character
        var start = txtarea.selectionStart;
        // obtain the index of the last selected character
        var finish = txtarea.selectionEnd;
        // obtain the selected text
        var sel = txtarea.value.substring(start, finish);
        // do something with the selected content
        if (sel) {
            sel = "<strong>" + sel + "</strong>";
            var startText = txtarea.value.substring(0, start);
            var finishText = txtarea.value.substring(finish);
            var text = startText + sel + finishText;
            txtarea.value = text;
        }
    }
}