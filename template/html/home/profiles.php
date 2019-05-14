<div class="profiles" id="escolher">


<div class="listprofile">

<h1>Quem está assistindo?</h1>

<center>
<?php for($i = 0; $i < 5; $i++){?>
<div class="profile" data-id="<?php echo $i;?>" id="profile<?php echo $i;?>">

<span>Alexandre Silva</span>

</div>
<?php }?>

<div>
<button id="gerenciar">Gerenciar perfis</button>
</div>

</center>

</div>

</div>

<?php 
if(isset($_GET['ManageProfiles'])){
    $no = 1;
} else{
require 'gerenciar.php';
}?>

<div style="padding-bottom: 5vw;"></div>

<style>
body,html{
    background: #151515;
}
</style>