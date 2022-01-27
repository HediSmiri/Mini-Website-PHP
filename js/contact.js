function formulaire (){
    var name = document.getElementById('fname').value;
    var lastname = document.getElementById('lname').value;
    var email = document.getElementById('email').value;
    var country = document.getElementById('country');
    var subject = document.getElementById('subject').value;
    var selectedValue = country.options[country.selectedIndex].value;

    
    if (name ==''){
        alert('nom vide');
        return false ;
    }
        
    else if(lastname ==''){
        alert('prenom vide');
        return false;
    }

    else if(email ==''){
        alert('email vide');
        return false;
    }
        
    else if (selectedValue == '') {
        alert("select ton pays");
        return false;
    }
        
    else if(subject ==''){
        alert("Ecrire ton message ... ");
        return false ;
    }
        
    return true ;
  
}



























