$(document).ready(function(){
    $('.on-db').dblclick(function() {
        var domElement = $( this ).get( 0 );
        if(domElement.firstElementChild.hidden==''){
            domElement.firstElementChild.setAttribute('hidden', true);
            domElement.lastElementChild.removeAttribute('hidden');
        }
        else{
            domElement.lastElementChild.setAttribute('hidden', true);
            domElement.firstElementChild.removeAttribute('hidden');
        }

    });
});