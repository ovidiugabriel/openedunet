<?php
/* **************************************************************************
 *                            class.CdCollection.php
 *                    ------------------------------------
 *            begin     : May 27, 2007
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id$
 *
 ***************************************************************************/
 
/* **************************************************************************
 *
 *    This program is Free Software; you can redistribute it and/or
 *    modify it under the terms of the GNU General Public License
 *    as published by the Free Software Foundation; either version 2
 *    of the License, or (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *    GNU General Public License for more details.
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 59 Temple Place - Suite 330,
 *    Boston, MA  02111-1307, USA.
 *
 ***************************************************************************/
 
class CdCollection{

	public function defaultAction(){
		$this->cdList();
	}	
	
	public function cdList(){
		global $_smarty;
		
		$db	= Database::getInstance();
		
		
		$res	= $db->query("select * from cds");
					
		while ($row = $db->nextRow($res)){
					
			$_smarty->append("cd", $row);
		}
						
		
	}
	
	public function cdDelete(){
		$db	= Database::getInstance();
		
		
		try{
			$db->query("begin");
			// i know, transactions are useless here, but most times you need more than one delete/update/insert query and this is how things should be done
			
			$db->query("delete from cds where cd_id = $_GET[cd_id]");
			
			$db->query("commit");
		}catch(Exception $e){		
			$db->query("rollback");
			redirect(array("module" => "CdCollection", "action" => "cdList", "error" => _ERROR_DELETE));
		}
				
		redirect(array("module" => "CdCollection", "action" => "cdList", "status" => _STATUS_DELETE));		
		
	}
	
	public function cdEdit(){
		global $_smarty;
		$db	= Database::getInstance();
		
		$res	= $db->query("select * from cds where cd_id = $_GET[cd_id]");
					
		$row = $db->nextRow($res);
		$_smarty->assign("cd", $row);		
		
	}
	
	public function cdUpdate(){
		$db	= Database::getInstance();

		try{
			$db->query("begin");
			// i know, transactions are useless here, but most times you need more than one delete/update/insert query and this is how things should be done
		
			$db->update("cds", $_POST["cd"],  "where cd_id = $_POST[cd_id]");
			//check /includes/classes/class.Database.php for more info about the update method
	
			$db->query("commit");
		}catch(Exception $e){		
			$db->query("rollback");
			//echo $e->getMessage(); die();
			redirect(array("module" => "CdCollection", "action" => "cdList", "error" => _ERROR_UPDATE));
		}
		
		redirect(array("module" => "CdCollection", "action" => "cdList", "status" => _STATUS_UPDATE));		
	}
	
	public function cdNew(){
		
	}
	
	public function cdInsert(){
		$db	= Database::getInstance();

		try{
			$db->query("begin");
			// i know, transactions are useless here, but most times you need more than one delete/update/insert query and this is how things should be done
		
			$cd = $_POST["cd"];
			
			$cd["cd_title_seo"] = SeoBase::getSeoName($cd["cd_title"]);
			
			$db->insert("cds", $cd);
			//check /includes/classes/class.Database.php for more info about the insert method
		
			$db->query("commit");
		}catch(Exception $e){		
			$db->query("rollback");
			//echo $e->getMessage(); die();
			redirect(array("module" => "CdCollection", "action" => "cdList", "error" => _ERROR_INSERT));
		}
		
		redirect(array("module" => "CdCollection", "action" => "cdList", "status" => _STATUS_INSERT));
		
	}
} 

?>