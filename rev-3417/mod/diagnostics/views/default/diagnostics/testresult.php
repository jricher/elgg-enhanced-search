<?php
	/**
	 * Elgg diagnostics - test report
	 * 
	 * @package ElggDiagnostics
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	$result = $vars['result'];
	
	$testresult_div = 'fail';
	$successmessage = "";
	
	if (!($result instanceof ElggTestResult))
	{
		$successmessage = elgg_echo('diagnostics:unittester:testresult:nottestclass');
		$result = ElggTestResult::CreateFailResult(elgg_echo('diagnostics:unittester:testresult:fail'));
	}
	else
	{
		if ($result->isSuccess())
			$successmessage = elgg_echo('diagnostics:unittester:testresult:success');
		else
			$successmessage = elgg_echo('diagnostics:unittester:testresult:fail');
	}
?>
<div class="testreport">
	<div class="testreport_<?php echo $testresult_div; ?>">
		<div class="testreport_header">
			<p><b><?php echo $vars['function']; ?> : </b><?php echo $successmessage; ?></p>
		</div>
		<div class="testreport_details">
			<?php echo $result->getDetails(); ?>
		</div>
		<div class="testreport_debug">
			<?php echo $result->getDebug(); ?>
		</div>
	</div>
</div>