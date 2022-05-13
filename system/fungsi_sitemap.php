<?php

	function tambahSitemap_1($database_1, $id_sub_sitemap, $loc_1, $priority_1, $link){

		require 'koneksi.php';
		global $count;
		global $insertId;

		try{
			$stmt = $pdo->prepare("INSERT INTO $database_1
							(id_sub_sitemap,loc_1,lastmod_1,priority_1)
							VALUES(:id_sub_sitemap,:loc_1,now(),:priority_1)" );
					
			$stmt->bindParam(":id_sub_sitemap", $id_sub_sitemap, PDO::PARAM_STR);
			$stmt->bindParam(":loc_1", $loc_1, PDO::PARAM_STR);
			$stmt->bindParam(":priority_1", $priority_1, PDO::PARAM_STR);
				
			$count = $stmt->execute();
					
			$insertId = $pdo->lastInsertId();
					
		}catch(PDOException $e){
			$_SESSION['_msg__'] = 'Gagal';
			echo "<script>window.location(history.back(0))</script>";
			die();
    		exit();
		}

	}

	function editSitemap_1($database_1, $id_sitemap_1, $id_sub_sitemap, $loc_1, $priority_1, $link){

		require 'koneksi.php';
		global $count;
		global $id_sitemap_1;

		try {
			$sql = "UPDATE $database_1
					SET id_sub_sitemap 		= :id_sub_sitemap,
						loc_1   			= :loc_1,
						lastmod_1 	 		= now(),
						priority_1 			= :priority_1
					WHERE id_$database_1 	= :id_sitemap_1
				";
						  
			$statement = $pdo->prepare($sql);

			$statement->bindParam(":id_sitemap_1", $id_sitemap_1, PDO::PARAM_INT);
			$statement->bindParam(":id_sub_sitemap", $id_sub_sitemap, PDO::PARAM_STR);
			$statement->bindParam(":loc_1", $loc_1, PDO::PARAM_STR);
			$statement->bindParam(":priority_1", $priority_1, PDO::PARAM_STR);

			$count = $statement->execute();
					
		}catch(PDOException $e){
			$_SESSION['_msg__'] = 'Gagal';
			echo "<script>window.location(history.back(0))</script>";
			die();
    		exit();
		}

	}

	function hapusSitemap_1($database, $id_sitemap_1, $link){

		require 'koneksi.php';
		global $count;

		try{
			$del 	= $pdo->query("DELETE FROM $database WHERE id_$database='$id_sitemap_1'");
			$count 	= $del->execute();
		}catch (PDOException $e) {
			var_dump($e);
			die();
    		exit();
			$_SESSION['_msg__'] = 'Gagal';
			echo "<script>window.location(history.back(0))</script>";
			die();
    		exit();
		}

	}