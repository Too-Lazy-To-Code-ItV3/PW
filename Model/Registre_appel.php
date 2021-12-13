<?php
    class Registre_appel
    {
        private $IdRegistre;
		private $Etudiant;
		private $Module;
		private $Date;
		private $Heure;
        private $Etat;

        function __construct($idRegistre,$etudiant,$module,$date,$heure,$etat){
			$this->IdRegistre=$idRegistre;
			$this->Etudiant=$etudiant;
			$this->Module=$module;
			$this->Date=$date;
			$this->Heure=$heure;
			$this->Etat=$etat;
		}

        function setIdRegistre(string $IdRegistre){
			$this->IdRegistre=$IdRegistre;
		}
		function setEtudiant(string $Etudiant){
			$this->Etudiant=$Etudiant;
		}
		function setDate(string $Date){
			$this->Date=$Date;
		}
		function setHeure(string $Heure){
			$this->Heure=$Heure;
		}
        function setEtat(string $Etat){
			$this->Etat=$Etat;
		}
		 function setModule(string $Module){
			$this->Module=$Module;
		}
        
		function getModule(){
			return $this->Module;
		}
        function getIdRegistre(){
			return $this->IdRegistre;
		}
		function getEtudiant(){
			return $this->Etudiant;
		}
		function getDate(){
			return $this->Date;
		}
		function getHeure(){
			return $this->Heure;
		}
        function getEtat(){
			return $this->Etat;
		}
        
    }
    

?>