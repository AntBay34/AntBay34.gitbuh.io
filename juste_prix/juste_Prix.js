document.querySelector("#bt_play").addEventListener("click", play);

let player_1="";
let returnConsole=1;
let userValue=0;
let difference =0;
let nbUserAlreadyTested = new Array();
let count = 0;
let audio = new Audio('src/congratulations-sound.mp3');
/*let nbUserAlreadyTest= []; */
/*let count=0;*/

function play(){
    endAnimLogo();
    player_1=document.querySelector("#name_player_1").value;

    document.querySelector("#idPlayerField").style.display="none";
	document.querySelector("#game").style.display="block";

  /*  returnConsole=document.querySelector("div.active").id
    document.querySelector(".console").innerHTML=returnConsole; */

    document.querySelector("#essaiPrix").addEventListener("click", stopPrice);
}
function stopPrice() {
    returnConsole=document.querySelector("div.active").id
    /*document.querySelector(".console").innerHTML=returnConsole;*/
}

document.querySelector("#userEnter").addEventListener("click", launch);

function launch() {
    game();
    attemptUser();
}

function game() {
    userValue=document.querySelector("#essaiPrix").value;
    /*document.querySelector(".a").innerHTML=userValue;*/
    if (returnConsole == userValue) {
        document.querySelector(".result").innerHTML="Gagné !";
        won();
    }
    else if (userValue > 100){
        document.querySelector(".result").innerHTML="Non ! on a dit entre 0 et 100€ !";
    }
    else if (userValue <= 0){
        document.querySelector(".result").innerHTML="Non ! ça c'est pas possible !";
    }
    else {
            difference = userValue - returnConsole;
            /*document.querySelector(".tab").innerHTML=difference;*/
           if ((0<difference) && (difference<=10)) {
            document.querySelector(".result").innerHTML="C'est un tout petit peu moins !";
           }
           else if ((11<=difference) && (difference<=20)) {
            document.querySelector(".result").innerHTML="C'est un petit peu moins !";
           }
           else if ((21<=difference) && (difference<=30)) {
            document.querySelector(".result").innerHTML="C'est un peu moins !";
           }
           else if ((31<=difference) && (difference<=50)) {
            document.querySelector(".result").innerHTML="C'est carrément moins !";
           }
           else if (difference>50) {
            document.querySelector(".result").innerHTML="tu crois que c'est si cher sans déconner ?!";
           }
            else if ((0>difference) && (difference>=-10)) {
            document.querySelector(".result").innerHTML="C'est un tout petit peu plus !";
           }
           else if ((-10>difference) && (difference>=-20)) {
            document.querySelector(".result").innerHTML="C'est un petit peu plus !";
           }
           else if ((-20>difference) && (difference>=-30)) {
            document.querySelector(".result").innerHTML="C'est un peu plus !";
           }
           else if ((-30>difference) && (difference>=-50)) {
            document.querySelector(".result").innerHTML="C'est carrément plus !";
           }
           else {
            document.querySelector(".result").innerHTML="tu crois qu'on va te le donner aussi non ?!";
           }
        }
    }
    function attemptUser() {
        
        let attempt = document.querySelector("#essaiPrix").value;
        
        
        if ((attempt <=0) || (attempt > 100)) {

            document.querySelector(".result_2").innerHTML="On ne le compte pas dans les 10 essais du coup..";
        }

        else if (nbUserAlreadyTested.includes(attempt)) {

            document.querySelector(".result_2").innerHTML="mais tu l'a déja essayé alors on le compte pas !";
        }
        else {
        /*document.querySelector(".attempt").innerHTML=attempt;*/
        nbUserAlreadyTested[count] = attempt;
        count ++;
        document.querySelector(".result_2").textContent = "";
        document.querySelector(".tab").innerHTML = nbUserAlreadyTested.join(" / ");
        /*for(let valeur of nbUserAlreadyTested){
        document.querySelector(".tab").innerHTML += valeur + " / ";
        }*/
        console.log(nbUserAlreadyTested);
            if (count>=10) {
                lost()
            }
        }
        /*document.querySelector(".count").innerHTML=count;*/
        /*nbUserAlreadyTested.splice(count, 0, attempt)
        document.getElementsByClassName(tab).innerHTML = nbUserAlreadyTest.join("");*/
    }
    document.querySelector("#tryAgain").addEventListener("click", tryAgainGame );

    function lost() {
        document.querySelector("#afterCarDiv").style.display="none";
        document.querySelector(".tryAgainButton").style.display="block";
        count = 0;
        nbUserAlreadyTested.splice(0,10,)
        document.querySelector(".tab").textContent = "";
        document.querySelector(".result").textContent = "";

    }
    function tryAgainGame() {
        document.querySelector("#afterCarDiv").style.display="flex";
        document.querySelector(".tryAgainButton").style.display="none";
        

    }
    function openWindow(){
        //On recupère l'information renvoyée par open() dans une variable "fenetre"
        window.open('felicitations.html', "felicitations !", "menubar=yes,width=900,height=500");
    }


    function won() {
        lost()
        openWindow();
        audio.play()
    }
    function endAnimLogo() {
        document.querySelector(".divLogo").style.animation="none";
        document.querySelector(".logo").style.width="150px";
        document.querySelector(".logo").style.border="2px solid white";

    }



    /* J'ai trouvé cette fonction pour filtrer les caractères (içi on autorise les nombres seulement)
    mais j'ai préféré passer mon input en type="number".

    function verifierCaracteres(event) {
	 		
        var keyCode = event.which ? event.which : event.keyCode;
        var touche = String.fromCharCode(keyCode);
                
        var champ = document.getElementById('essaiPrix');
                
        var caracteres = '0123456789';
                
        if(caracteres.indexOf(touche) >= 0) {
            champ.value += touche;
        }
                
    }*/
   
        