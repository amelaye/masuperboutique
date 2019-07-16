<?php
/**
 *	@desc
 *	@author 	Amélie DUVERNET
 */
require_once 'C_setGet.php';

class User extends SetGet {

    protected $I_idUser;
    protected $A_annonceur;
    protected $S_login;
    protected $S_password;
    protected $I_droit;
    protected $S_nom;
    protected $S_prenom;
    protected $S_email;
    protected $S_gsm;
    protected $A_fonction;
    protected $S_diffuseur;


    /**
     *	@desc		Constructeur
     *	@author 	Amélie DUVERNET
     *	@param
     *	@return		void
     */
    public function __construct() {
        $this->_init();
    }


    /**
     *	@desc		Initialisation
     *	@author 	Amélie DUVERNET
     *	@param
     *	@return		void
     */
    private function _init() {
        $this->I_idUser		= null;
        $this->A_annonceur 	= array();
        $this->S_login 		= null;
        $this->S_password 	= null;
        $this->I_droit 		= null;
        $this->S_nom 		= null;
        $this->S_prenom 	= null;
        $this->S_email		= null;
        $this->S_gsm		= null;
        $this->S_diffuseur	= '';
    }

    /**
     *	@desc		charge l'objet user via une tableau
     *	@author 	Amélie DUVERNET
     *	@param
     *	@return		void
     */
    public function load($A_param){

        if(is_null($A_param['I_idAnnonceur']) ){
            $resultat = mysql_query("SELECT Id_Annonceur FROM annonceur WHERE flgacf=1");
            $I_cpt = 0;
            $A_tmp = array();
            while($row = mysql_fetch_array($resultat, MYSQL_NUM)){
                $A_tmp[$I_cpt]= $row[0];
                $I_cpt++;
            }
            $A_param['A_annonceur'] = $A_tmp;
        }else{
            $A_param['A_annonceur'] = array($A_param['I_idAnnonceur']);
        }
        unset($A_param['I_idAnnnonceur']);

        $this->setArrayAttribut($A_param);
    }

    /**
     *	@desc		charge l'objet user grace a l'id
     *	@author 	Amélie DUVERNET
     *	@param
     *	@return		void
     */
    public function loadById($I_idUser){
        if(!is_null($I_idUser) ){
            $S_sql = 'SELECT Login as S_login ,
							 Id_User as I_idUser,
							 Password as S_password,
							 ID_profil as I_droit,
							 Nom as S_nom,
							 Prenom as S_prenom,
							 EMail as S_email,
							 gsm as S_gsm,
							 Diffuseur as S_diffuseur
					    FROM USERS 
					   WHERE flgacf=1
					     AND Id_User = '.$I_idUser;
            $resultat = mysql_query($S_sql);
            if ($resultat) {
                $row = mysql_fetch_array($resultat, MYSQL_ASSOC);
                $row['A_annonceur'] = $this->loadAnnonceurs($I_idUser);
                $row['A_fonction'] = $this->loadFonctions($I_idUser);
                $this->setArrayAttribut($row);
            }
        }
    }

    /**
     *	@desc		charge l'objet user grace au login
     *	@author 	Amélie DUVERNET
     *	@param
     *	@return		void
     */
    public function loadByLogin($S_login){
        if(!is_null($S_login) ){
            $S_sql = 'SELECT Login as S_login ,
							 Id_User as I_idUser,
							 Password as S_password,
							 ID_profil as I_droit,
							 Nom as S_nom,
							 Prenom as S_prenom,
							 EMail as S_email,
							 gsm as S_gsm,
							 Diffuseur as S_diffuseur
					    FROM USERS 
					   WHERE flgacf=1
					     AND Login = "'.$S_login.'"';

            $resultat = mysql_query($S_sql);
            $row = mysql_fetch_array($resultat, MYSQL_ASSOC);
            $row['A_annonceur'] = $this->loadAnnonceurs($row['I_idUser']);
            $row['A_fonction'] = $this->loadFonctions($row['I_idUser']);
            $this->setArrayAttribut($row);
        }
    }

    /**
     *	@desc		charge l'objet user grace a son email
     *	@author 	Amélie DUVERNET
     *	@param
     *	@return		void
     */
    public function loadByEmail($S_email){
        if(strcmp($S_email, '') >0 && $this->checkEmail($S_email)==1){
            $S_sql = 'SELECT Login as S_login ,
							 Id_User as I_idUser,
							 Password as S_password,
							 ID_profil as I_droit,
							 Nom as S_nom,
							 Prenom as S_prenom,
							 EMail as S_email,
							 gsm as S_gsm,
							 Diffuseur as S_diffuseur
					    FROM USERS 
					   WHERE flgacf=1
					     AND EMail = "'.$S_email.'"';

            $resultat = mysql_query($S_sql);
            if($resultat === false){
                return -1;
            }else{
                if(mysql_num_rows($resultat)>0){
                    $row = mysql_fetch_array($resultat, MYSQL_ASSOC);
                    $row['A_annonceur'] = $this->loadAnnonceurs($row['I_idUser']);
                    $row['A_fonction'] = $this->loadFonctions($row['I_idUser']);
                    $this->setArrayAttribut($row);
                    return 1;
                }else{
                    return 0;
                }
            }
        }
        return -1;
    }

    /**
     *	@desc		methode qui sauvegarde en base de donn�e un utilisateur
     *	@author 	Amélie DUVERNET
     *	@param		array
     *	@return		int id
     */
    public function save(){
        $S_sql = 'INSERT INTO users
						(Id_User,
						Login,
						Password,
						Id_Profil,
						Nom,
						Prenom,
						EMail,
						gsm,
						flgacf,
						Diffuseur) 
					VALUES (
						NULL,
						"'.addslashes($this->S_login).'",
						"'.$this->S_password.'",
						"'.$this->I_droit.'",
						"'.addslashes($this->S_nom).'",
						"'.addslashes($this->S_prenom).'",
						"'.$this->S_email.'",
						"'.$this->S_gsm.'",
						1,
						"'.addslashes($this->S_diffuseur).'")';
        mysql_query($S_sql);
        $new_id = mysql_insert_id();

        if (isset ($this->A_annonceur) && (count ($this->A_annonceur) > 0)) {
            foreach ($this->A_annonceur as $ann) {

                $S_sql = 'INSERT INTO asso_user_annonceur (Id_User, Id_Annonceur)
					          VALUES ('.$new_id.', '.$ann.')';

                mysql_query($S_sql);

            }
        }

        return $new_id;
    }

    /**
     *	@desc		methode qui modifie en base de donn�e un utilisateur
     *	@author 	Amélie DUVERNET
     *	@param		array
     *	@return		void
     */
    public function update(){
        $S_sql = 'UPDATE users
					SET
						Login 			= "'.addslashes($this->S_login).'",
						Password		= "'.$this->S_password.'",
						ID_profil		= "'.$this->I_droit.'",
						Nom				= "'.addslashes($this->S_nom).'",
						Prenom			= "'.addslashes($this->S_prenom).'",
						EMail			= "'.$this->S_email.'",
						gsm				= "'.$this->S_gsm.'",
						Diffuseur		= "'.$this->S_diffuseur.'"
					WHERE
						Id_User			= '.$this->I_idUser;

        mysql_query($S_sql);

        if (isset ($this->A_annonceur) && (count ($this->A_annonceur) > 0)) {

            $S_sql = 'DELETE
			            FROM asso_user_annonceur
			           WHERE Id_User = '.$this->I_idUser;

            mysql_query($S_sql);

            foreach ($this->A_annonceur as $ann) {

                $S_sql = 'INSERT INTO asso_user_annonceur (Id_User, Id_Annonceur)
				          VALUES ('.$this->I_idUser.', '.$ann.')';

                mysql_query($S_sql);

            }
        }
    }

    /**
     *	@desc		methode qui supprime en base de donn�e un utilisateur
     *	@author 	Amélie DUVERNET
     *	@param		array
     *	@return		void
     */
    public function delete(){
        $S_sql = 'UPDATE users
					 SET flgacf = 0
				   WHERE Id_User = '.$this->I_idUser;
        mysql_query($S_sql);
    }

    /**
     *	@desc		Fonction qui charge tous les utilisateurs
     *	@author 	Amélie DUVERNET
     *	@param		string ordre pour le order by
     *	@return		array
     */
    public function loadAll($S_ordre='',$S_where = null){
        $A_return = array();
        if($S_ordre == ''){
            $S_ordre = 'Nom ASC';
        }
        if(!is_null($S_where)) {
            $S_where = ' AND '.$S_where.' ';
        }
        $S_sql = 'SELECT
					users.Id_User as I_idUser,
					users.Login as S_login,
					users.Password as S_password,
					users.ID_profil as I_droit,
					profil.lib_profil as S_lib_profil,
					users.Nom as S_nom,
					users.Prenom as S_prenom,
					users.EMail as S_email,
					users.gsm as S_gsm,
					users.Diffuseur as S_diffuseur
				FROM 
					users,
					profil 
				WHERE
					users.flgacf=1
				 AND
					users.id_profil = profil.id_profil
				'.$S_where.'
				ORDER BY '.$S_ordre;

        $resultat	= mysql_query($S_sql);
        $I_cpt = 0;
        while($row = mysql_fetch_array($resultat, MYSQL_ASSOC)){

            $row['A_annonceur'] = $this->loadAnnonceurs($row['I_idUser']);
            $row['A_fonction']  = $this->loadFonctions($row['I_idUser']);

            $A_return[$I_cpt]['I_idUser']		= $row['I_idUser'];
            $A_return[$I_cpt]['S_login']		= $row['S_login'];
            $A_return[$I_cpt]['S_password']		= $row['S_password'];
            $A_return[$I_cpt]['I_droit']		= $row['I_droit'];
            $A_return[$I_cpt]['S_lib_profil']	= $row['S_lib_profil'];
            $A_return[$I_cpt]['S_nom']			= $row['S_nom'];
            $A_return[$I_cpt]['S_prenom']		= $row['S_prenom'];
            $A_return[$I_cpt]['S_email']		= $row['S_email'];
            $A_return[$I_cpt]['S_gsm']			= $row['S_gsm'];
            $A_return[$I_cpt]['S_Diffuseur']	= $row['S_diffuseur'];
            $I_cpt++;
        }
        return $A_return;
    }



    /**
     *	@desc		Fonction qui vérifie la validité d'un utilisateur
     *	@author 	Amélie DUVERNET
     *	@param		string ordre pour le order by
     *	@return		array
     */
    public function checkLogin($S_login, $ID_user=null){
        $S_sql = 'SELECT *
				    FROM users 
				   WHERE flgacf=1 AND Login = "'.$S_login.'"';

        if (isset ($ID_user)) {
            $S_sql .= ' AND ID_user <> '.$ID_user;
        }

        $resultat	= mysql_query($S_sql);

        if (($resultat) && (mysql_num_rows($resultat) > 0)) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>
