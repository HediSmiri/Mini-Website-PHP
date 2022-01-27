/* navbar */

$(window).scroll(function() {
    var nav = $('#navbarMain');
    var top = 50;
    if ($(window).scrollTop() >= top) {
        nav.addClass('fixed');
    } else 
        nav.removeClass('fixed');
});


/* ajout php */

function verif(){
    var marque = document.getElementById('Marque').value;
    var carac = document.getElementById('carac').value;
    var prix = document.getElementById('prix').value;
    
    if (marque ==''){
        alert("marque est vide");
        return false ;
    }else if (carac ==''){
        alert("carac est vide");
        return false ;
    }else if (prix ==''){
        alert("prix est vide");
        return false ;
    }
    if ($('#img').get(0).files.length === 0) {
        alert("Inserer une image");
        return false ;
    }

    function verif1(){
        var marque = document.getElementById('Marque').value;
        var carac = document.getElementById('carac').value;
        var prix = document.getElementById('prix').value;
        
        if (marque ==''){
            alert("marque est vide");
            return false ;
        }else if (carac ==''){
            alert("carac est vide");
            return false ;
        }else if (prix ==''){
            alert("prix est vide");
            return false ;
        }
    
}
