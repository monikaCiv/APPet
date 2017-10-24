<?php 

$daily = "";
$food = "";
$tip = "";
$game = "";
$outside = "";

//setting $food up 

if ($pet['pet_species']=="1") {
	$game = "Igrati se sa psom što više. <br> Nabaviti nekoliko igračaka (loptica, frizbi, uže).";
	$tip = "Uvijek dostupna svježa voda. <br> Posudice s hranom održavati čistima.";
	switch($pet['pet_age']) {
		case "do 8 tjedana ":
			$food = "Sisanje ili zamjensko mlijeko. <br> Rasporediti na 3-4 obroka na dan.";
		break;
		case "8 tjedana do 6 mjeseci";
			$food = "Posebna hrana za mladunce (kalcij i proteini).<br> 
			Paziti na ponašanje i u slučaju gubitka apetita posjetiti veterinara. <br> 2 obroka na dan.";
		break;
		case "6 do 12 mjeseci":
			$food = "Kvalitetna hrana, većinom piletina. <br> 2 obroka na dan.";
		break;
		case "odrasli pas":
			$food = "Razne vrste mesa, povrće, voće. <br> Hrana bez mnogo začina.<br>Suha i konzervirana hrana.";
		break;
		default:
			$food = "Namirnice za psa!";
	}
	switch ($pet['pet_weight']) {
		case "do 4 kg":
			$daily = "60 - 180 grama hrane";
			$outside = "Voditi ga van 3 - 4 puta na dan po desetak minuta. <br>Za to vrijeme se preporučuje šetnja, ali može i igra.";
		break;
		case "4-11 kg":
			$daily = "180 - 250 grama hrane";
			$outside = "Voditi ga van 3 - 4 puta na dan po desetak minuta. <br>Za to vrijeme se preporučuje šetnja, ali može i igra.";
		break;
		case "11-22 kg":
			$daily = "250 - 500 grama hrane";
			$outside = "Voditi ga van 2 puta na dan. <br> Šetnje od minimalno 15 minuta. <br> Nakon šetnje moguće i druge aktivnosti.";
		break;
		case "22-35 kg":
			$daily = "500 - 600 grama hrane";
			$outside = "Voditi ga van 2 puta na dan. <br> Šetnje od minimalno 15 minuta. <br> Nakon šetnje moguće i druge aktivnosti.";
		break;
		case "iznad 35 kg":
			$daily = "600 - 950 grama hrane";
			$outside = "Voditi ga van 2 puta na dan. <br> Šetnje od minimalno 15 minuta. <br> Nakon šetnje moguće i druge aktivnosti.";
		break;
		default:
			$daily= "Količina hrane.";
			$outside = "Aktivnosti.";
	}
	if ($pet['pet_age'] != "odrasli pas") {
		$outside = "Voditi ga van 3 - 5 puta na dan te kombinirati šetnju s drugim aktivnostim. <br> Boraviti vani minimalno 10 minuta po izlasku.";
	} 
} elseif ($pet['pet_species']=="2") { 
	$game = "Igrati se s mačkom što više. <br> Nabaviti nekoliko igračaka (klupko, plišani miševi i slično).";
	$tip = "Uvijek dostupna svježa voda. <br> Posudice s hranom održavati čistima.";
	$outside = "Kućna mačka nema potrebu za izlaskom van.  Može ju se izvesti po želji, ali ju držati pod nadzorom. <br> 
	Mački koja boravi i vani i u kući poželjno osigurati prolaz tako da može ući i izaći kada god to želi.";
	switch($pet['pet_age']) {
		case "do 10 tjedana":
			$food = "4 ili više malih obroka na dan. <br> Mlijeko, posebna hrana za mačiće.";
			$daily = "300-500 grama hrane";
		break;
		case "10 tjedana do 6 mjeseci":
			$food = "Hraniti 3 puta dnevno. <br> Jetrica i srce jednom tjedno. <br> Meso, riba, riža, mlijeko, jaja. <br> Suha i konzervirana hrana.";
			$daily = "500-700 grama hrane";
		case "6 do 12 mjeseci":
			$food = "Hraniti 2 puta na dan. Jetrica i srce jednom tjedno. <br> Meso, riba, riža, mlijeko, jaja. <br> Suha i konzervirana hrana.";
			$daily = "550-750 grama hrane"; 
		break;
		case "odrasle macka":
			$food = "Mokra hrana ujutro, suha hrana navečer. <br> Jetrica i srce jednom tjedno. <br> Meso, riba, riža, mlijeko, jaja. <br> Suha i konzervirana hrana. <br> 2 obroka dnevno.)";
			$daily = "400-800 grama hrane"; 
		break;
		default: 
			$food = "Namirnice za mačke.";
			$daily = "Količina hrane."; 
	}
} else {	
	if ($pet['pet_weight'] == "zamorac") {
		$food = "Obična trava, celer, mrkva, krastavci, kukuruz, mahunarke, kelj. <br> Voće poput jagoda i jabuka.
		<br>Izbjegavati kupus, cvjetačku, brokulu i slično povrće. <br> Sijeno od mješavine biljaka.";
		$daily = "Jedna šalica hrane (2.2 dcl) na dan koju je potrebno podijeliti na dva obroka.";
		$tip = "Dovoljno velik kavez (minimalno 2 metra kvadratna). <br>Držati ih u blizini ljudi.
		<br>Čista i uvijek puna bočica s vodom. <br> Uvijek dostupno sijeno.";
		$game = "Opremiti kavez raznim igračkama za zamorce. Nabaviti još jednog zamorca.";
		$outside = "Pustiti svaki dan po nekoliko minuta iz kaveza kako bi protrčao po sobi.";
	} elseif ($pet['pet_weight'] == "hrcak") {
		$food = "Hraniti jednom dnevno. <br>Mješavina sjemnki i sušenog voća. <br> Ponekad svježe jabuke, banane, mrkva, krastavac i drugo povrće";
		$daily = "Dnevna količina hrane od 8 do 15 grama. <br> Količina dovoljna da hrčak napuni oba obraza.";
		$tip = "Pobrinuti se da je kavez dovoljno velik i uvijek čist. <br> Uvijek dostupna svježa voda. <br> Paziti da je cjevčica za vodu čista.";
		$game = "Osigurati dovoljan broj igračaka i kotača. <br> Paziti na veličinu kotača. <br> Skrivati hranu po tunelima unutar kaveza.";
		$outside = "Pustiti van iz kaveza na nekoliko minuta, ali ga držati na oku.";
	} else {
		if ($pet['pet_age'] == "odrasli glodavac") {
		$food = "Špinat, mrkva, brokula, celer, jabuke, maline, špinat, borovnice, sve vrste luka...<br>
		Razne vrste svježeg povrća i voća.<br>Sijeno raznih vrsta trava.<br>Mala količina peleta (mješavina sjemenki).<br>Hraniti 2 puta dnevno.";
		$daily = "Oko 200 grama hrane.<br>30 grama peleta.";
		} else {
				$food = "Špinat, mrkva, brokula, celer, jabuke, maline, špinat, borovnice...<br>
				Razne vrste svježeg povrća i voća.<br>Sijeno.<br>Mala količina peleta (mješavina sjemenki).<br>Hraniti 2 puta dnevno.";
				$daily = "Neograničene količine sijena i peleta nakon prestanka sisanja. <br> Oko 150 grama ostale hrane.";
		}
		$tip = "Uvijek dostupna svježa voda. <br> Uvijek dostupno sijeno koje treba redovito mijenjati. <br> Kavez održavati čistim.";
		$game = "Razne igračke dostupne u kavezu i vani. Individualna igra i igra s vlasnikom.";
		$outside = "Puštati iz kaveza 2-3 sata na dan. Idealno vani, ali može i u zatvorenom prostoru.";
	
	}
}
 

