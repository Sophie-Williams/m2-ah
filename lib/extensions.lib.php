<?PHP
  $eProSeite=10;
  
  $sqlZeit = date("Y-m-d H:i:s",time());
  
  $itemBoni = array(
   '0' =>'KEINER:',
   '1' =>'MAX TP:',
   '2' =>'MAX MP:',
   '3' =>'VIT:',
   '4' =>'INT:',
   '5' =>'STR:',
   '6' =>'DEX:',
   '7' =>'Angreiffsgeschwindigkeit',
   '8' =>'Bewegungsgeschwindigket',
   '9' =>'Zaubergeschwindigkeit',
   '10' =>'TP-Regeneration',
   '11' =>'MP-Regeneration',
   '12' =>'Vergiftungschance',
   '13' =>'Ohnmachtschance',
   '14' =>'Verlangsamungschance',
   '15' =>'Chance auf Krit',
   '16' =>'Chance auf DB',
   '17' =>'Stark gegen Halbmenschen',
   '18' =>'Stark gegen Tiere',
   '19' =>'Stark gegen Orks',
   '20' =>'Stark gegen Esoterische',
   '21' =>'Stark gegen Untote',
   '22' =>'Stark gegen Teufel',
   '23' =>'Schaden wird von TP absorbiert',
   '24' =>'Schaden wird von MP absorbiert',
   '25' =>'Chance MP des gegners zu �bernehmen',
   '26' =>'Chance MP bei treffer zur�ckzuerhalten',
   '27' =>'Chance k�rperlichen angrif abzublocken',
   '28' =>'Chance pfeilangriff auszuweichen',
   '29' =>'Schwertverteidigung',
   '30' =>'Zweihandverteidigung',
   '31' =>'Dolchverteidigung',
   '32' =>'Glockenverteidigung',
   '33' =>'F�cherverteidigung',
   '34' =>'Pfeilwiderstand',
   '35' =>'Feuerwiderstand',
   '36' =>'Blitzwiderstand',
   '37' =>'Magiewiderstand',
   '38' =>'Windwiderstand',
   '39' =>'Chance k�rperlichen Angriff zu reflektieren',
   '40' =>'Chance Fluch zu reflektieren',
   '41' =>'Giftwiderstand',
   '42' =>'Chance MP wiederherzustellen',
   '43' =>'Chance auf exp bonus',
   '44' =>'Chance doppelt Yang',
   '45' =>'Chance doppelte mege gegenst�nde zu droppen',
   '46' =>'Trank effekt zuwachs',
   '47' =>'Chance TP wiederherrzustellen',
   '48' =>'abwehr gegen ohnmacht',
   '49' =>'abwehr gegen verlangsamen',
   '50' =>'Imun gegen St�rzen',
   '52' =>'Bogenreichweite +',
   '53' =>'Angriffswert +',
   '54' =>'Verteidigung',
   '55' =>'Magischer AW',
   '56' =>'Magische Verteidigung',
   '58' =>'Max. Ausdauer',
   '59' =>'Stark gegen Krieger',
   '60' =>'Stark gegen Ninja',
   '61' =>'Stark gegen Sura',
   '62' =>'Stark gegen Schamanen',
   '63' =>'Stark gegen Monster',
   '64' =>'Angriffswert +?',
   '65' =>'Verteidigung',
   '66' =>'EXP +?%',
   '67' =>'Dropchance [Gegenst�nde]',
   '68' =>'Dropchance [Gold]',
   '71' =>'Fertigkeitsschaden',
   '72' =>'Durchschnittsschaden',
   '73' =>'Widerstand gegen Fertigkeitsschaden',
   '74' =>'durchschn. Schadenswiderstand',
   '76' =>'iCafe exp-bonus',
   '77' =>'iCafe Chance auf erbeuten von gegenst�nden',
   '78' =>'Abwehrchance gegen Kriegerangriffe',
   '79' =>'Abwehrchance gegen Ninjaangriffe',
   '80' =>'Abwehrchance gegen Suraangriffe',
   '81' =>'Abwehrchance gegen Schamanenangriffe'
  );

  $itemSteine = array(
    '0' => 'Leerer Slot',
    '1' => 'Freier Slot',
    '28960' => 'Splitter',
    '28030' => 'Durchbruch+0',
    '28130' => 'Durchbruch+1',
    '28230' => 'Durchbruch+2',
    '28330' => 'Durchbruch+3',
    '28430' => 'Durchbruch+4',
    '28530' => 'Durchbruch+5',
    '28630' => 'Durchbruch+6',
    '28031' => 'Todessto�+0',
    '28131' => 'Todessto�+1',
    '28231' => 'Todessto�+2',
    '28331' => 'Todessto�+3',
    '28431' => 'Todessto�+4',
    '28531' => 'Todessto�+5',
    '28631' => 'Todessto�+6',
    '28032' => 'Wiederkehr+0',
    '28132' => 'Wiederkehr+1',
    '28232' => 'Wiederkehr+2',
    '28332' => 'Wiederkehr+3',
    '28432' => 'Wiederkehr+4',
    '28532' => 'Wiederkehr+5',
    '28632' => 'Wiederkehr+6',
    '28033' => 'Krieger+0',
    '28133' => 'Krieger+1',
    '28233' => 'Krieger+2',
    '28333' => 'Krieger+3',
    '28433' => 'Krieger+4',
    '28533' => 'Krieger+5',
    '28633' => 'Krieger+6',
    '28034' => 'Ninja+0',
    '28134' => 'Ninja+1',
    '28234' => 'Ninja+2',
    '28334' => 'Ninja+3',
    '28434' => 'Ninja+4',
    '28534' => 'Ninja+5',
    '28634' => 'Ninja+6',
    '28035' => 'Sura+0',
    '28135' => 'Sura+1',
    '28235' => 'Sura+2',
    '28335' => 'Sura+3',
    '28435' => 'Sura+4',
    '28535' => 'Sura+5',
    '28635' => 'Sura+6',
    '28036' => 'Schamane+0',
    '28136' => 'Schamane+1',
    '28236' => 'Schamane+2',
    '28336' => 'Schamane+3',
    '28436' => 'Schamane+4',
    '28536' => 'Schamane+5',
    '28636' => 'Schamane+6',
    '28037' => 'Monster+0',
    '28137' => 'Monster+1',
    '28237' => 'Monster+2',
    '28337' => 'Monster+3',
    '28437' => 'Monster+4',
    '28537' => 'Monster+5',
    '28637' => 'Monster+6',
    '28038' => 'Ausweichen+0',
    '28138' => 'Ausweichen+1',
    '28238' => 'Ausweichen+2',
    '28338' => 'Ausweichen+3',
    '28438' => 'Ausweichen+4',
    '28538' => 'Ausweichen+5',
    '28638' => 'Ausweichen+6',
    '28039' => 'Ducken+0',
    '28139' => 'Ducken+1',
    '28239' => 'Ducken+2',
    '28339' => 'Ducken+3',
    '28439' => 'Ducken+4',
    '28539' => 'Ducken+5',
    '28639' => 'Ducken+6',
    '28040' => 'Magie+0',
    '28140' => 'Magie+1',
    '28240' => 'Magie+2',
    '28340' => 'Magie+3',
    '28440' => 'Magie+4',
    '28540' => 'Magie+5',
    '28640' => 'Magie+6',
    '28041' => 'Vitalit�t+0',
    '28141' => 'Vitalit�t+1',
    '28241' => 'Vitalit�t+2',
    '28341' => 'Vitalit�t+3',
    '28441' => 'Vitalit�t+4',
    '28541' => 'Vitalit�t+5',
    '28641' => 'Vitalit�t+6',
    '28042' => 'Schutz+0',
    '28142' => 'Schutz+1',
    '28242' => 'Schutz+2',
    '28342' => 'Schutz+3',
    '28442' => 'Schutz+4',
    '28542' => 'Schutz+5',
    '28642' => 'Schutz+6',
    '28043' => 'Hast+0',
    '28143' => 'Hast+1',
    '28243' => 'Hast+2',
    '28343' => 'Hast+3',
    '28443' => 'Hast+4',
    '28543' => 'Hast+5',
    '28643' => 'Hast+6',
    '28000' => 'Stein des Masakers+0 (100% Chance MP des Gegners zu �bernehmen)',
    '28100' => 'Stein des Masakers+1 (Durchschn. Schadenswiederstand 100%)',
    '28200' => 'Stein des Masakers+2 (Magiewiederstand 100%)',
    '28300' => 'Stein des Masakers+3 (Schwerverteidigung 100%)',
    '28004' => 'Stein der Paranoia+0 (70% Chance MP des gegners zu �bernehmen)',
    '28104' => 'Stein der Paranoia+1 (Wiederstand gegen Fertigkeitsschaden 100%)',
    '28204' => 'Stein der Paranoia+2 (Magiewiederstand 70%)',
    '28304' => 'Stein der Paranoia+3 (Schwerverteidigung 70%)',
    '28008' => 'Stein des Traumas+0 (50% Chance MP des Gegners zu �bernehmen)',
    '28108' => 'Stein des Traumas+1 (Durchschn. Schadenswiederstand 50%)',
    '28208' => 'Stein des Traumas+2 (Magiewiederstand 50%)',
    '28308' => 'Stein des Traumas+3 (Schwerverteidigung 50%)',
    '28012' => 'Stein der Dummheit+0 (30% Chance MP des Gegners zu �bernehmen ',
    '28112' => 'Stein der Dummheit+1 (Wiederstand gegen Fertigkeitsschaden 50%)',
    '28212' => 'Stein der Dummheit+2 (Magiewiederstand 30%)',
    '28312' => 'Stein der Dummheit+3 (Schwerverteidigung 30%)'
  );
  
  $gReiche = array(
    '1' => 'Rot',
    '2' => 'Gelb',
    '3' => 'Blau'
  );
  
  
  $aRassen = array(
    '0' => 'Krieger (m)',
    '1' => 'Ninja (w)',
    '2' => 'Sura (m)',
    '3' => 'Schamane (w)',
    '4' => 'Krieger (w)',
    '5' => 'Ninja (m)',
    '6' => 'Sura (w)',
    '7' => 'Schamane (m)'
  );
  
  $gmRechte = array(
    'SGA' => 'IMPLEMENTOR',
    'GA' => 'HIGH_WIZARD',
    'GM' => 'GOD',
    'TGM' => 'LOW_WIZARD',
    'PLAYER' => 'PLAYER'
  );
  
  $resetPos = array();
  $resetPos[1]['map_index']=1; // Rotes Reich
  $resetPos[1]['x']=468779;
  $resetPos[1]['y']=962107;
  $resetPos[2]['map_index']=21; // Gelbes Reich
  $resetPos[2]['x']=55700;
  $resetPos[2]['y']=157900;
  $resetPos[3]['map_index']=41; // Blaues Reich
  $resetPos[3]['x']=969066;
  $resetPos[3]['y']=278290;
  
  $pscBetraege = array(10,25,50,100);
  
  $coinsBetraege = array(
    '10' => '11000000',
    '25' => '30000000',
    '50' => '60000000',
    '100' => '120000000',
  );
  
  $waehrungen = array(
    'EUR' => 'Euro',
    'CHF' => 'Schweizer Franken'
  );
  
  $kartenTypen = array(
    'PSC' => 'Paysafecard',
    'Ukash' => 'Ukash'
  );
  
  $sFrage = array(
    1 =>'Evcil Hayvan�n�z�n Ad�?',
    2 =>'Annenizin Ad�?',
    3 =>'Baban�z�n Ad�?',
    4 =>'Ana Vatan�n�z?',
    5 =>'En �yi Arkada��n�z�n Ad�?',
    6 =>'Araban�z�n Plakas�?'
  );
  
  $banGruende = array(
    0 => 'Hacking',
    1 => 'Bugusing',
    2 => 'Beleidigung',
    3 => 'Anderer'
  );
  
  $newsKategorien = array(
    0 => 'Allgemein',
    1 => 'Ank&uuml;ndigung',
    2 => 'Event',
    3 => 'Server',
    4 => 'Wartung'
  );
?>