$(document).ready(function() {

    var button = document.querySelector('#button');
    var tooltip = document.querySelector('#tooltip');

    Popper.createPopper(button, tooltip);
    //console.log('popper created');
})

function show() {
    tooltip.setAttribute('data-show', '');
    //create();
}

function hide() {
    tooltip.removeAttribute('data-show');
    //destroy();
}

const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];

showEvents.forEach(event => {
    button.addEventListener(event, show);
});

hideEvents.forEach(event => {
    button.addEventListener(event, hide);
});