       <?php 
           include_once 'DB.php'; 
           session_start();
       ?>
       <div class="row top-main">
                    <div class="logo col-sm-2">
                    <a href="index.php">
                        <img src="images/32506432_10155935235618591_6786502752399785984_n.png" class="main-icon">
                        </a>
                    </div>
                  <!--  <div class="sec-nav">
                        <ul class="nav nav-pills nav-stacked">
                        </ul>
                    </div>-->
                    <?php
                    //print_r($_SESSION);
                    // if(!isset($_SESSION)) 
                    // { 
                    //     session_start(); 
                    //     //echo "session started";
                    // } 
                    if(!isset($_SESSION)){
                        session_start();
                    }

                     if((isset($_SESSION['loged']) && $_SESSION['loged'] == true) || (isset($_COOKIE["loged"]) && $_COOKIE["loged"]==true ) )
                    {
                     ?>
                    
                    <!-- user panel-->
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
                            <li><a href="Profile.php">?????????? ????????????</a></li> 
<!--                             <li><a href="masseges.php">??????????????</a></li>
                            <li><a href="Profile.php#1">??????????????????</a></li>
 -->                            <li><a href="Setting.php">??????????????????</a></li>
                            <li><a href="Controller/main_controller.php?logout=true">?????????? ????????????</a></li>
                          </ul>
                    </div>
                    <!-- end user panel -->
                    <?php } ?>
                    <div class="main-nav col-sm-8">
                        <ul>
                            <li class="btn"><a href="index.php">????????????????</a></li>
                            <li class="btn"><a href="Ask-Doctors.php">???????? ????????</a></li>
                            <li class="btn"><a href="articls.php">???????????? ????????</a></li>
                            <li class="btn"><a href="term-index.php">?????????????? ????????</a></li>
                            <li class="btn"><a href="Statistics.php">????????????????</a></li>
                            <li class="btn"><a href="experinces.php">?????????? ????????</a></li>
                            <li class="btn"><a href="about-us.php">???? ????????????</a></li>
                            <li class="btn"><a href="Contact-us.php">???????? ??????</a></li>
                        </ul>
                    </div>
                    
                    <div class="dropdown">
                          <div class="" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <a href="#"><div class="btn menu-btn"><i class="ion-navicon-round"></i></div></a>
                          </div>
                          <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu1">
                            <li><a href="index.php">????????????????</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="Ask-Doctors.php">???????? ????????</a></li>
                            <li><a href="articls.php">???????????? ????????</a></li>
                            <li><a href="term-index.php">?????????????? ????????</a></li>
                            <li><a href="Statistics.php">????????????????</a></li>
                            <li><a href="experinces.php">?????????? ????????</a></li>
                            <li><a href="about-us.php">???? ????????????</a></li>
                            <li><a href="Contact-us.php">???????? ??????</a></li>
                          </ul>
                    </div>


                </div>
 <?php
            //page message area
            if(isset($_SESSION["msg"]) ) {//make sure there is a message session
                $fullmessage = $_SESSION["msg"];//fullmessage includes array of the [message] and the [status]
//                print_r($_SESSION);
                //make sure there is a message set

                if( isset($fullmessage["isset"]) && $fullmessage["isset"] == true ){
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
                    //empty the msg session
                    $fullmessage["isset"] = false;
                    $fullmessage['text'] = "";
                    $fullmessage['status'] = "";
                    $_SESSION["msg"]=$fullmessage;

                }
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
       