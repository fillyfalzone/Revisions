
    <h1> LA POO EN PHP</h1>
    <h2> Une Classe</h2>
    <p>
        <strong>Une Class</strong> est un fichier que permet de décrire un objet dans un cadre établi. 
    </p>
        <h3>Creer une <strong>Class</strong> Ordinateur</h3>
    
        <code>
            <?php
                Class Ordinateurs{
                    private $_marque;
                    private $_modele;
                    private $_ecran;
                    private $_statu = 0;
                    
                    public function allumer(){
                        $this->_statu = 1;
                    }
                }

                $poste = new Ordinateurs();
                $poste->allumer();
            ?>
        </code>
    

    <h2>Le Constructeur</h2>
    <p>le <strong>Constructeur</strong> d'une Class permet de l'initialiser en lui assignant des valeurs ou en appelant diverses méthodes qui on cette fonction.
    </p>
    <h3>Ex: Le constructeut de notre Class Ordinateur</h3>
    <code>
        <?php
            class Ordinateur{
                private $_marque;

                public function __construct($marque){
                    $this->_marque = $marque;
                }
            }
            $poste = new Ordinateur("Samsung");
            //On crééra un objet Ordinateur de marque Samsung
         ?>
    </code>

    <h2>Les Accesseurs et Mutat "Getter et Setter.</h2>
    <h3>Les Accesseurs "Getter"</h3>
    <?php
        //Ordinateur.Class.php
        Class Ordinateurss{
            private $_marque;
            public function __construct($marque){
                $this->_marque = $marque;
            }
            public function getMarque(){
                return $this->_marque;
            }
        }
        $poste = new Ordinateur("samsung");
        echo $poste->getMarque(); //affichera "samsung"
    ?>

    <h3>Les Mutateur "Setteur"</h3>
    <p>
        c'est une methode qui permettra la modification d'un attribut et uniquement cela. "en d'autres termes elle ne renvoie aucune information"
    </p>

    <?php
        Class Ordinateur{
            private $_marque;
            private $_cpuClock;
            
            public function __construct($marque,$cpuClock){
                $this->_marque = $marque;
                $this->_cpuClock = $cpuClock;
            }
            public function getMarque(){
                return $this->_marque;
            }
            public function getCpuClock(){
                return $this->_cpuClock;
            }
            public function setCpuClock($cpuClock){
                $this->_cpuClock = $cpuClock;
            }
        }
        $poste = new Ordinateur("Samsung","2.4");
        $poste->setCpuClock("3"); 
        echo $poste->getCpuClock()."GHz"; //Affichera "3GHz"	
    ?>

<h3>Les Constantes</h3>

<p>
    Les Constantes à la difference des attributs, consiste prévoir des valeurs definies pour eviter le code muet.
</p>

<?php
    Class Ordinateur{
        private $_marque;
        private $_cpuClock;
        private $_hdd;

        const HDD_SMALL = "250Go";
        const HDD_MEDIUM = "500Go";
        const HDD_BIG = "1To";

        public function __construct($marque,$cpuClock){
            $this->_marque = $marque;
            $this->_cpuClock = $cpuClock;
        }
        public function getHdd(){
            return $this->_hdd;
        }
        public function setHdd($capacite){
        //On vérifie qu'on nous donne bien les 3 valeurs prédéfinies plus haut
            if(in_array($capacite,[self::HDD_SMALL, self::HDD_MEDIUM, self::HDD_BIG])){
                $this->_hdd = $capacite;
            }
        }
    }
    //l'objet est instancié avec un processeur de 2.5GHz et on y installe un petit disque dur

    $poste = new Ordinateur("Samsung",2.4);
    $poste->setHdd(Ordinateur::HDD_SMALL);
    echo "Les disque dur est d'une capacité de ".$poste->getHdd();  //affiche 250Go
?>

<h3>Les attributs et méthodes statiques</h3>

<?php
    Class Ordinateur{
        private $_marque;
        private $_cpuClock;

        private static $_nbPostes = 0;

        public function __construct($date){
            $this->_marque = $date[0];
            $this->_cpuClock = $date[1];
            self::$_nbPostes++;
        }
        public function setMarque($marque){
            $this->_marque = $marque;
        }
        public function setCpuClock($speed){
            $this->_cpuClock = $speed;
        }
        public function combien(){
            echo self::$_nbPostes."<br>";
        }
            
    }

    Ordinateur::combien(); // affiche 0 car aucun poste créer
    $poste = new Ordinateur(array("Samsung",2.4));
    $poste2 = new Ordinateur(array("Samsung",1.6));
    Ordinateur::combien(); // affiche 2 car on a créer postes

?>

<h1>IV. OBJET ET BDD</h1>



<h1>V. Héritage</h1>

<p>
    Exemple de code de l'héritage de la class Ordinateur à la Class PC. <br>
    Reprenons comme base l’exemple du code présenté dans la partie « attributs et méthodes statiques »
</p>
<code>
<?php
    Class Ordinateur{
        …
        private static $_nbPostes = 0;
        …
    }
?>
</code>

<?php
    Class PC extends Ordinateur{
        private $_windows;
        public function __construct($data,$windows){
        //on fait hériter à cette class les attribus et méthode de la class Mère "Ordinateur par son __constructeur
            parent::__construct($data);
        //on reprend la construction de cette classe çi.
            $this->_windows = $windows;
        }
    }

    Ordinateur::combien(); //affiche 0

    $poste = new Ordinateur(array("marque"=>"Samsung", "cpuClock"=>2.4));
    $poste2 = new PC(array("marque"=>"Hitachi", "cpuClock"=>1.6),"Vista");

    Ordinateur::combien(); // affiche 2

?>