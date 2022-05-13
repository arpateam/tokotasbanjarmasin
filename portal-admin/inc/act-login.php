<?php

    require "../../system/koneksi.php";
    require "../../system/z_setting.php";

    if (isset($_POST['_submit_special_SEMANAK_'])) {
        session_start();
        // Input data 
        $username   = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_username_special_SEMANAK']);
        $password   = htmlspecialchars($_POST['___in_password_special_SEMANAK']);

        try{
            $queryLogin     = $pdo->query("SELECT * FROM data_admin WHERE username='$username' AND status='Aktif'");
            $resultLogin    = $queryLogin->fetch(PDO::FETCH_ASSOC);
            $rowsLogin      = $queryLogin->rowCount();

            if ($rowsLogin>0){
                $verify     = password_verify($password, $resultLogin['password']);

                if ($verify>0) {

                    // Isian data
                    $id_data_admin  = $resultLogin['id_data_admin'];
                    $kode_login     = hash('ripemd256', $username).hash('sha256', date("Y-m-d H:i:s"));

                    try{
                        $sql = "UPDATE data_admin SET kode_login = :kode_login, terakhir_login = now() WHERE id_data_admin = :id_data_admin";
                                      
                        $statement = $pdo->prepare($sql);

                        $statement->bindParam(":id_data_admin", $id_data_admin, PDO::PARAM_INT);
                        $statement->bindParam(":kode_login", $kode_login, PDO::PARAM_STR);

                        $count = $statement->execute();

                        if ($count>0) {
                            // Jika berhasil
                            $_SESSION['_alert__']           = '0';
                            $_SESSION['_msg__']             = 'FromLogin';
                            $_SESSION['_kode_login__']      = $kode_login;
                            $_SESSION['_id_data_admin__']   = $id_data_admin;
                            $_SESSION['_nama__']            = $resultLogin['nama'];
                            $_SESSION['_level__']           = $resultLogin['level'];

                            echo "<script>window.location = 'dashboard';</script>";
                            die();
                            exit();
                        }   
                    }catch(PDOException $e){
                        $_SESSION['_msg__'] = 'GagalLogin';
                        echo "<script>window.location = 'masuk';</script>";
                        exit();
                        die();
                    }
                }else{
                    $_SESSION['_msg__'] = 'GagalLogin';
                    echo "<script>window.location = 'masuk';</script>";
                    exit();
                    die();
                }
            }else{
                $_SESSION['_msg__'] = 'GagalLogin';
                echo "<script>window.location = 'masuk';</script>";
                exit();
                die();
            }
        }catch(Exception $e) {
            $_SESSION['_msg__'] = 'GagalLogin';
            echo "<script>window.location = 'masuk';</script>";
            exit();
            die();
        }
    }else{
        header("Location: masuk");
    }