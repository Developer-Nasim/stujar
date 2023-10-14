<div class="header_top">
    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-2">
              <div class="mt-2 header_top_mobile">{{ $websettings['cms_contactaddress']}}</div>  
            </div>
            <div class="col-md-4 mt-2">
                <!--<div class="text-center">ওয়েবসাইটটি নির্মাণাধীন</div>-->
            </div>
            <div class="col-md-3">
                <div class="footer_social mt-1 footer_social_mobile" style="float: right;">
                    <ul>
                        <li><a href="login" class="text-bcs-orange">Login</a> &nbsp; &nbsp;</li>
                        @include($websettings['cms_layout'].'.components.social',['isList'=>1])
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Start Header Area -->
	<header class="header">
		<div class="container">
			<div class="row">
				<!-- Logo -->
				<div class="col-lg-2 align-self-center">
                    <a href="{{ url('/') }}">
                        <span class="logo">
                            <img src="{{ 'images/uploads/thumb/'.$websettings['cms_logo_public'] }}" alt="" height="100">                       
                        </span>
                    </a>
                <span class="get_a_quote"><a href="get-a-quotation" class="btn mt-4 fs-4 quote_btn">Get a Quote</a></span>  
					<div class="canvas_open">
                        <a href="javascript:void(0)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
				</div>

				<div class="col-lg-10">
					<!-- Header Right Button -->
					<div class="hr_btn">
                        <a href="get-a-quotation" class="button-2"> Get a Quotation</a>
					</div>               
					<!-- Menu -->
					<div class="menu">
						<nav>
                            <?php 
                            $menus = [];
                            $i = 1;
                            foreach($tags as $tag){
                              if(empty($tag->parent)){
                                $menus[$tag->id]['id']= $tag->id;
                                $menus[$tag->id]['title']= $tag->title;
                                $menus[$tag->id]['linkto']= $tag->linkto;
                                $menus[$tag->id]['linkUrl']= $tag->linkUrl;
                                $menus[$tag->id]['status']= $tag->status;
                              }else{
                                $child[$tag->parent][$i]['id'] = $tag->id;
                                $child[$tag->parent][$i]['title'] = $tag->title;
                                $child[$tag->parent][$i]['linkto'] = $tag->linkto;
                                $child[$tag->parent][$i]['linkUrl'] = $tag->linkUrl;
                                $child[$tag->parent][$i]['status'] = $tag->status;
                                $i++;
                              }
                            }
                            echo '<ul>';
                            foreach($menus as $key => $value){
                                if(!empty($child[$key])){
                                    $hasClass = "menu-item-has-children";
                                }else{
                                    $hasClass = "";
                                }
                                if(!empty($value['linkto'])){
                                    $menuLink = $value['linkto'];
                                }elseif(!empty($value['linkUrl'])){
                                    $menuLink = $value['linkUrl'];
                                }else{
                                    $menuLink = "#";
                                }
                                if($menuLink == "#"){
                                    $menuHTML = '<li class="'.$hasClass.'"><span>'.$value['title'].'</span>';
                                }else{
                                    $menuHTML = '<li class="'.$hasClass.'"><a href="'.$menuLink.'">'.$value['title'].'</a>';
                                }
                                // $menuHTML = '<li class="'.$hasClass.'"><a href="'.$menuLink.'">'.$value['title'].'</a>';
                                echo $menuHTML;
                                if(!empty($child[$key])){
                                    echo '<ul>';
                                    foreach($child[$key] as $ke => $val){
                                        if(!empty($val['linkto'])){
                                            $menuLi = $val['linkto'];
                                        }elseif(!empty($val['linkUrl'])){
                                            $menuLi = $val['linkUrl'];
                                        }else{
                                            $menuLi = "#";
                                        }
                                        echo '<li><a href="'.$menuLi.'">'.$val['title'].'</a>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</li>';
                            }
                            echo '</ul>';
                            ?>
						</nav>                     
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
	<!-- Start Mobile Menu Area -->
    <div class="mobile-menu-area">
        <!--offcanvas menu area start-->
        <div class="off_canvars_overlay"></div>
        <div class="offcanvas_menu">
            <div class="offcanvas_menu_wrapper">
                <div class="canvas_close">
                    <a href="javascript:void(0)"><i class="fas fa-times"></i></a>
                </div>
                <div class="mobile-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ 'images/uploads/thumb/'.$websettings['cms_logo_public'] }}" alt="" height="100">
                    </a>
                </div>
                <div id="menu" class="text-left">
                    <?php 
                    $menus = [];
                    $i = 1;
                    foreach($tags as $tag){
                      if(empty($tag->parent)){
                        $menus[$tag->id]['id']= $tag->id;
                        $menus[$tag->id]['title']= $tag->title;
                        $menus[$tag->id]['linkto']= $tag->linkto;
                        $menus[$tag->id]['linkUrl']= $tag->linkUrl;
                        $menus[$tag->id]['status']= $tag->status;
                      }else{
                        $child[$tag->parent][$i]['id'] = $tag->id;
                        $child[$tag->parent][$i]['title'] = $tag->title;
                        $child[$tag->parent][$i]['linkto'] = $tag->linkto;
                        $child[$tag->parent][$i]['linkUrl'] = $tag->linkUrl;
                        $child[$tag->parent][$i]['status'] = $tag->status;
                        $i++;
                      }
                    }
                    echo '<ul class="offcanvas_main_menu">';
                    foreach($menus as $key => $value){
                        if(!empty($child[$key])){
                            $hasClass = "menu-item-has-children menu-open";
                            $menuAngle = '<span class="menu-expand"><i class="fa fa-angle-down"></i></span>';
                        }else{
                            $hasClass = "";$menuAngle = '';
                        }
                        if(!empty($value['linkto'])){
                            $menuLink = $value['linkto'];
                        }elseif(!empty($value['linkUrl'])){
                            $menuLink = $value['linkUrl'];
                        }else{
                            $menuLink = "#";
                        }
                        echo '<li class="'.$hasClass.'">'.$menuAngle.'<a href="'.$menuLink.'">'.$value['title'].'</a>';
                        if(!empty($child[$key])){
                            echo '<ul class="sub-menu">';
                            foreach($child[$key] as $ke => $val){
                                if(!empty($val['linkto'])){
                                    $menuLi = $val['linkto'];
                                }elseif(!empty($val['linkUrl'])){
                                    $menuLi = $val['linkUrl'];
                                }else{
                                    $menuLi = "#";
                                }
                                echo '<li><a href="'.$menuLi.'">'.$val['title'].'</a>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                    ?>
                    <div class="footer_social mt-1">
                        <ul>
                            <li><a href="login" class="text-bcs-orange">Login</a> &nbsp; &nbsp;</li>
                            @include($websettings['cms_layout'].'.components.social',['isList'=>1])
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->