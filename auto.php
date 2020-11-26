<?php
/**
 *
 * Minggu	Sunday	
 * Senin	Monday	
 * Selasa	Tuesday	
 * Rabu     Wednesday	
 * Kamis	Thursday	
 * Jumat	Friday	
 * Sabtu	Saturday
 *
 * Coded by : BENON_
 * Team     : ZoneXploiter
 */

# auto description
function desc( $input=NULL )
{
    /**
     * Configuration bagian description
     * 1. pada require isikan letak config database
     * 2. pada varibale query get isikan parameter id
     * 3. pada variable q isikan query mysqli atau sqlite untuk mengambil suatu data
     * 4. pada variable q2 kurang lebih sama jika tidak di perlukan silahkan hapus.
     * 5. pada variable user isi sebuah data bersumber pada variable q.
     * 6. variable $default isikan string default jika program menjalankan validasi else
     * 
     */
    require("aset/koneksi.php"); 
    $queryget = abs($_GET['id']);
    $uri = $_SERVER['REQUEST_URI']; # mendapatkan URL dimana user mengakses website
    $q = $db -> query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE user.user_id = '$queryget'");
    $row = $q -> fetchArray();
    $q2 = $db -> query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE team.team_id = '$queryget'");
    $row2 = $q2 -> fetchArray();
    $user = "hacked by ".$row['username'];
    $team = "hacked by ".$row2['teamname'];
    $default = "Deep Mirror";
    $url = parse_url( $uri ); # ambil nama domain dari isi variable URI
    $path = $url['path']; # mengambil dir dimana user meng akses website
    $description = "situs archive hacker terbaik, situs mirror hacker terbaik, Zona hacker, mirror defacement, notifier archive, peretasan";
    if( !empty( $queryget )){ # jika parameter id tidak kosong/ada maka jalankan program
        if( !empty( $user ) ){ # jika colom username ada pada database maka jalankan program
            return $user; # jika colom user ada maka cetak
        }elseif( !empty( $team )){ # jika colom team ada pada database maka jalankan program
            return $team; # jika colom team ada maka cetak
        }else {
            return $description; # jika program tidak menjalakan validasi if dan elseif maka jalankan ini
        }
    }
    if ( $uri ) # jika program menemukan URI atau dir setelah root home example domain.com/uri1/uri2/uri3
    {
        if ( strcmp($path, "/archive") == 0 || strcmp($path, "/archive.php") == 0 ){
            return $description; # jika ada dir archive cetak isi variable description
        }elseif ( strcmp($path, "/onhold") == 0 || strcmp($path, "/onhold.php") == 0 ){
            return $description;
        }elseif ( strcmp($path, "/special") == 0 || strcmp($path, "/special.php") == 0 ){
            return $description;
        }elseif ( strcmp($path, "/notify") == 0 || strcmp($path, "/notify.php") == 0 ){
            return $description;
        }elseif ( strcmp($path, "/ipgeolocation") == 0 || strcmp($path, "/ipgeolocation.php") == 0 ){
            return $description;
        }elseif ( strcmp($path, "/wts") == 0 || strcmp($path, "/wts.php") == 0 || strcmp($path, "/wts/") == 0 ){
            return $description;
        }elseif ( strcmp($path, "/lapor") == 0 || strcmp($path, "/lapor.php") == 0 ){
            return $description;
        }else {
            return $description; # jika if dan elseif tidak di jalankan maka cetak isi variable description
        }
    }
}

//Untuk ngisi title otomatis
function user()
{
    /**
     * Kurang lebih hampir sama dengan config di atas
     * silahkan configuration sendiri contohnya seperti diatas
     */
    require "aset/koneksi.php";
    $queryget = abs($_GET['id']);
    $uri = $_SERVER['REQUEST_URI'];
    $q = $db -> query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE user.user_id = '$queryget'");
    $row = $q -> fetchArray();
    $user = "Archive ".$row['username'];
    $team = "Archive ".$row['teamname'];
    $default = "Deep Mirror";
    $url = parse_url( $uri );
    $path = $url['path'];
    if( !empty($queryget) )
    {
        if( !empty( $user ) )
        {
            return $user;
        }
        else {
            return $default;
        }
    }
    if ( $uri )
    {
        if ( strcmp($path, "/archive") == 0 || strcmp($path, "/archive.php") == 0 )
        {
            return "Archive Mirror";
        }
        elseif ( strcmp($path, "/onhold") == 0 || strcmp($path, "/onhold.php") == 0 )
        {
            return "Onhold Mirror";
        }
        elseif ( strcmp($path, "/special") == 0 || strcmp($path, "/special.php") == 0 )
        {
            return "Special Mirror";
        }
        elseif ( strcmp($path, "/notify") == 0 || strcmp($path, "/notify.php") == 0 )
        {
            return "Halaman Notify Deep Mirror";
        }
        elseif ( strcmp($path, "/ipgeolocation") == 0 || strcmp($path, "/ipgeolocation.php") == 0 )
        {
            return "Ip geo location from site";
        }
        elseif ( strcmp($path, "/wts") == 0 || strcmp($path, "/wts.php") == 0 || strcmp($path, "/wts/") == 0 )
        {
            return "Halaman jual shell backdoor";
        }
        elseif ( strcmp($path, "/lapor") == 0 || strcmp($path, "/lapor.php") == 0 )
        {
            return "Halaman laporan";
        }
        else 
        {
            return $default;
        }
    }
}
function team()
{
    # config sama seperti sebelumnya
    require "aset/koneksi.php";
    $queryget = abs($_GET['id']);
    $uri = $_SERVER['REQUEST_URI'];
    $q = $db -> query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE team.team_id = '$queryget'");
    $row = $q -> fetchArray();
    $user = "Archive ".$row['username'];
    $team = "Archive team ".$row['teamname'];
    $default = "Deep Mirror";
    $url = parse_url( $uri );
    $path = $url['path'];
    if( !empty($queryget) )
    {
        if( !empty( $team ) )
        {
            return $team;
        }
        else {
            return $default;
        }
    }
    if ( $uri )
    {
        if ( strcmp($path, "/archive") == 0 || strcmp($path, "/archive.php") == 0 )
        {
            return "Archive Mirror";
        }
        elseif ( strcmp($path, "/onhold") == 0 || strcmp($path, "/onhold.php") == 0 )
        {
            return "Onhold Mirror";
        }
        elseif ( strcmp($path, "/special") == 0 || strcmp($path, "/special.php") == 0 )
        {
            return "Special Mirror";
        }
        elseif ( strcmp($path, "/notify") == 0 || strcmp($path, "/notify.php") == 0 )
        {
            return "Halaman Notify Deep Mirror";
        }
        elseif ( strcmp($path, "/ipgeolocation") == 0 || strcmp($path, "/ipgeolocation.php") == 0 )
        {
            return "Ip geo location from site";
        }
        elseif ( strcmp($path, "/wts") == 0 || strcmp($path, "/wts.php") == 0 )
        {
            return "Halaman jual shell backdoor";
        }
        elseif ( strcmp($path, "/lapor") == 0 || strcmp($path, "/lapor.php") == 0 )
        {
            return "Halaman laporan";
        }
        else 
        {
            return $default; #cetak variable defaul ketika program tidsk menjalankan program apapun
        }
    }
}

function judul()
{
    /**
     * pada preg_match silahkan kalian dengan dir mana saja.
     * yang mau di auto title dengan result
     * hasil dari configuration function user dan team
     * 
     */
    $uri = $_SERVER['REQUEST_URI']; # ambil query URL dimana user mengakses halaman web
    $url = parse_url( $uri ); # ambil domain dimana user mengakses
    $path = $url['path']; # ambil dir dimana user mengakses halaman
    $default = "Deep Mirror"; #default string isikan secara opsional berfungsi ketika program tidak menjalankan program apapun
    if( preg_match("/(attacker|lapor|wts|archive|ipgeolocation|notify|onhold|special)/", $path) == 1 )
    {
        /**
         * jalankan auto title user
         * ketika pada dir
         * attacker, lapor, wts, archive, ipgeolocation, notify, onhold dan special
         */
        return user();
    }
    elseif( preg_match("/(team|lapor|wts|archive|ipgeolocation|notify|onhold|special)/", $path) == 1 )
    {
        return team();
    }
    else
    {
        return $default;
    }
}
?>
