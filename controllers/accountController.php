<?php 
class AccountController extends Database {

	function page_setup($base) {
		
		$query = $this->_db->prepare("SELECT * FROM pages");
		
		if ($query->execute()) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$new_page = array(
					"id" => $row['id'],
					"title" => $row['title'],
					"name" => $row['name'],
					"page" => $row['file'],
					"menu" => $row['menu'],
					"tool" => $row['tool'],
					"image" => $row['image'],
					"restricted" => $row['restricted'],
					"grade" => $row['grade']
					
				);
				if (isset($base->pagestructure[$row['url']])) {
					$base->pagestructure[uniqid("error_")] = $new_page;
				} else {
					$base->pagestructure[$row['url']] = $new_page;
				}
				
			}
		}
		
		
		
	}
	
	public function login($username, $password, $remember, $use_token = false) {
		
		if ($use_token) {
			$query = $this->_db->prepare("SELECT * FROM accounts WHERE ign = :username AND betaKey = :token");
			$arr = array(
			    'username' => $username,
			    'token' => $password
			);
			$this->arrayBinder($query, $arr);
		} else {
			$query = $this->_db->prepare("SELECT * FROM accounts WHERE ign = :username AND password = :password");
			$arr = array(
			    'username' => $username,
			    'password' => sha1($password)
			);
			$this->arrayBinder($query, $arr);
		}
		
		
		if ($query->execute()) {
			$row = $query->fetch(PDO::FETCH_ASSOC);
			
			$_SESSION['ign'] = $row['ign'];
			$_SESSION['rank'] = $row['rank'];
			$_SESSION['hasDonated'] = $row['hasDonated'];
			$_SESSION['mail'] = $row['mail'];
			$_SESSION['mailConfirmed'] = $row['mailConfirmed'];
			

			
			if ($remember) {
				$token = $this->updateToken($row['id']);
				//$_SESSION['token'] = $token;
				$expire=time()+60*60*24*30;
				setcookie("remember_user", true, $expire);
				setcookie("scrolldier_username", $row['ign'], $expire);
				setcookie("scrolldier_token", $token, $expire);
			}
			
			return true;
		} else {
			return false;
		}
		
	}
	
	private function updateToken($id) {
		$token = sha1(microtime(time()));
		$query = $this->_db->prepare("UPDATE accounts SET betaKey = :token WHERE id = :id");
		$arr = array(
		    'id' => $id,
		    'token' => $token
		);
		$this->arrayBinder($query, $arr);
		
		return $query->execute() ? $token : false;
		
	}
	
	public function logout() {
		unset($_SESSION['ign']);
		unset($_SESSION['rank']);
		unset($_SESSION['hasDonated']);
		unset($_SESSION['mail']);
		unset($_SESSION['mailConfirmed']);
		
		setcookie('scrolldier_username', null, -1, '/');
		setcookie('scrolldier_token', null, -1, '/');
		setcookie('remember_user', null, -1, '/');
		
		unset($_COOKIE['scrolldier_username']);
		unset($_COOKIE['scrolldier_token']);
		unset($_COOKIE['remember_user']);
		
		session_destroy();
	}
	public function getUserData($user) {
		 $query = $this->_db->prepare("SELECT * FROM accounts WHERE ign = :username");
		 $arr = array(
		     'username' => $user
		 );
		 $this->arrayBinder($query, $arr);
		
		if ($query->execute()) {
			return $query->fetch(PDO::FETCH_ASSOC);
		} else {
			return false;
		}
	}	
	
	public function rankToString($i, $scrolldier = false) {
		$scrolldier = ($scrolldier == true ? "Scrollldier " : "");
		switch ($i) {
			case 1:
				return $scrolldier."Admin";
			break;
			case 2:
				return $scrolldier."Mod";
			break;
			case 3:
				return $scrolldier."VIP";
			break;
			case 4:
				return "Scrolldier";
			break;
			case 5:
				return "Mojang";
			break;
		}
	}
}

class Account {
	
	public $username = "";
	
	public $rank = 0;
	
	public $donor = false;
	
	public $mail = "";
	
	public $main_confirmed = false;
	
	
}