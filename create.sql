drop database if exists stocktrading;
create database stocktrading;
use stocktrading;

drop table if exists stock_user;
create table stock_user
(
	userid int not null auto_increment,
	username varchar(20),
	password varchar(20),
	email varchar(30),
	phone_number varchar(20),
	primary key (userid)
)DEFAULT CHARSET=utf8;

drop table if exists stock_stock;
create table stock_stock
(
	stockid varchar(8) not null,
	stockname varchar(20) not null,
	isRaise enum('0','1'),
	price double,
	totalStockNum int,
	primary key (stockid)
)DEFAULT CHARSET=utf8;

drop table if exists stock_personal_stock_account;
create table stock_personal_stock_account
(
	bankrollid int not null auto_increment,
	bankroll double, #资金余额
	bankroll_usable double, #可用资金
	bankroll_freezed double, #冻结资金
	bankroll_in_cash double, #可取资金
	total double, #总资产
	total_stock double, #股票总资产
	userid int,
	primary key (bankrollid),
	foreign key (userid) references stock_user(userid)
)DEFAULT CHARSET=utf8;

drop table if exists stock_stockholder;
create table stock_stockholder
(
	stockholderid int not null auto_increment,
	userid int,
	primary key (stockholderid),
	foreign key (userid) references stock_user(userid)
)DEFAULT CHARSET=utf8;

drop table if exists stock_hold_stock_info;
create table stock_hold_stock_info
(
	stockholderid int not null,
	stockid varchar(8) not null,
	amount_total int not null,
	amount_usable int not null,
	cost_price double,
	foreign key (stockholderid) references stock_stockholder(stockholderid),
	foreign key (stockid) references stock_stock(stockid)
)DEFAULT CHARSET=utf8;

drop table if exists stock_commission;
create table stock_commission
(	
	commissionid int not null auto_increment,
	stockid varchar(8) not null,
	commission_price double,
	direction enum('0','1'),	#0 买入 1 卖出
	commission_time int,
	commission_account int,
	stockholderid int,
	state enum('0','1','2'), #0 已撤销 1 已成交 2 已提交
	primary key (commissionid),
	foreign key (stockholderid) references stock_stockholder(stockholderid)
)DEFAULT CHARSET=utf8;

drop table if exists stock_deal;
create table stock_deal
(
	dealid int not null auto_increment,
	stockid varchar(8) not null,
	deal_price double,
	deal_time int,
	dealed_amount int, 
	dealed_value double, #成交金额
	in_commission int not null, #买方合同编号
	out_commission int not null, #卖方合同编号
	primary key (dealid),
	foreign key (in_commission) references stock_commission(commissionid),
	foreign key (out_commission) references stock_commission(commissionid)
)DEFAULT CHARSET=utf8;



