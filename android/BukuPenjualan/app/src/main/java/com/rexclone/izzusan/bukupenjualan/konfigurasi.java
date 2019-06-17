package com.rexclone.izzusan.bukupenjualan;

public class konfigurasi {
    //Lokasi CRUD php disimpan
    public static final String URL_ADD="http://192.168.1.4/andro/pegawai/tambahPgw.php";
    public static final String URL_GET_ALL="http://192.168.1.4/andro/pegawai/tampilSemuaPgw.php";
    public static final String URL_GET_EMP="http://192.168.1.4/andro/pegawai/tampilPgw.php";
    public static final String URL_UPDATE_EMP="http://192.168.1.4/andro/pegawai/ubahPgw.php";
    public static final String URL_DELETE_EMP="http://192.168.1.4/andro/pegawai/hapusPgw.php";

    //KEY untuk mengirim request ke PHP
    public static final String KEY_EMP_ID = "id";
    public static final String KEY_EMP_NAMA = "name";
    public static final String KEY_EMP_POSISI = "desg";
    public static final String KEY_EMP_GAJIH = "salary";

    //Tag JSON
    public static final String TAG_JSON_ARRAY = "result";
    public static final String TAG_JSON_ID = "id";
    public static final String TAG_JSON_NAMA = "name";
    public static final String TAG_JSON_POSISI = "desg";
    public static final String TAG_JSON_GAJIH = "salary";

    //ID Karyawan, EMP atau Employee = Karyawan
    public static final String EMP_ID  = "emp_id";
}
