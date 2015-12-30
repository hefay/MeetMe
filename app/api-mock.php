<?php
  $params = $_GET['params'];
  $params = trim($params, "/");
  $params = explode("/", $params);
  
  if(count($params) < 0 || count($params) > 2 || $params[0] != 'actions') {
    header("HTTP/1.0 400 Bad request");
    $err = new stdClass();
    $err->message = "Bad request.";
    echo json_encode($err);
    exit;
  }

  $description = <<<TXT
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu dignissim lacus, non dapibus diam. Phasellus pellentesque, mauris venenatis commodo dignissim, sapien enim sodales ligula, et rhoncus nibh dolor ut ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam quis massa lectus. Aenean vulputate auctor molestie. Vivamus in efficitur ipsum. Mauris fringilla augue eros, quis faucibus libero pharetra vitae. Proin ac dolor lectus. Pellentesque id rhoncus leo. Pellentesque sollicitudin aliquam massa, eu sagittis tellus vehicula non. Nam eu bibendum ex. Morbi enim libero, pulvinar nec sapien eget, dapibus convallis est. Etiam arcu lectus, interdum sit amet vestibulum ac, luctus a massa. Curabitur enim urna, accumsan sit amet erat lacinia, rutrum pulvinar ex.

Fusce cursus quis dolor a ornare. Cras tincidunt lacus eu venenatis hendrerit. Nullam tempus quis neque sit amet luctus. Ut auctor lectus et pellentesque volutpat. Maecenas est leo, ultricies eu porttitor id, pellentesque ac leo. Nullam sagittis enim sed interdum volutpat. Quisque volutpat massa nec sollicitudin elementum. Donec nisi neque, vehicula sed lectus et, varius ultrices tortor. Etiam efficitur quis magna faucibus tristique. Pellentesque vitae tortor sed neque consectetur finibus. Duis pharetra risus metus, non sagittis lacus volutpat a. Pellentesque quis scelerisque nisi. Phasellus a erat sit amet dui fringilla rhoncus eu ac nisi. Maecenas metus diam, cursus ac faucibus in, dictum porta ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;

Duis id luctus ipsum, nec iaculis libero. Nam pellentesque magna in sem convallis, a semper arcu dignissim. Vestibulum feugiat hendrerit sem et iaculis. Pellentesque non sapien faucibus, accumsan velit vitae, porttitor metus. Curabitur sed rhoncus neque. Vestibulum metus arcu, commodo sed sapien sed, volutpat hendrerit eros. Morbi maximus eu lacus id egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
TXT;

  $actions = [];

  $action = new stdClass();
  $action->urlName = "muj-super-vylet";
  $action->name = "Můj super výlet";
  $action->location = "Kutná Hora";
  $action->date = "2016-10-20";
  $action->description = "Podíváme se do jezuitských kolejí...";
  $action->photos = [
    "http://www.247orangetransfers.com/images/kutnahora.jpg",
    "http://www.czechthelight.cz/getattachment/28fccdea-42cb-4982-821b-ef423f8a0457/Kutna-Hora.aspx",
    "http://img.ceskatelevize.cz/program/porady/10361869257/foto09/211563235200006_01.jpg?1336051947",
    "http://img.vykupto.cz/cw/19515/vykupto_kutna_hora_W.jpg"
  ];
  $actions[] = $action;

  $action = new stdClass();
  $action->urlName = "vietnam-2017";
  $action->name = "Vietnam 2017";
  $action->location = "Vietnam";
  $action->date = "2017-10-20";
  $action->description = $description;
  $action->photos = [
    "http://cdn-media-2.lifehack.org/wp-content/files/2015/01/Vietnam-riverside.jpg",
    "http://www.lighthouseclub.asia/wp-content/uploads/2014/09/section_vietnam.jpg",
    "http://www.cherishtrip.com/wp-content/uploads/2015/10/Vietnam-header-1.jpg",
    "http://www.merck.vn/country.vn/en/images/welcome_vietnam_tcm201_100066.jpg",
    "https://worldexpeditions.s3-ap-southeast-2.amazonaws.com/Asia/Vietnam/Rice-Paddies-Vietnam-192533-0.jpg"
  ];
  $actions[] = $action;

  $action = new stdClass();
  $action->urlName = "kola-2017";
  $action->name = "Kola 2017";
  $action->location = "Kácov";
  $action->date = "2017-08-10";
  $action->description = $description;
  $action->photos = [
    "http://www.trail-busters.cz/webfoto/131010_sazava/sazava_trailbusters_slavikpetrcom_020.jpg",
  ];
  $actions[] = $action;

  $action = new stdClass();
  $action->urlName = "ceske-svycarsko";
  $action->name = "České Švýcarsko";
  $action->location = "České Švýcarsko";
  $action->date = "2017-09-01";
  $action->description = "Podíváme se do jezuitských kolejí...";
  $action->photos = [
    "http://labehotel.cz/wp-content/uploads/2015/09/shutterstock_75290383.jpg",
    "http://st3.geg.cz/photo/420432_detail.jpg",
    "http://i.idnes.cz/11/121/cl6/ABR2bbc4b_svycarsko.jpg"
  ];
  $actions[] = $action;

  $action = new stdClass();
  $action->urlName = "cesky-raj";
  $action->name = "Český ráj";
  $action->location = "Český ráj";
  $action->date = "2017-09-08";
  $action->description = $description;
  $action->photos = [
    "http://files.cesky-raj-klenot-nasi-vlasti.webnode.cz/200005613-b5619b65b3/kost-cesky-raj-hrad-kost-udoli-plakanku.jpg",
    "http://www.krasycech.cz/Cesky-raj/intro.jpg"
  ];
  $actions[] = $action;
  
  if(count($params) == 1) {
    $rr = [];
    foreach($actions as $action) {
      $er = new stdClass();
      $er->name = $action->name;
      $er->urlName = $action->urlName;
      $er->description = truncate($action->description);
      $er->cover = reset($action->photos);
      $rr[] = $er;
    }
    echo json_encode($rr);
    exit;
  }

  if(count($params) == 2) {
    foreach($actions as $action) {
      if($action->urlName == $params[1]) {
        echo json_encode($action);
        exit;
      }     
    }
    header("HTTP/1.0 404 Not Found");
    $err = new stdClass();
    $err->message = "Action not found.";
    echo json_encode($err);
    exit; 
  }

  function truncate($text, $chars = 250) {
      $text = $text." ";
      $text = substr($text,0,$chars);
      $text = substr($text,0,strrpos($text,' '));
      $text = $text."...";
      return $text;
  }

?>