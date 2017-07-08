<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Логин', $_POST['imObjectForm_3_1'], '', false);
	$form->setField('Вашь вопрос ', $_POST['imObjectForm_3_2'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'jsactive' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$db = getDbData('oc58576m');
		if (!$db)
			die("Cannot find db");
		if (!$form->saveToDb($db['host'], $db['user'], $db['password'], $db['database'], 'mir'))
			die("Unable to connect to db");
		$form->mailToOwner('9666@gmail.com', '9666@gmail.com', 'Уведомление от ' . $imSettings['general']['url'] . '', '', false);
		$form->mailToCustomer('9666@gmail.com', $_POST['imObjectForm_3_1'], '', '', true);
		@header('Location: ../index.php');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file