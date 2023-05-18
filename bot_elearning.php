<?php
// JIKA INGIN MENGGUNAKAN NOTIFIKASI JIKA BERHASIL ABSEN KE TELEGRAM SILAHKAN 
// KALIAN UDPDATE PADA FUNCTION telegram() ID-BOT-FATHER-KALIAN DAN ID-AKUN-TELEGRAM-KALIAN,
// DAN EDIT JUGA PADA BAGIAN PESAN DIBAWAH *(SUDAH SAYA TANDAI)!!


//UBAH USERNAME & PASSWORD E-LEARNING MILIKMU!!
$username = "19201069";
$password = "hans108@";


//SEMUA BERAWAL DARI SINI JANGAN DIEDIT!!
function getCsrf()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://elearning.bsi.ac.id/login');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Host: elearning.bsi.ac.id';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    return $result;
}

function login($username, $password, $token)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://elearning.bsi.ac.id/login');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, '_token=' . $token['csrf'] . '&username=' . $username . '&password=' . $password . '&verifikasi=1');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $headers = array(
        'Host: elearning.bsi.ac.id',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'Accept-Encoding: gzip, deflate',
        'Content-Type: application/x-www-form-urlencoded',
        'Origin: http://elearning.bsi.ac.id',
        'Connection: close',
        'Referer: http://elearning.bsi.ac.id/login',
        'Cookie: eyJpdiI6IjcrWnZsVkhnOUxvN0t2SlpNcDFnSXc9PSIsInZhbHVlIjoidjUzNXBFRUxKY2RWOFBiMHRxbG9RMU1qZ2xMRjRCeUd6RGxYbUZwaDVPNW5ZckZDcGo5Z21SdmxIaTg2RVFMdjZCWE5QVTFMWkd4bnhWZ2llcXNNS1d6WURIQlMwdXRibXF5eTJkT2VkdmpLNlM5V1Q2SGR1MjVDVlhwR1BYZVoiLCJtYWMiOiIyMDA0ZjEwYmJkZmIxOTlmNzM5OGVlOWU0ZjQzMGJmYWVjMmFhOWMyNDRlNThmNDQwY2VkNjA4Yjk5MzlmYzhkIn0%3D' . $token['mybest'],
        'Upgrade-Insecure-Requests: 1'
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $get = curl_exec($ch);
    return $get;
}

function NamaMHS($session)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://elearning.bsi.ac.id/user/dashboard');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Host: elearning.bsi.ac.id';
    $headers[] = 'Cookie: ' . $session;

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    return $result;
}

function listKelas($session)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://elearning.bsi.ac.id/sch');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Host: elearning.bsi.ac.id';
    $headers[] = 'Cookie: ' . $session;

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    return $result;
}

function viewKelas($session, $link)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Host: elearning.bsi.ac.id';
    $headers[] = 'Cookie: ' . $session;

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    return $result;
}

function isiKehadiran($session, $tokenabsen, $pertemuanabsen, $idabsen)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://elearning.bsi.ac.id/mhs-absen');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, '_token=' . $tokenabsen . '&pertemuan=' . $pertemuanabsen . '&id=' . $idabsen);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $headers = array(
        'Host: elearning.bsi.ac.id',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language: id,en-US;q=0.7,en;q=0.3',
        'Accept-Encoding: gzip, deflate',
        'Content-Type: application/x-www-form-urlencoded',
        'Origin: http://elearning.bsi.ac.id',
        'Connection: close',
        'Referer: http://elearning.bsi.ac.id/',
        'Cookie: eyJpdiI6IjcrWnZsVkhnOUxvN0t2SlpNcDFnSXc9PSIsInZhbHVlIjoidjUzNXBFRUxKY2RWOFBiMHRxbG9RMU1qZ2xMRjRCeUd6RGxYbUZwaDVPNW5ZckZDcGo5Z21SdmxIaTg2RVFMdjZCWE5QVTFMWkd4bnhWZ2llcXNNS1d6WURIQlMwdXRibXF5eTJkT2VkdmpLNlM5V1Q2SGR1MjVDVlhwR1BYZVoiLCJtYWMiOiIyMDA0ZjEwYmJkZmIxOTlmNzM5OGVlOWU0ZjQzMGJmYWVjMmFhOWMyNDRlNThmNDQwY2VkNjA4Yjk5MzlmYzhkIn0%3D' . $session,
        'Upgrade-Insecure-Requests: 1'
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $get = curl_exec($ch);
    return $get;
}

// function telegram($pesan)
// {
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/ID-BOT-FATHER-KALIAN/sendMessage?chat_id=ID-AKUN-TELEGRAM-KALIAN&text=' . $pesan);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//     curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

//     $headers = array();
//     $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0';
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     $result = curl_exec($ch);
//     if (curl_errno($ch)) {
//         echo 'Error:' . curl_error($ch);
//     }
//     curl_close($ch);
//     return $result;
// }

function clear($session, $csrf)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://elearning.bsi.ac.id/livewire/message/profile.logout-other-browser-sessions-form');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"fingerprint":{"id":"Jb61jjEdd7yMU9FrsTk5","name":"profile.logout-other-browser-sessions-form","locale":"id"},"serverMemo":{"children":[],"errors":[],"htmlHash":"a796e208","data":{"confirmingLogout":true,"password":""},"dataMeta":[],"checksum":"a09531aef2fe29d6e626420400a8dcc30e0d04625c8c9a4eeb93119867132f73"},"updates":[{"type":"syncInput","payload":{"name":"password","value":"' . $password . '"}},{"type":"callMethod","payload":{"method":"logoutOtherBrowserSessions","params":[]}}]}');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $headers = array(
        'Accept: text/html, application/xhtml+xml',
        'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
        'Connection: keep-alive',
        'Content-Type: application/json',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0',
        'Origin: http://elearning.bsi.ac.id',
        'Referer: http://elearning.bsi.ac.id/user/profile',
        'Cookie: eyJpdiI6IjcrWnZsVkhnOUxvN0t2SlpNcDFnSXc9PSIsInZhbHVlIjoidjUzNXBFRUxKY2RWOFBiMHRxbG9RMU1qZ2xMRjRCeUd6RGxYbUZwaDVPNW5ZckZDcGo5Z21SdmxIaTg2RVFMdjZCWE5QVTFMWkd4bnhWZ2llcXNNS1d6WURIQlMwdXRibXF5eTJkT2VkdmpLNlM5V1Q2SGR1MjVDVlhwR1BYZVoiLCJtYWMiOiIyMDA0ZjEwYmJkZmIxOTlmNzM5OGVlOWU0ZjQzMGJmYWVjMmFhOWMyNDRlNThmNDQwY2VkNjA4Yjk5MzlmYzhkIn0%3D' . $session,
        'X-CSRF-TOKEN: eyJpdiI6ImY4bVNrNVJzVjc2bnhNb2g1MlJMalE9PSIsInZhbHVlIjoiaEpWRWk3YTJjYmRSVisvVmhWU25kYW5iMll4aHFpcUMwYk40UEVVS3BpcGdLTktQekFuQkVFUFllZTJhU05VQ2FrVGFpaDVvNkFhWk90UEt3cFN5ZFJIVXd2ZWZweDE3SkF2Rkt4d3VWSkFVM0hsM2R5K0xsVHRVV2lpZ2lSb0wiLCJtYWMiOiI3YmMxZjUyY2YyOGVkODAzNmExNzNjODFjY2NhYTJjOTMxODc4OTFkMzNiNTk4NDM5YWExNmJkYmJkY2YwYzkzIn0%3D' . $csrf,
        'X-Livewire: true',
        'X-Socket-ID: undefined',
        'Accept-Encoding: gzip'
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $get = curl_exec($ch);
    return $get;
}
while (true) {

    // Get Cookie & csrf
    $csrf = getCsrf();

    preg_match_all('/<meta name="csrf-token" content="(.*)">/U', $csrf, $tokenCsrf);
    preg_match_all('/set-cookie: (.*);/U', $csrf, $cookie);
    $csrf = $tokenCsrf[1][0];
    $xsrf = $cookie[1][0];
    $mybest = $cookie[1][1];

    $token = array(
        'csrf' => $csrf,
        'xsrf' => $xsrf,
        'mybest' => $mybest,
    );

    $login = login($username, $password, $token);

    if (strpos($login, "profile")) {
        preg_match_all('/set-cookie: (.*);/U', $login, $cookie_login);
        preg_match_all('/set-cookie: (.*);/U', $login, $nama);
        $session = $cookie_login[1][1];

        $Nama = NamaMHS($session);
        preg_match_all('/value="(.*)"/U', $Nama, $data);

        $mhs_nim = $data[1][0]; //NIM
        $mhs_nama = $data[1][1]; //NAMA
        $mhs_kelas = $data[1][3]; //KELAS

        echo "\nBERHASIL MASUK... \n\nNAMA  : $mhs_nama\nNIM   : $mhs_nim\nKELAS : $mhs_kelas\n\nSEDANG MENGAMBIL DATA MATAKULIAH...\n----------------------------------------------------\n";
        sleep(3);
        $listKelas = listKelas($session);
        preg_match_all('/href="(.*)" class="btn btn-primary btn-lg">Masuk Kelas/U', $listKelas, $linkKelas);

        echo "MATAKULIAH YANG TERSEDIA : " . count($linkKelas[1]) . "\n\n";

        $x = 1;
        while ($x <= 1) {
            foreach ($linkKelas[1] as $linkkelas) {
                $viewKelas = viewKelas($session, $linkkelas);
                preg_match_all('/<h5>(.*)</U', $viewKelas, $infoKelas);
                $namaMk = $infoKelas[1][0];
                $kelasMk = $infoKelas[1][1];
                $kodeMk = $infoKelas[1][5];
                $harii = $infoKelas[1][3];
                $jam = '' . $infoKelas[1][2] . ' - ' . $infoKelas[1][4];
                $hari = strtoupper($harii);

                echo "" . $x . ". MATAKULIAH : " . $namaMk . " - " . $hari . " / " . $jam . " |STATUS";
                $x++;

                if (strpos($viewKelas, "Belum Mulai")) {
                    echo " => MATAKULIAH BELUM MULAI.\n";
                } else if (strpos($viewKelas, "Absen Masuk")) {
                    preg_match_all('/" value="(.*)">/U', $viewKelas, $configKehadiran);
                    $tokenabsen = $configKehadiran[1][0]; //token
                    $pertemuanabsen = $configKehadiran[1][1]; //pertemuan
                    $idabsen = $configKehadiran[1][2]; //id kehadiran

                    $isiKehadiran = isiKehadiran($session, $tokenabsen, $pertemuanabsen, $idabsen);
                    if (strpos($isiKehadiran, "http://elearning.bsi.ac.id/absen-mhs/ey")) {
                        echo " => BERHASIL ISI KEHADIRAN.";
                        // resend3: // HIDUPKAN INI JIKA INGIN MENGGUNAKAN NOTIFIKASI BERHASIL MELAKUKAN ABSEN PADA ELEARNING.
                        // $send = telegram("BERHASIL MENGISI KEHADIRAN%0A%0A------------------| INFO DATA |-------------------%0ANAMA  : $mhs_nama %0ANIM      : $mhs_nim %0AKELAS : $mhs_kelas %0A-----------------| INFO MATKUL |------------------%0AMATAKULIAH : $namaMk %0AHARI/JAM       : $hari / $jam%0A--------------------| SELESAI |---------------------");
                        // if (!strpos($send, 'true')) {
                        //     echo " => GAGAL MENGIRIM PESAN, MENGIRIM ULANG...";
                        //     goto resend3;
                        // } else {
                        //     echo " => SUKSESS KIRIM PESAN.\n";
                        // } //SAMPAI SINI
                    } else {
                        print($isiKehadiran);
                    }
                } else if (strpos($viewKelas, "Berikan Komentar Anda Terhadap")) {
                    echo " => SUDAH ISI KEHADIRAN.\n";
                } else if (strpos($viewKelas, "Sudah Selesai")) {
                    echo " => MATAKULIAH BELUM DIMULAI / SUDAH SELESAI.\n";
                } else {
                    print($viewKelas);
                    die();
                }
            }
            echo "\n\n----------------------------------------------------\n";
            echo "++++++++ MENGHAPUS SESSION LOGIN SAAT INI!! ++++++++";
            echo "\n----------------------------------------------------";
            $clearSession = clear($session, $csrf);
            goto loop;
        }
    } elseif (strpos($login, "login")) {
        echo "\nGAGAL LOGIN E-LEARNING NIM : $username!!\nUSERNAME / PASSWORD SALAH!\n\n";
        die();
    } else {
        print($login);
        die();
    }
    loop:
    echo "\nMEMBUAT PROSESS LOGIN ULANG DALAM 30MENIT..\n----------------------------------------------------\n\n";
    sleep(1800);
}