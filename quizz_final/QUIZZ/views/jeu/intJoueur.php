
<div class="container right" style="width: 700px; height:580px;border-radius: 10px; border: solid #51bfd0 3px;margin:19px 0px 0px 0px;align-content: center;">
<div class="right-one" style="height: 150px; width: 650px; border:solid 1px #51bfd0 ;text-align: center;margin: 17px 0px 0px 6px; background-color: #e7e8e8;">
<?php




$questionsParPage=1; //Nous allons afficher 1 question par page.
 
//Une connexion SQL doit être ouverte avant cette ligne...
$quest=$this->managerQ->findAll();
$questDis=$this->managerQ->findDistinct();
$total=count($questDis); //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$questionsParPage);
 
if(isset($_GET['url'])) // Si la variable $_GET['page'] existe...
{
     $lienJ= explode ("/",$_GET['url']);
     if (isset($lienJ[2])) {
      $pageActuelle=intval($lienJ[2]);
     }else {
      $pageActuelle=$_SESSION['page'];
     }
     
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 


$premiereEntree=($pageActuelle-1)*$questionsParPage; // On calcule la première entrée à lire
$premierefin=$premiereEntree+$questionsParPage-1;
// La requête sql pour récupérer les messages de la page actuelle.

?>

<div style="margin: 23px 0px 0px 0px;font-family: bold underlined; font-size: 28px;font-style: italic;"> QUESTION <?php echo $pageActuelle ?>/5:</div>
<div style="margin: 6px 0px 0px 0px;font-family: bold ; font-size: 28px;"> <?php echo $questDis[$pageActuelle-1]->getQuestion() ?></div>
</div>
<form method="post" action="<?=WEBROOT?>/jeu/intJoueur">
<div class="right-one" style="height: 45px; width: 55px; border:solid 1px #51bfd0 ;margin: 15px 0px 0px 562px; background-color: #e7e8e8;">
<div style="font-family:bold ;font-size: 25px;text-align: center;"> <?php echo $quest[$pageActuelle-1]->getNbrePoint()?>pts</div>

<?php
for($i=$premiereEntree; $i<=$premierefin; $i++){   //On fait notre boucle

for ($j=0; $j <count($quest) ; $j++) { 

  if($questDis[$i]->getQuestion()==$quest[$j]->getQuestion()) //S'il s'agit de la page actuelle...
     {

{
     //On va faire notre condition
     if($quest[$j]->getType()=="cm"){
      ?>


     </div>
        <div style=" margin: 0px 0px 0px 64px;font-size: 35px;">
        <input type="checkbox" classe="checkbox" name="fichier" id="check <?= $j?> " value="1" <?php if(isset($_POST["fichier"])) echo "checked=". checked; ?> />
        <label ><?=$quest[$j]->getReponses()?></label>
      

<?php

     }elseif ($quest[$j]->getType()=="cs") {
       
      echo '</div>
        <div style=" margin: 0px 0px 0px 64px;font-size: 35px;">
        <input type="radio" name="fiche" id="check1" >
        <label >'.$quest[$j]->getReponses().'</label>';
     }else{

      echo '</div>
        <div style=" margin: 0px 0px 0px 64px;font-size: 35px;">
        <input type="text" name="fichierT" id="check1" >';

     }
         
            
     }    

    }
    }

  }
    


        if ($pageActuelle==1) {
         
        

        ?>
        </div>
        <div>
            <button type="submit" class="btn pt-2" style="font-family: bold; width:100px;height:50px ; background-color:#818181 ; color: #f8fdfd;margin: 21px 0px 0px 0px" disabled > Precédent </button>
          
          <?php 
          
        }else{
          
          ?>
          </div>
          <div>
            
            
           <button value="Précédent" class="btn pt-2" id="Précédent" style=" font-family: bold;width:100px;height:50px ; background-color:#3addd6 ; color: #f8fdfd;margin: 21px 0px 0px 0px"  name="precedent" type="submit" >Precedent</button>
            <?php 

        }
            if($pageActuelle!=5){
              
              ?>
            <button value="Suivant" class="btn pt-2" id="Suivant" style=" font-family: bold;width:100px;height:50px ; background-color:#3addd6 ; color: #f8fdfd;margin: -102px 7px 0px 458px" name="suivant" type="submit">Suivant</button>
                
              <?php  
            }else{
              ?>
             

            <input type="button"  value="Terminer" class="btn pt-2" id="Terminer" style=" font-family: bold;width:100px;height:50px ; background-color:#3addd6 ; color: #f8fdfd;margin: -102px 7px 0px 458px" onClick="document.location.href='<?=WEBROOT?>/jeu/intJoueur/<?=$pageActuelle+1?>'" />
            <script>
                var btn = document.getElementById('Terminer');
                btn.addEventListener('click', function() {
                btn.setAttribute("type" ,"submit")
                });
                </script>
        <?php
            }
              ?>
        
        </div>
        </form>
        </div>

        <script>
        const checkbox = document.querySelectorAll(".checkbox")
        console.log()
        for(let elt of checkbox){
            alert azertyuiop
          }

        function verifyCheckBoxes(source)
        {
            if((document.getElementById("button-checkbox-1").checked == false) && (document.getElementById("button-checkbox-2").checked == false))
            {
                if(source == '1')
                {
                    document.getElementById("button-checkbox-2").checked = true;
                }
                if(source == '2')
                {
                    document.getElementById("button-checkbox-1").checked = true;
                }
            }
        }
        </script>