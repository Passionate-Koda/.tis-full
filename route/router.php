<?php
// This page will load routes that will call the file directories
// job fluent

$uri = explode("/", $_SERVER['REQUEST_URI']);
 // var_dump($uri);

if(count($uri) > 2){
  header("Location: /tunsehome");
}
$msgValue = NULL;
$updLocValue = NULL;
$getValue = NULL;
$tValue = NULL;
$idValue = NULL;
$tValue = NULL;
$oValue = NULL;
$iValue = NULL;
$sValue = NULL;
$rValue = NULL;
$retValue = NULL;
$hidValue = NULL;
$tokenValue = NULL;

if(isset($_GET['hid'])){
  $hidValue = $_GET['hid'];
}
if(isset($_GET['token'])){
  $tokenValue = $_GET['token'];
}
if(isset($_GET['msg'])){
  $msgValue = $_GET['msg'];
}
if(isset($_GET['s'])){
  $sValue = $_GET['s'];
}
if(isset($_GET['r'])){
  $rValue = $_GET['r'];
}
if(isset($_GET['o'])){
  $oValue = $_GET['o'];
}
if(isset($_GET['t'])){
  $tValue = $_GET['t'];
}
if(isset($_GET['i'])){
  $iValue = $_GET['i'];
}


if(isset($_GET['get'])){
  $getValue = $_GET['get'];
}
if(isset($_GET['ret'])){
  $retValue = $_GET['ret'];
}

if(isset($_GET['updLoc'])){
  $updLocValue = $_GET['updLoc'];
}

if(isset($_GET['id'])){
  $idValue = $_GET['id'];
}

switch($uri[1]){
  case "":
  include APP_PATH."/view/public/tunsehome.php";
  break;

  case "home":
  include APP_PATH."/view/public/tunsehome.php";
  break;

  default:
  include APP_PATH."/view/public/tunsehome.php";
  break;

  case "tworkers":
  include APP_PATH."/view/tworkers/tworker_register.php";
  break;

  case "current":
  include APP_PATH."/view/tworkers/current.php";
  break;

  case "style":
  include APP_PATH."/www/css/style.css";
  break;

  case "underscore":
  include APP_PATH."/www/js/underscore-min.js";
  break;

  case "tworkers_login":
  include APP_PATH."/view/tworkers/tworkers_login.php";
  break;

  case "t_home":
  include APP_PATH."/view/tworkers/tworkers_home.php";
  break;

  case "viewMap":
  include APP_PATH."/view/tworkers/view_location.php";
  break;

  case "c_registration":
  include APP_PATH."/view/tworkers/c_reg.php";
  break;

  case "db":
  include APP_PATH."/models/entity_db.php";
  break;

  case "t_ajax":
  include APP_PATH."/view/tworkers/js/t_ajax.js";
  break;

  case "c_ajax":
  include APP_PATH."/view/tworkers/js/ajax.js";
  break;

  case "u_ajax":
  include APP_PATH."/view/public/js/u_ajax.js";
  break;

  case "f_ajax":
  include APP_PATH."/view/public/js/ajax.js";
  break;

  case "tworkersVerification?hid=$hidValue&token=$tokenValue":
  include APP_PATH."/view/verify.php";
  break;

  case "u_login":
  include APP_PATH."/view/public/u_login.php";
  break;

  case "u_register":
  include APP_PATH."/view/public/u_register.php";
  break;

  case "u_logout":
  include APP_PATH."/view/public/logout.php";
  break;

  case "t_logout":
  include APP_PATH."/view/tworkers/logout.php";
  break;

  case "u_platform":
  include APP_PATH."/view/public/u_dashboard.php";
  break;

  case "u_inbox":
  include APP_PATH."/view/public/inbox.php";
  break;

  case "u_message":
  include APP_PATH."/view/public/message.php";
  break;

  case "about":
  include APP_PATH."/view/public/about.php";
  break;

  case "u_locate":
  include APP_PATH."/view/public/user_location_update.php";
  break;

  case "u_PendingTaskCount":
  include APP_PATH."/view/public/ajax_users_requests/userPendingTaskCount.php";
  break;

  case "u_TaskCount":
  include APP_PATH."/view/public/ajax_users_requests/UserTaskCount.php";
  break;

  case "updateTask":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/updateTask.php";
  break;












  //routes with Query Strings;


  case "tworkers_login?msg=$msgValue":
  include APP_PATH."/view/tworkers/tworkers_login.php";
  break;
  case "tworkers_login?msg=$msgValue&ret=$retValue":
  include APP_PATH."/view/tworkers/tworkers_login.php";
  break;

  case "t_home?updLoc=$updLocValue":
  include APP_PATH."/view/tworkers/tworkersDashboard.php";
  break;

  case "t_platform?updLoc=$updLocValue":
  include APP_PATH."/view/tworkers/u_dashboard.php";
  break;

  case "t_home?msg=$msgValue":
  include APP_PATH."/view/tworkers/tworkers_home.php";
  break;

  case "lga?get=$getValue":
  include APP_PATH."/view/tworkers/lga.php";
  break;

  case "fetchRequest?get=$getValue":
  include APP_PATH."/view/public/fetch_request.php";
  break;

  case "tworkersBoard?t=$tValue":
  include APP_PATH."/view/public/t_dashboard.php";
  break;

  case "t_notification":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/get_tworkers_notification.php";
  break;

  case "u_notification":
  include APP_PATH."/view/public/ajax_users_requests/get_users_notification.php";
  break;

  case "Uactive":
  include APP_PATH."/view/public/ajax_users_requests/active.php";
  break;

  case "t_notificationCount":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/getNotificationCount.php";
  break;

  case "Tactive":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/active.php";
  break;

  case "u_notificationCount":
  include APP_PATH."/view/public/ajax_users_requests/getUsersNotificationCount.php";
  break;

  case "t_sendNot":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/sendnotification.php";
  break;

  case "upNot":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/updateNotification.php";
  break;

  case "task?id=$idValue":
  include APP_PATH."/view/tworkers/task.php";
  break;

  case "message?s=$sValue&r=$rValue":
  include APP_PATH."/view/public/message_front.php";
  break;

  case "reply?id=$idValue":
  include APP_PATH."/view/public/reply.php";
  break;

  case "decline?id=$idValue":
  include APP_PATH."/view/public/decline.php";
  break;

  case "addContact":
  include APP_PATH."/view/public/ajax_users_requests/add_contact.php";
  break;

  case "sendMessage":
  include APP_PATH."/view/public/ajax_users_requests/send_message.php";
  break;

  case "getMessage":
  include APP_PATH."/view/public/ajax_users_requests/get_message.php";
  break;
  case "getMessageRow":
  include APP_PATH."/view/public/ajax_users_requests/get_message_row.php";
  break;
  case "getTMessage":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/get_message.php";
  break;
  case "getTMessageRow":
  include APP_PATH."/view/tworkers/ajax_tworker_request_handler/get_message_row.php";
  break;


//styled routes

case "tunsehome":
include APP_PATH."/view/public/tunsehome.php";
break;

case "tunsehome?msg=$msgValue":
include APP_PATH."/view/public/tunsehome.php";
break;
case "tunsehome?msg=$msgValue&ret=$retValue":
include APP_PATH."/view/public/tunsehome.php";
break;

case "upNot":
include APP_PATH."/view/tworkers/ajax_tworker_request_handler/updateNotification.php";
break;

case "getTContactForMessage":
include APP_PATH."/view/tworkers/ajax_tworker_request_handler/get_message_contact.php";
break;

case "dashboard":
include APP_PATH."/view/public/userdashboard.php";
break;

case "myDashboard":
include APP_PATH."/view/tworkers/tworkersDashboard.php";
break;

case "myDashboard?msg=$msgValue":
include APP_PATH."/view/tworkers/tworkersDashboard.php";
break;

case "tworkersMessage":
include APP_PATH."/view/tworkers/tworkers_message.php";
break;

case "tworkersMessenger?s=$sValue&r=$rValue":
include APP_PATH."/view/tworkers/tworkers_messenger.php";
break;

case "findtworkers?id=$idValue":
include APP_PATH."/view/public/showtworkers.php";
break;

case "contact":
include APP_PATH."/view/public/contacts.php";
break;

case "contact?o=$oValue&t=$tValue&i=$iValue":
include APP_PATH."/view/public/contact_info.php";
break;

case "st_ajax":
include APP_PATH."/view/public/js/showTworkersAjax.js";
break;

case "contactAjax":
include APP_PATH."/view/public/js/contactAjax.js";
break;
case "messageAjax":
include APP_PATH."/view/public/js/message_ajax.js";
break;

case "fmessageAjax":
include APP_PATH."/view/public/js/first_messageAjax.js";
break;

case "fetchModal":
include APP_PATH."/view/public/ajax_users_requests/modal_fetch.php";
break;

case "sendMessageNotification":
include APP_PATH."/view/public/ajax_users_requests/send_message_notification.php";
break;

case "sendTask":
include APP_PATH."/view/public/ajax_users_requests/sendtask.php";
break;

case "getContact":
include APP_PATH."/view/public/ajax_users_requests/get_contact.php";
break;
case "getContactForMessage":
include APP_PATH."/view/public/ajax_users_requests/get_message_contact.php";
break;

case "getUsersMessageNotification":
include APP_PATH."/view/public/ajax_users_requests/get_users_message_notification.php";
break;

case "getUsersMessageNotificationCount":
include APP_PATH."/view/public/ajax_users_requests/get_users_message_notificationCount.php";
break;

case "dashboard_ajax":
include APP_PATH."/view/public/js/d_ajax.js";
break;

case "tworkerDashboard_ajax":
include APP_PATH."/view/tworkers/js/td_ajax.js";
break;
case "tcontactAjax":
include APP_PATH."/view/tworkers/js/contactAjax.js";
break;

case "tmessageAjax":
include APP_PATH."/view/tworkers/js/message_ajax.js";
break;

case "ftmessageAjax":
include APP_PATH."/view/tworkers/js/first_messageAjax.js";
break;

case "tworkerRegistration":
include APP_PATH."/view/tworkers/registerTworker.php";
break;

case "tworkersContact":
include APP_PATH."/view/tworkers/contact.php";
break;

case "tworkersContact?o=$oValue&t=$tValue&i=$iValue":
include APP_PATH."/view/tworkers/t_contact_info.php";
break;

// case "tworkerLogin":
// include APP_PATH."/view/tworkers/tworkers_login.php";
// break;

case "declineTaskCount":
include APP_PATH."/view/tworkers/ajax_tworker_request_handler/tworkers_declineTaskCount.php";
break;

case "getTworkersMessageNotification":
include APP_PATH."/view/tworkers/ajax_tworker_request_handler/get_tworkers_message_notification.php";
break;

case "getTworkersMessageNotificationCount":
include APP_PATH."/view/tworkers/ajax_tworker_request_handler/get_tworkers_message_notificationCount.php";
break;

case "acceptedTaskCount":
include APP_PATH."/view/tworkers/ajax_tworker_request_handler/tworkers_acceptTaskCount.php";
break;

case "getTContact":
include APP_PATH."/view/tworkers/ajax_tworker_request_handler/get_t_contact.php";
break;

}

?>
