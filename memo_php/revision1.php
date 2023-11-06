
<h3>Méthode do-while</h3>
<?php
    $marques = ["Mercedes","Toyota","BMW","Tesla"];
    $nbMarque = count($marques);

    $i = 0;
    do{
        echo "Marque n°:".$i." ".$marques[$i]."<br>";
        $i++;
    }
    while($i < $nbMarque);

?>
<h3>Méthode while</h3>
<?php
    $j = 0;
    while($j < $nbMarque){
        echo "Marque n°:".$j." ".$marques[$j]."<br>";
        $j++;
    }
?>

<h3>Méthode For</h3>
<?php
    for($k = 0; $k < $nbMarque; $k++){
        echo "Marque n°:".$k." ".$marques[$k]."<br>";
    }
?>

<h3>Méthode foreach</h3>

<?php
    foreach($marques as $marque){
        echo $marque."<br>";
    }
?>

<h2>Les Tableaux ASSOCIATIFS</h2>

<?php

    $formateurs = [
        "stephane" => "mulhouse",
        "virgile" => "strasbourg",
        "micka" => "strasbourg",
        "dominique" => "colmar"
    ];

    var_dump($formateurs);
    
    ksort($formateurs);

    foreach($formateurs as $prenom => $ville){
        echo "<br>".ucfirst($prenom)." habite à ".mb_strtoupper($ville)."<br>";
    }  

?>

<h4> 2eme Exemple: client</h4>

<?php
    $clients = [
        "stephane" => [
            "adresse" => "10 rue de la Gare",
            "cp" => "67000",
            "ville" => "STRASBOURG",
            "tel" => "0988776666"
        ],
    
        "virgile" => [
            "adresse" => "1 rue Principale",
            "cp" => "68100",
            "ville" => "MULHOUSE",
            "tel" => "0677889999"
        ]
    ];

    var_dump($clients);

    foreach($clients as $prenom => $coordonnees){
        echo "<br>";
        echo "<br>";
        echo ucfirst($prenom)." habite au ".$coordonnees["adresse"]." ".$coordonnees["ville"]." ".$coordonnees["cp"]." et repond au ".$coordonnees["tel"]."<br>";
    }
?>

<h2>Les FONCTIONS</h2>

<?php
// Créer une fct° qui affiche un message

function afficherMessage(){
    $message = "Voici mon message";
    return $message."<br>";
}
echo afficherMessage(); 

// Créer une fct° qui calcule le carré d'un nombre

function calculerCarre($nombre){
    if(gettype($nombre) == "integer"){
        $resultat = $nombre * $nombre;
        return $resultat."<br>";
    } else{
        return "Erreur : la valeur doit être un nombre entier !<br>";
    }
}

echo "le carre de 3 est :".calculerCarre(3);

// ftc° qui calcule la moyenne de chaque élève

$eleves = [
    "cindy" => [12, 9, 19, 17, 12, 13],
    "pascal" => [8, 9, 12, 10, 17]
];

foreach($eleves as $prenom => $notes){
    echo "La moyenne de $prenom est : ".calculerMoyenne($notes)."<br>";
}

function calculerMoyenne (array $notes) : float{
    $nbNotes = count($notes);
    $sommeNotes = array_sum($notes);
    $moyenne = round($sommeNotes / $nbNotes, 2);

    return $moyenne;
} 

// fct° Verifier si nombre est paire 

function isNbPaire($nombre) : string{
    if(gettype($nombre) == "integer"){
        switch($nombre % 2 == 0){
            case true :
                $resultat = "pair<br>";
                break;
            case false :
                $resultat = "impair<br>";
                break;
            default : echo "Erreur";
        }
    } else{
        echo "Entrez un nombre entier! <br>";
    }

    return "$nombre est $resultat";
}

echo isNbPaire(4);

// fct° qui repete un mot 

function repeterMot(string $mot, int $nbRepetitions, string $separateur){
    $resultat = "";
    foreach(range(1, $nbRepetitions) as $valeur){
        $resultat .= $mot.$separateur;
    }
    return $resultat."<br>";
}

echo repeterMot("youpi",6,"/");
echo repeterMot("moelleux",7,"+");

echo str_repeat("OUii",10);
?>