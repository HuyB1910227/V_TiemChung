<?php


              
         

                use TC\OBS\KhachHang;
                
                    require_once '../../db_connect.php';
                    $khachhang = new KhachHang($PDO);
                    $arrkhachhang = $khachhang->all();
                    $data[] = array(
                        'TenLoaiSanPham' => "hihi",
                        'SoLuong' => "5"
                    );
                    $data[] = array(
                        'TenLoaiSanPham' => "haha",
                        'SoLuong' => "7"
                    );
                    $data[] = array(
                        'TenLoaiSanPham' => "mm",
                        'SoLuong' => "109"
                    );
              echo json_encode($data);




?>