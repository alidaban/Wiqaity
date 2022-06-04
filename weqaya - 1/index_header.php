<div class="container-fluid">
            <section class="Header">
                        <div class="row top-main top-main-index">
                    <div class="logo col-sm-2"><a href="#">
                        <img src="images/32506432_10155935235618591_6786502752399785984_n.png" class="main-icon"></a>
                    </div>

                    <?php
                    // if( $_COOKIE["email"] == true){
                    //     echo "user is logedin";
                    // }
                    // session_start();
                    // if(isset($_SESSION)) 
                    // {
//                  print_r($_SESSION);
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    if((isset($_SESSION['loged']) && $_SESSION['loged'] == true ) || (isset($_COOKIE["loged"]) && $_COOKIE["loged"]==true) )
                    {
                     ?>
                    
                    <!-- user panel -->
                    <div class="user-logo col-sm-2">
                        
                        <span class="" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <a href="#" class="user-drop-menu">
                                                                <?php 
                            $profile_icon = "images/_ionicons_svg_md-contact.svg";
                            $user_image = get_user_image();
                            if($user_image!=null)
                            $profile_icon = "images/".$user_image; ?>
                                    <img style="border-radius: 50%" src=<?php echo $profile_icon ?> class="contact-icon"/>
                                    <i class="ion-chevron-down white"></i>

                            </a>
                            

                        </span>
<!--                         <span class="notfication-icon" >
                            <i class="ion-android-notifications "></i>

                            <span class="notifications-num">3</span>
                        
                        </span>
                        <div class="notification-menu ">
                            <?php //include_once 'notifications.php'; ?>

                        </div>--> 
                        <ul class="dropdown-menu dropdown-menu1 dropdownMenu3" aria-labelledby="dropdownMenu3">
                            <li><a href="Profile.php">الملف الشخصي</a></li> 
<!--                             <li><a href="masseges.php">الرسائل</a></li>
                            <li><a href="Profile.php#1">المشاركات</a></li>
 -->                            <li><a href="Setting.php">الأعدادات</a></li>
                            <li><a href="Controller/main_controller.php?logout=true">تسجيل الخروج</a></li>
                          </ul>
                    </div>
                    <!-- end user panel -->
                    <?php } ?>
                    <div class="main-nav col-sm-8">
                        <ul>
                            <li class="btn"><a href="index.php">الرئيسية</a></li>
                            <li class="btn"><a href="Ask-Doctors.php">اسأل طبيب</a></li>
                            <li class="btn"><a href="articls.php">مقالات طبية</a></li>
                            <li class="btn"><a href="term-index.php">مصطلحات طبية</a></li>
                            <li class="btn"><a href="Statistics.php">احصائيات</a></li>
                            <li class="btn"><a href="experinces.php">تجارب</a></li>
                            <li class="btn"><a href="about-us.php">عن الموقع</a></li>
                            <li class="btn"><a href="Contact-us.php">اتصل بنا</a></li>
                        </ul>
                    </div>
                    
                    <div class="dropdown">
                          <div class="" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <a href="#"><div class="btn menu-btn"><i class="ion-navicon-round"></i></div></a>
                          </div>
                          <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu1">
                            <li><a href="index.php">الرئيسية</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="Ask-Doctors.php">اسأل طبيب</a></li>
                            <li><a href="articls.php">مقالات طبية</a></li>
                            <li><a href="term-index.php">مصطلحات طبية</a></li>
                            <li><a href="Statistics.php">احصائيات</a></li>
                            <li><a href="experinces.php">تجارب نجاة</a></li>
                            <li><a href="about-us.php">عن الموقع</a></li>
                            <li><a href="Contact-us.php">اتصل بنا</a></li>
                          </ul>
                    </div>


                </div>
                
                <?php
                //page message area
            if(isset($_SESSION["msg"]) ) {//make sure there is a message session
                $fullmessage = $_SESSION["msg"];
//                print_r($_SESSION);
                //make sure there is a message set
                if( isset($fullmessage["isset"]) && $fullmessage["isset"] == true){
                    $message = $fullmessage['text'];
                    $status = $fullmessage['status'];
                    $background_color = get_status_color($status);//depend on the status the color will be determind
                    $text_color = get_status_text_color($status);//depend on the status the color will be determind

                    //session_unset($_SESSION['msg']);

                    // print message
                echo '<div 
                style="background-color: '.$background_color.';
                padding: 5px;
                ">
                    <p style="color:'.$text_color.';
                        width: 637px;
                        padding-right: 15px;
                        margin: auto;">
                            '.$message.'
                    </p>
                </div>';
                    //empty the msg
                    $fullmessage["isset"] = false;
                    $fullmessage['text'] = "";
                    $fullmessage['status'] = "";
                    $_SESSION["msg"]=$fullmessage;

            }
            ?>
            <div 
                style="background-color: #D9EDF7;
                padding: 5px;
                ">
                    <p style="color:#316F8F;
                        width: 637px;
                        padding-right: 15px;
                        margin: auto;">
                        الموقع لايزال قيد التطوير...
                    </p>
                </div>  
                <?php
            } 
            
            function get_status_color($status){
                if($status == 'fail'){
                    return '#EBCCD1';
                }else if($status == 'warning'){
                    return '#FAEBCC';
                }else if($status == 'info'){
                    return '#D9EDF7';
                }else if($status == 'success'){
                    return '#D6E9C6';
                }
            }            
            function get_status_text_color($status){
                if($status == 'fail'){
                    return '#B52243';
                }else if($status == 'warning'){
                    return '#8A6C43';
                }else if($status == 'info'){
                    return '#316F8F';
                }else if($status == 'success'){
                    return '#3C763E';
                }
            }
            ?>
       