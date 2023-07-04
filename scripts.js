let form = document.getElementById("apprenantForm");
form.addEventListener("submit", function(event){
    //alert("lkfldksmlkl");
   // event.preventDefault();
    // Valider les champs du formulaire avant la soumission
    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let age = document.getElementById("age");
    let email= document.getElementById("email").value;
    let telephone = document.getElementById("numero").value;

    if(nom.value===""){
        let err= document.getElementById('err');
        err.innerHTML="Veullez remplir tous les champs";
        err.style.color="red";
        nom.style.borderColor = "red";
        event.preventDefault();
    }
    if(prenom.value===""){
        let err= document.getElementById('err');
        err.innerHTML="Veullez remplir tous les champs";
        err.style.color="red";
        prenom.style.borderColor = "red";
        event.preventDefault();
    }
    if(age.value===""){
        let err= document.getElementById('err');
        err.innerHTML="Veullez remplir tous les champs";
        err.style.color="red";
        age.style.borderColor = "red";
        event.preventDefault();
    }
    

    // // Envoyer les données du formulaire via AJAX
    // let xhr = new XMLHttpRequest();
    // xhr.open("POST", "traitement.php", true);
    // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // xhr.onreadystatechange = function() {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         // Afficher un message de succès ou de traitement réussi
    //         alert("Les informations de l'apprenant ont été enregistrées avec succès !");
    //         // Réinitialiser le formulaire ou rediriger vers une autre page
    //         document.getElementById("apprenantForm").reset();
    //     }
    // };
    // xhr.send("nom=" + nom + "&autre_champ=valeur"); // Envoyer les données du formulaire
})
