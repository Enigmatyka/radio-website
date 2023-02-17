$('#navigation').on('click', 'a', function(){
    
    var li = $(this).closest('li');
    var widgetToShow = $('#' + li[0]['id'].split('-')[1])[0];        
    var widgetHolder = $('#widgetColumn')[0];

    if (checkIfWidgetIsShown()) {
        for (i=0; i<widgetHolder.children.length; ++i) {
            var removedElement = widgetHolder.removeChild(widgetHolder.children[i]);
            $('#widgetStash').append(removedElement);
            if (removedElement.id == widgetToShow.id)
                return;
        }
    }
    widgetHolder.append(widgetToShow);
})

const widgetIdArray = ['orderSong', 'crew', 'greetings', 'schedule'];

function checkIfWidgetIsShown() {
    for (i=0; i<widgetIdArray.length; ++i) {
        var isWidgetShown = $.contains(document.getElementById('widgetColumn'), document.getElementById(widgetIdArray[i]));
        if (isWidgetShown)
            return true;
    } 
    return false;
}