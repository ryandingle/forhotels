<?php if($this->session->userdata('logged_in')){?>
<nav class="navbar navbar-default navbar-fixed-top alert-info" role="navigation">
	<div class="navbar-inner container-fluid">
        <div class="container">        
            <div style="margin-left: 18px;" class="navbar-header">
                <a style="color: #000" class="navbar-brand" href="<?php echo base_url();?>">
                	&nbsp;Hotel Records
                </a>
            </div>
            <?php if($this->uri->segment(1) == ''){ echo ''; }else {?>
            <div style="margin-right: -1%;">
                <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url();?>welcome/add_section">Add Data
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>welcome/search_section">Search Data
                                <i class="glyphicon glyphicon-search"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>welcome/view_data">View Data
                            <i class="glyphicon glyphicon-list"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-cog">
                            <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo base_url();?>welcome/acount">Acount
                                    <i style="color: blue" class="glyphicon glyphicon-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_new" href="<?php echo base_url();?>welcome/backup">Backup Database
                                    <i style="color: blue" class="glyphicon glyphicon-download"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>welcome/logout">Logout
                                    <i  style="color: blue" class="glyphicon glyphicon-off"></i>
                                    </a>
                                </li>
                            </ul>
                      </li>
                </ul>
            </div>
            <?php };?>
        </div>
    </div>
</nav>
<?php }else {};?>