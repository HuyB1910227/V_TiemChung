<?php


              
         

                use TC\OBS\KhachHang;
                
                    require_once '../../db_connect.php';
                    // $khachhang = new KhachHang($PDO);
                    // $arrkhachhang = $khachhang->all();
                    $data[] = array(
                        'Thang' => "1",
                        'SoLuong' => "100"
                    );
                    $data[] = array(
                        'Thang' => "2",
                        'SoLuong' => "80"
                    );
                    $data[] = array(
                        'Thang' => "3",
                        'SoLuong' => "60"
                    );
                    $data[] = array(
                        'Thang' => "4",
                        'SoLuong' => "90"
                    );
                    $data[] = array(
                        'Thang' => "5",
                        'SoLuong' => "96"
                    );
                    $data[] = array(
                        'Thang' => "6",
                        'SoLuong' => "8"
                    );
                    $data[] = array(
                        'Thang' => "7",
                        'SoLuong' => "13"
                    );
                    $data[] = array(
                        'Thang' => "8",
                        'SoLuong' => "100"
                    );
                    $data[] = array(
                        'Thang' => "9",
                        'SoLuong' => "63"
                    );
                    $data[] = array(
                        'Thang' => "10",
                        'SoLuong' => "54"
                    );
                    $data[] = array(
                        'Thang' => "11",
                        'SoLuong' => "9"
                    );
                    $data[] = array(
                        'Thang' => "12",
                        'SoLuong' => "0"
                    );
                    
              echo json_encode($data);




?>