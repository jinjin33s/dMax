<? include "header.php" ?>

        <div id="container">
                         <div id="header">
                                <div class="div1">
                                </div>
                                <div class="admin_title">D-max ADMIN  </div>
                                <div class="div2">
                                        
                                        <div class="top_bar_item" >
                                            <a href="<?=base_url();?>">go to HOME </a>
                                        </div>
                                        
                                </div>
                         </div>                       
                         <div id="menu">
                            <? include "navigation.php" ?>
                        </div>
            
                        <div id="content" >
                            <div class="box">
                                <div class="left"></div>
                                <div class="right"></div>
                                <div class="heading">
                                    <h1 class="viewname"><? echo $view_name;?></h1>
                                </div>
                                <div class="content">
                                    <?
                                        $this->load->view("admin/".$view_name);
                                    ?>
                                </div>
                            </div>
                        </div>
        </div>

<? include "footer.php" ?>
                   