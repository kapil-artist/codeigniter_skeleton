<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */


function getArrayHeaders($array)
{
    $allusersArr = json_decode(json_encode($array), true);
    $allusersArr = current($allusersArr);
    $allHeader = array_keys($allusersArr);
    return $allHeader;
}
function make_url($value)
{
    $url = str_replace(" ", "-", strtolower(trim($value)));
    $url = preg_replace('/[^A-Za-z0-9\-]/', '', $url);
    $url = str_replace("----", "-", strtolower(trim($url)));
    $url = str_replace("-----", "-", strtolower(trim($url)));
    $url = str_replace("---", "-", strtolower(trim($url)));
    $url = str_replace("--", "-", strtolower(trim($url)));
    return $url;
}

function upload_photos($type = 'multiple')
{
    $request = \Config\Services::request();
    $files = $request->getFiles();
    if ($_FILES['uploadFiles']['size'] == 0) {
        return [];
    }
    $return_array = [];
    if ($type == 'multiple') {

        for ($i = 0; $i < count($files['uploadFiles']); $i++) {
            $fileSingle = $request->getFile('uploadFiles.' . $i);
            $name = $fileSingle->getName();
            $name = explode(".", $name);
            $name = $name[0];
            $newName = $fileSingle->getRandomName();
            $newName = str_replace(" ", "", $name) . '_' . time() . '.' . $fileSingle->getExtension();
            $fileSingle->move('media/original', $newName);
            $arr = [$newName, '/media/original/' . $newName];
            array_push($return_array, $arr);
            // $imgdimen = getimagesize('media/original/' . $newName);
            // $width = $imgdimen[0];
            // $height = $imgdimen[1];
            // $ascpectField = $width > $height ? 'width' : 'height';
            // $image = \Config\Services::image()
            //     ->withFile('media/original/' . $newName)
            //     ->resize(400, 400, true, $ascpectField)
            //     ->save('media/400x400/' . $newName);
            // $image = \Config\Services::image()
            //     ->withFile('media/original/' . $newName)
            //     ->resize(800, 800, true, $ascpectField)
            //     ->save('media/800x800/' . $newName);
        }
        return $return_array;
        // pe($file);
    } else {
        $fileSingle = $request->getFile('uploadFiles');
        $name = $fileSingle->getName();
        $name = explode(".", $name);
        $name = $name[0];
        $newName = $fileSingle->getRandomName();
        $newName = str_replace(" ", "", $name) . '_' . time() . '.' . $fileSingle->getExtension();
        $fileSingle->move('media/original', $newName);
        $arr = [$newName, '/media/original/' . $newName];
        array_push($return_array, $arr);
        return $return_array;
    }
}

function snippetwopStipHTML($text, $length = 64, $tail = "...")
{
    $text = strip_tags($text);
    $text = trim($text);
    $text = str_replace("\\n", " ", $text);
    $txtl = strlen($text);
    if ($txtl > $length) {
        for ($i = 1; $text[$length - $i] != " "; $i++) {
            if ($i == $length) {
                return substr($text, 0, $length) . $tail;
            }
        }
        for (; $text[$length - $i] == "," || $text[$length - $i] == "." || $text[$length - $i] == " "; $i++) {;
        }
        $text = substr($text, 0, $length - $i + 1) . $tail;
    }
    $text = preg_replace("(\r\n|\n|\r)", " ", $text);
    return $text;
}

function brtoli($value)
{
    if (empty($value))
        return null;
    $val = explode("\n", $value);
    echo '<ul>';
    foreach ($val as $vll) {
        echo "<li>$vll</li>";
    }
    echo "</ul>";
}

function controlEditActivities()
{
    $session = session();
    if ($session->get('userlevel') < SUPERUSER_ADMIN_LEVEL) {
        $bse_url = base_url();
        header("Location: $bse_url");
        exit();
    }
}

function controlViaLogin($value = null)
{
    if ($value == 1)
        return false;
    $session = session();
    if (empty($session->get('username'))) {
        $bse_url = base_url();
        header("Location: $bse_url/login");
        exit();
    }
}

function controlAdminLogin($value = null)
{
    if ($value == 1)
        return false;
    $session = session();
    if (empty($session->get('username')) || $session->get('userlevel') <= USER_ADMIN_LEVEL) {
        $bse_url = base_url();
        header("Location: $bse_url/admin/login");
        exit();
    }
}

function showAdminEditLink($link)
{
    $session = session();
    if (empty($session->get('username')) || $session->get('userlevel') < 7) {
        return null;
    }
?>
    <a href="<?= base_url() ?><?= $link ?>"><small class="badge badge-primary"><b>Edit On Admin</b></small></a>
<?php
}

function showDate($value)
{
    return date("F j, Y", $value);
}

function getSessionLevel()
{
    $session = session();
    if (!empty($session)) {
        return $session->get('userlevel');
    }
    return 1;
}

if (!function_exists('pe')) {
    function pe($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        exit();
    }
}

if (!function_exists('p')) {
    function p($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}

function daysdiff($date1)
{
    if (empty($date1)) {
        return '';
    }
    // echo $date1."<br>";
    $ts1 = strtotime($date1);
    $ts2 = time();
    // echo $ts1."<br>";
    $year1 = date('Y', $ts1);
    $year2 = date('Y', $ts2);

    $month1 = date('m', $ts1);
    $month2 = date('m', $ts2);
    // echo $year1."#".$year2."<br>";
    // echo $month1."#".$month2."<br><br>";
    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);


    $datediff = $ts2 - $ts1;
    // pe($datediff);
    $diff =  round($datediff / (60 * 60 * 24));
    return $diff;
}

function monthdiff($date1)
{
    // echo $date1."<br>";
    $ts1 = strtotime($date1);
    $ts2 = time();
    // echo $ts1."<br>";
    $year1 = date('Y', $ts1);
    $year2 = date('Y', $ts2);

    $month1 = date('m', $ts1);
    $month2 = date('m', $ts2);
    // echo $year1."#".$year2."<br>";
    // echo $month1."#".$month2."<br><br>";
    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);


    $datediff = $ts2 - $ts1;

    $diff =  round($datediff / (60 * 60 * 24));
    return $diff;
}

function mailerDone($data)
{
    $email = new PHPMailer();
    $email->SetFrom('info@bookmybuddy.com', 'Admin'); //Name is optional
    $email->IsHTML(true);
    $email->Subject   = $data['subject'];
    $email->Body      = $data['body'];
    $email->AddAddress($data['address']);
    if (!empty($data['fileArray'])) {
        foreach ($data['fileArray'] as $key => $value) {
            $email->AddAttachment($value, $key);
        }
    }
    // pe($email);
    $email->Send();
}


function getSignDiv($position, $formsignid)
{
    return 
    '<span  class="signdiv" onclick="openSignDiv(' . $position . ',' . $formsignid . ')">
        <a id="imp" class="signaturebtn" href="javascript:;"><span id="abcd' . $position . '">ここをタップ </span>
            <img style="height: 23px;" id="sig-image' . $position . '" src="" />
            
        </a>
        <input type="hidden"  name="formsign[' . $position . ']" value="' . $formsignid . '" >
        <textarea id="sig_dataUrl' . $position . '" name="sig_dataUrl' . $position . '" class="form-control hideT" rows="5"></textarea>
    </span>';
}
function getaddressDiv($position, $formsignid)
{
    return '
    <input type="hidden"  name="formsign[' . $position . ']" value="' . $formsignid . '" >
    <input type="textbox" name="address'.$position . '" value=""  class="formSignAddress" placeholder="住所をご入力下さい" style="width: 50%;">';
} 

function getstampDiv($position, $formsignid)
{
    return '
    <input type="hidden"  name="formsign[' . $position . ']" value="' . $formsignid . '" >
    <label> 印鑑画像添付 : </label><input type="file" style="width: 185px;" id="uploadFiles" name="uploadFiles" accept="image/png, image/jpeg" class="custom-file-upload">';
} 