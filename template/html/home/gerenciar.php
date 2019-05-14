<div class="profiles" id="gerenciart2">
<div id="gerenciart">

<h1>Gerenciar perfis:</h1>

<center>
<?php for($i = 0; $i < 5; $i++){?>
<div class="profile" data-id="<?php echo $i;?>" id="profile<?php echo $i;?>">

<div class="edit"><i class="fas fa-pencil-alt"></i></div>
<span>Alexandre Silva</span>

</div>
<?php }?>

<div>
<button id="ok" class="white_btn">OK</button>
</div>

</center>

</div>
</div>

<script>
var gerenciar = 0;
var left = 140;
var escolher = 50;

$("#gerenciar").click(function(){
    if(gerenciar == 0){
        left = 50;
        gerenciar = 1;
        escolher = -140;
    } else{
        left = 140;
        escolher = 50;
    }
    $("#gerenciart").css("left", left + "%");
    $("#gerenciart2").css("left", left + "%");
    $("#escolher").css("left", escolher + "%");
});

$("#ok").click(function(){
    if(gerenciar == 1){
        left = -140;
        gerenciar = 0;
        escolher = 50;
    } else{
        left = 50;
        escolher = -140;
    }
    $("#gerenciart").css("left", left + "%");
    $("#gerenciart2").css("left", left + "%");
    $("#escolher").css("left", escolher + "%");
});
</script>

<?php
if(isset($_GET['gerenciar'])){
require 'profiles.php';?>
?>
<style>
.gerenciar{
    left: 50%;
}

.profiles{
    left: 140%;
}
</style>

<script>
gerenciar = 1;
left = 50;
</script>

<?php } else{ ?>
<style>
.gerenciar{
    left: 140%;
}

.profiles{
    left: 50%;
}
</style>

<script>
gerenciar = 0;
left = 200;
</script>
<?php }?>