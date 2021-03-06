<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>股票交易系统——个人中心</title>
        <link rel="stylesheet" href="/stocktradingsystem-3/Public/css/bootstrap.min.css">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="/stocktradingsystem-3/Public/css/sidebar-menu.css">
    </head>

  <body id="index">
        <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#" style="
    width: 430px;
">
        <img alt="Brand" class="col-sm-2 col-xs-3" src="/stocktradingsystem-3/Public/logo2.png" style="
    width: 55px;
">  
    股票交易个人中心
    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li><a><?php echo $_SESSION['username']?>，今天是<?php echo date('Y-m-d', time())?></a></li>
    <li><a href="javascript:ms=confirm('确定退出');ms?location.href='/stocktradingsystem-3/index.php/Home/Login/logout':history.go(0)" >退出登录</a></li>
    </ul>
   </div>
   </nav>
    <section class="col-sm-3 col-xs-5">
    <ul class="sidebar-menu">
      <li class="sidebar-header">菜单</li>
      <li>
        <a href="/stocktradingsystem-3/index.php/Home/Index/buyStock">
          <i class="fa fa-th"></i> <span>买入</span>
        </a>
      </li>
      <li>
        <a href="/stocktradingsystem-3/index.php/Home/Index/sellStock">
          <i class="fa fa-share"></i> <span>卖出</span>
        </a>
      </li>
      <li>
        <a href="/stocktradingsystem-3/index.php/Home/Index/revoke">
          <i class="fa fa-dashboard"></i> <span>撤单</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-files-o"></i> <span>查询</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="/stocktradingsystem-3/index.php/Home/Index/showPersonalAccount"><i class="fa fa-circle-o"></i> 资金账户信息</a></li>
          <li><a href="/stocktradingsystem-3/index.php/Home/Index/showHoldInfo"><i class="fa fa-circle-o"></i> 持仓信息</a></li>
          <li><a href="/stocktradingsystem-3/index.php/Home/Index/showTodayDeal"><i class="fa fa-circle-o"></i> 当日成交</a></li>
          <li><a href="/stocktradingsystem-3/index.php/Home/Index/showTodayCommission"><i class="fa fa-circle-o"></i> 当日委托</a></li>
          <li><a href="/stocktradingsystem-3/index.php/Home/Index/showDeal"><i class="fa fa-circle-o"></i> 历史成交</a></li>
        </ul>
      </li>
    </ul>
  </section>

  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="/stocktradingsystem-3/Public/js/sidebar-menu.js"></script>
  <script>
    $.sidebarMenu($('.sidebar-menu'))
  </script>
   <div class="col-sm-8 col-xs-7">    
     <?php if(($export) > "0"): ?><table class=" table table-bordered">       
        <tr><th style="text-align: center;">资金账户号</th>
           <td style="text-align: center;vertical-align: middle"><?php echo ($personalAccount_info["bankrollid"]); ?></td>
        </tr>
        <tr><th style="text-align: center;">资金余额</th>
           <td style="text-align: center;vertical-align: middle"><?php echo ($personalAccount_info["bankroll"]); ?></td>
        </tr>
        <tr><th style="text-align: center;">可用资金</th>
           <td style="text-align: center;vertical-align: middle"><?php echo ($personalAccount_info["bankroll_usable"]); ?></td>
        </tr>
        <tr><th style="text-align: center;">冻结资金</th>
           <td style="text-align: center;vertical-align: middle"><?php echo ($personalAccount_info["bankroll_freezed"]); ?></td>
        </tr>
        <tr><th style="text-align: center;">总资产</th>
           <td style="text-align: center;vertical-align: middle"><?php echo ($personalAccount_info["total"]); ?></td>
        </tr>   
        <tr><th style="text-align: center;">股票总资产</th>
           <td style="text-align: center;vertical-align: middle"><?php echo ($personalAccount_info["total_stock"]); ?></td>
        </tr>          </table>
      <?php else: ?>暂时没有数据<?php endif; ?>
   </div>
 </div>
 </body>
 </html>