<?php
if ( $_REQUEST['type'])
	$_SESSION['FSA_type'] = $_REQUEST['type'];
else
	$_SESSION['_REQUEST_vars']['type'] = $_REQUEST['type'] = $_SESSION['FSA_type'];

if ( $_REQUEST['modfunc']!='save')
{
	//FJ remove DrawTab params
	$header .= '<a href="Modules.php?modname='.$_REQUEST['modname'].'&type=student"><b>'._('Students').'</b></a>';
	$header .= ' | <a href="Modules.php?modname='.$_REQUEST['modname'].'&type=staff"><b>'._('Users').'</b></a>';

	DrawHeader(($_REQUEST['type']=='staff' ? _('User') : _('Student')).' &minus; '.ProgramTitle());
	User('PROFILE')=='student'?'':DrawHeader($header);
}
require_once 'modules/Food_Service/'.($_REQUEST['type']=='staff' ? 'Users' : 'Students').'/Reminders.php';

function _makeChooseCheckbox($value,$title)
{
	global $THIS_RET;

	return '<input type="checkbox" name="st_arr[]" value="'.$value.'"'.($THIS_RET['WARNING']||$THIS_RET['NEGATIVE']||$THIS_RET['MINIMUM']?' checked />':'');
}

function x($value)
{
	if ( $value)
		return button('x');
	else
		return '&nbsp;';
}

function red($value)
{
	if ( $value<0)
		return '<span style="color:red">'.$value.'</span>';
	else
		return $value;
}
