<?php
if(isset($_COOKIE['idser']) && isset($_COOKIE['cry'])){
    template('home', 'index');
} else{
    template('dashboard', 'index');
}