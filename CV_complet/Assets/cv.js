// Charger la page dans le bon format si c'est un mobile :

  document.addEventListener('DOMContentLoaded', resizeWindows);

// Copier-coller l'email/le telephone dans le presse papier :

  function updateClipboard(newClip) {
    navigator.clipboard.writeText(newClip).then(function() {
      /* clipboard successfully set */
    }, function() {
      /* clipboard write failed */
    });
  }

  // Charger dynamiquement du contenu à partir d'autres pages :

  $(function(){
    $("#competencesData").load("Assets/competences.html"); 
    $("#formationData").load("Assets/formation.html");
    $("#parcoursProData").load("Assets/parcours_Pro.html");

  });

/* creer dynamiquement une balise lien pour le format mobile uniquement pour conserver la mise en page du format PC et
   redimensionner dynamiquement en fonction du format. */

  window.onresize = resizeWindows;

  function resizeWindows() {
    const mq = window.matchMedia ("(max-width: 576px)");
    const main = document.getElementById('main');
    const min = document.getElementById('min');
    if (mq.matches) {
      document.querySelector("#bootstrapSS").removeAttribute('disabled');
        main.style.display = 'none'; 
        min.style.display = 'flex'

    } 
    else {
        document.querySelector("#bootstrapSS").setAttribute('disabled',"");
        min.style.display = 'none'
        main.style.display = 'flex';
    }

  }

