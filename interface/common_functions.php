<?php

function med_unit($val){
        $units = ['1'=>'mg', '2'=>'mg/1cc','3'=>'mg/2cc','4'=>'mg/3cc','5'=>'mg/4cc','6'=>'mg/5cc','7'=>'mcg','8'=>'grams','9'=>'mL'];
        return $units[$val];
}

function med_form($val) {
        $forms = ['1'=>'suspension','2'=>'tablet','3'=>'capsule','4'=>'solution','5'=>'tsp','6'=>'ml','7'=>'units','8'=>'inhalations','9'=>'gtts(drops)','10'=>'cream','11'=>'ointment','12'=>'puff'];
        return $forms[$val];
}

function med_route($val) {
        $routes = ['1'=>'Per Oris','2'=>'Per Rectum','3'=>'To Skin','4'=>'To Affected Area','5'=>'Sublingual','6'=>'OS','7'=>'OD','8'=>'OU','9'=>'SQ','10'=>'IM','11'=>'IV','12'=>'Per Nostril','13'=>'Both Ears','14'=>'Left Ear','15'=>'Right Ear','inhale'=>'Inhale','intradermal'=>'Intradermal','other'=>'Other/Miscellaneous','transdermal'=>'Transdermal','intramuscular'=>'Intramuscular'];
        return $routes[$val];
}

function med_interval($val) {
        $interval = ['1'=>'b.i.d','2'=>'t.i.d','3'=>'q.i.d','4'=>'q.3h','5'=>'q.4h','6'=>'q.5h','7'=>'q.6h','8'=>'q.8h','9'=>'q.d','10'=>'a.c','11'=>'p.c','12'=>'a.m','13'=>'p.m','14'=>'ante','15'=>'h','16'=>'h.s','17'=>'p.r.n','18'=>'stat'];
        return $interval[$val];
}
?>
