<?php
foreach ($product_attributes as $key=>$productAttribute){
    if($productAttribute->location == \App\Models\Utils\OptionTool::$LOCATION_MAIN){
        $maindesc = $productAttribute->valuesOf($product);
        if(count($maindesc)>0){
            $task = $maindesc[0]->value;
            echo $task;
        }
    }
}
?>

