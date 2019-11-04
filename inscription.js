function inscription() {

	document.getElementById('inscription').innerHTML='<form name="form2" class="formulaire2" method="post" action="Accueil.php" ><p><label for="nom">Nom:</label><span><input  type="text" name="nom" class="text" id="nom" onblur="controlenom();" required/><span id="spe"> </span></span></p><p><label for="prenom">Prénom:</label><span><input  required type="text" name="prenom" class="text" id="prenom" onblur="controleprenom();" required /><span id="spi"> </span></span></p><label>Date de naissance</label> <select size="1" name="jour" style="width:45"> <option value="01">01 <option value="02">02 <option value="03">03 <option value="04">04 <option value="05">05 <option value="06">06 <option value="07">07<option value="08">08 <option value="09">09 <option value="10">10 <option value="11">11 <option value="12">12 <option value="13">13 <option value="14">14 <option value="15">15  <option value="16">16 <option value="17">17 <option value="18">18 <option value="19">19 <option value="20">20 <option value="21">21 <option value="22">22 <option value="23">23 <option value="24">24 <option value="25">25 <option value="26">26 <option value="27">27 <option value="28">28 <option value="29">29 <option value="30">30 <option value="31">31 </select> <select size="1" name="mois" > <option value="01">Janvier  <option value="02">Fevrier <option value="03">Mars <option value="04">Avril <option value="05">Mai <option value="06">Juin <option value="07">Juillet <option value="08">Aout <option value="09">Septembre <option value="10">Octobre <option value="11">Novembre <option value="12">Decembre </select> <select size="1" name="annee" style="width:60"> <option value="1990">1990 <option value="1991">1991 <option value="1992">1992 <option value="1993">1993 <option value="1994">1994<option value="1995">1995<option value="1996">1996<option value="1997">1997 <option value="1998">1998<option value="1999">1999<option value="2000">2000<option value="2001">2001<option value="2002">2002 <option value="2003">2003 <option value="2004">2004 <option value="2005">2005 <option value="2006">2006 <option value="2007">2007<option value="2008">2008<option value="2009">2009<option value="2010">2010 <option value="2011">2011<option value="2012">2012<option value="2013">2013<option value="2014">2014 <option value="2015">2015 <option value="2016">2016</select><p><label for="LDN">Lieu de naissance:</label><span><input type="text" name="LDN" class="text" id="LDN" required/></span></p><p id="p"><label for="adresse">Adresse:</label><span><input type="text" name="adresse" class="text" id="adresse" onblur="controlemail();" required /><span id="span"> </span></span></p><p><label for="numero">Numéro:</label><input type="text" value="+221" disabled size="3px" style="width:53px" /><span><input type="text" name="numero" class="text" id="numero" style="width:152" onblur="controlenumero();" required /><span id="spa"> </span></span></p><p><label for="password">créez un mot de passe:</label><span><input type="Password" name="password" id="password" required /></span></p><p><label for="cPassword">confirmez votre mot de passe:</label><span><input type="Password" name="cPassword" id="cPassword" onblur="controleMDP();" required /><span id="spo"> </span></span></p><p><span><input id="bout" type="submit" name="Submit" value="Soumettre" /><input type="reset" value="Reset"/></span></p>';
  var a= document.getElementById("couleur");
	a.style.background="#6db244";
	var b= document.getElementById("color");
	b.style.background="#4895c4";
	}

function controlenom() {
  var nomf=document.getElementById('lastName').value;
  var resultat=nomf.search('^[A-Za-zïèéêâûôù ]{2,50}$','i');
  if (resultat) {
    document.getElementById("spe").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
  	{
    document.getElementById("spe").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
	}
}  

function controleprenom() {
  var pre=document.getElementById('firstName').value;
  var resultat=pre.search('[A-Za-zïèéêâûôù ]{2,100}$','i');
  if (resultat) {
    document.getElementById("spi").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
  	{
    document.getElementById("spi").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
	}
}  

function controlemail() {
  var email=document.getElementById('adresse').value;
  var resultat=email.search('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
  if (resultat) {
    document.getElementById("span").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
  	{
    document.getElementById("span").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
	}
}  

function controlenumero() {
  var num=document.getElementById('numero').value;
  var resultat=num.search('[7]{1}[06-8]{1}[0-9]{7}$','g');
  if (resultat) {
    document.getElementById("spa").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
  	{
    document.getElementById("spa").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
	}
}  

function controleMDP() {
  var MDP=document.getElementById('password').value;
  var cMDP=document.getElementById('cPassword').value;
  if (MDP==cMDP) {
    document.getElementById("spo").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
  else
  	{
    	document.getElementById("spo").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
    }
}  /*Niveau de sécurité à gérer et cryptage avant de mettre dans la base de données 
Penser à désactiver le bouton de soumission en utilisant un compteur*/

function checkFullName() {
  var nomf=document.getElementById('myname').value;
  var resultat=nomf.search('^[A-Za-zïèéêâûôù ]{2,50}$','i');
  if (resultat) {
    document.getElementById("vnom").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vnom").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
}  

function checkMail() {
  var email=document.getElementById('email').value;
  var resultat=email.search('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
  if (resultat) {
    document.getElementById("vmail").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vmail").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
} 

function checkZipCode() {
  var num=document.getElementById('zip').value;
  var resultat=num.search('[0-9]{5}$','g');
  if (resultat) {
    document.getElementById("vzip").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vzip").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
}

function checkMonth() {
  var num=document.getElementById('expmonth').value;
  var resultat=num.search('[01-12]{2}$','g');
  if (resultat) {
    document.getElementById("vmonth").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vmonth").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
}

function checkYear() {
  var num=document.getElementById('expyear').value;
  var resultat=num.search('[18-25]{2}$','g');
  if (resultat) {
    document.getElementById("vyear").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vyear").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
}

function checkCvv() {
  var num=document.getElementById('cvv').value;
  var resultat=num.search('[0-9]{3}$','g');
  if (resultat) {
    document.getElementById("vcvv").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vcvv").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
}

function checkCardName() {
  var nomf=document.getElementById('cname').value;
  var resultat=nomf.search('^[A-Za-zïèéêâûôù ]{2,50}$','i');
  if (resultat) {
    document.getElementById("vcname").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vcname").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
} 

function checkCardNum() {
  var num=document.getElementById('ccnum').value;
  var resultat=num.search('[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$','g');
  if (resultat) {
    document.getElementById("vccnum").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vccnum").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
}

function checkCardName() {
  var nomf=document.getElementById('cname').value;
  var resultat=nomf.search('^[A-Za-zïèéêâûôù ]{2,50}$','i');
  if (resultat) {
    document.getElementById("vcname").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vcname").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
} 

function checkAdr() {
  var nomf=document.getElementById('adr').value;
  var resultat=nomf.search('^[0-9A-Za-zïèéêâûôù ]{2,50}$','i');
  if (resultat) {
    document.getElementById("vadr").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vadr").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
} 

function checkCity() {
  var nomf=document.getElementById('city').value;
  var resultat=nomf.search('^[A-Za-zïèéêâûôù ]{2,50}$','i');
  if (resultat) {
    document.getElementById("vcity").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vcity").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
} 

function checkState() {
  var nomf=document.getElementById('state').value;
  var resultat=nomf.search('^[A-Za-zïèéêâûôù ]{2,50}$','i');
  if (resultat) {
    document.getElementById("vstate").innerHTML="<abbr title='Champ incorrect'><img src='pictures/invalidation.png'></abbr>";
  }
  else
    {
    document.getElementById("vstate").innerHTML="<abbr title='Champ correct'><img src='pictures/validation.png'></abbr>";
  }
} 