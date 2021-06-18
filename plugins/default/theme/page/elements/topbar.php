<?php
	if(ossn_isLoggedin()){		
		$hide_loggedin = "hidden-xs hidden-sm";
	}
?>
<!-- ossn topbar -->
<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="top_menu_bar">

				<div class="col-md-12 col-xs-12 site_logo">
					<a class="sitename" href="<?php echo ossn_site_url();?>"><?php $name = ossn_site_settings('site_name'); echo $name;?></a>
					<div class="topbar-userdata">
						<span class="name"><?php echo ossn_loggedin_user()->fullname;?></span>
						<img src="<?php echo ossn_loggedin_user()->iconURL()->smaller;?>" />
					</div>   
				</div>

				<div class="col-md-5 col-xs-12 search_bar">
					<?php if(ossn_isLoggedin()){ ?>
					<div class="topbar-menu-left site-name">
						<?php echo ossn_view_form('search', array(
									'component' => 'OssnSearch',
									'class' => 'ossn-search',
									'autocomplete' => 'off',
									'method' => 'get',
									'security_tokens' => false,
									'action' => ossn_site_url("search"),
						), false);
					?>
					</div>
					<?php } ?>
				</div>

				<div class="col-md-3 col-xs-12 right_menu">
					<div class="topbar-menu-right">

						<li class="ossn-topbar-dropdown-menu">
							<div class="dropdown">
							<?php
								if(ossn_isLoggedin()){						
									echo ossn_plugin_view('output/url', array(
										'role' => 'button',
										'data-toggle' => 'dropdown',
										'data-target' => '#',
										'text' => '<i class="fa fa-sort-desc"></i>',
									));									
									echo ossn_view_menu('topbar_dropdown'); 
								}
								?>
							</div>
						</li>                
						<?php
							if(ossn_isLoggedin()){
								echo ossn_plugin_view('notifications/page/topbar');
							}
							?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- ./ ossn topbar -->