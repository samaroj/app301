create database shopping;
use shopping;

CREATE TABLE IF NOT EXISTS `tbl_items_list` (
  `itl_id` int(11) NOT NULL AUTO_INCREMENT,
  `itl_items` varchar(255) NOT NULL,
  `itl_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `tbl_items_list` (`itl_items`, `itl_status`) VALUES
('Watch ', '0'),('Rice 2kgs ', '1'),('Jeans 2 pcs ', '0'), ('Tshirt 2 units', '1');
