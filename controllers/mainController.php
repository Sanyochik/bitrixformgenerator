<?php
//made by Alexandr
//19.12.2025
require('../models/leads.php');

if($_GET['siteurl']=="newlead"){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$comment = $_POST['comment'];
	$Newlead=Leads::NewLead($name,$email,$phone,$comment);
}