            <div class="footer">
                <div class="row">
                    
                    <div class="col-sm-3 footer-nav">
                        <ul>
                            <li class="pink-f"><a href="index.php">الرئيسية</a></li>
                            <li><a href="Ask-Doctors.php">اسأل طبيب</a></li>
                            <li><a href="articls.php">مقالات طبية</a></li>
                            <li><a href="term-index.php">مصطلحات طبية</a></li>
                            <li><a href="Statistics.php">احصائيات</a></li>
                            <li><a href="experinces.php">تجارب نجاة</a></li>
                            <li><a href="about-us.php">عن الموقع</a></li>
                            <li><a href="Contact-us.php">اتصل بنا</a></li>
                        
                        </ul>
                    </div>
                    
                    
                    <div class="col-sm-3 footer-nav">
                        <ul>
                            <li class="pink-f"><a href="articles">مقالات مهمة</a></li>
                            <?php
                                //var_dump($articlesResult);
                                $sql = "SELECT id,title FROM articles LIMIT 6";
                                $articlesResult = $conn->query($sql);
                                if ($articlesResult->num_rows > 0) {
                                while($row = $articlesResult->fetch_assoc()) { 
                                $id = $row['id'];
                            ?>
                            <li><a href="article.php?id=<?php echo $id; ?>&type=article">
                                <?php
                                   echo $row["title"];
                                ?></a></li>
                            <?php 
                                }
                            }
                            ?>
                        
                        </ul>
                    </div>
                    
                    <div class="col-sm-3 footer-nav">
                        <ul>

                            <li class="pink-f"><a href="experinces.php">تجارب</a></li>
                            <?php
                                //var_dump($articlesResult);
                                $sql = "SELECT id,title FROM experiences LIMIT 4";
                                $articlesResult = $conn->query($sql);
                                if ($articlesResult->num_rows > 0) {
                                while($row = $articlesResult->fetch_assoc()) { 
                                $id = $row['id'];
                            ?>
                            <li>
                            <a href="article.php?id=<?php echo $id; ?>&type=expereince">
                            <?php
                                   echo $row["title"];
                                ?></a>
                            </li>
                            <?php }} ?>
                        </ul>
                    </div>
                    
                    
                    <div class="col-sm-3 f-edit">
                        <div class="social-icon ">
                            <a href="#"><div class="icon-back-f t-icon"><i class="ion-social-twitter"></i></div></a>
                            <a href="#"><div class="icon-back-f y-icon"><i class="ion-social-youtube"></i></div></a>
                            <a href="#"><div class="f-icon-1"><i class="ion-social-facebook"></i></div></a>
                        </div>
                        <div class="white"><p>0097-0591-1234-567 <br /><br />
                        <a href="#">breastcancer@info.ps</a>
                        </p>
                        </div>
                    </div>

                    
                </div>
                <div class="row footer-last"><p>Copyright © 2018 | Breast cancer portal| All Rights Reserved</p></div>
                
            </div>
