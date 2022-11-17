<?php 
class Debug{
        
    public static function log($log) {
        echo '<script>';
        echo "console.log('$log');";
        echo '</script>';
    }
    
}
?>