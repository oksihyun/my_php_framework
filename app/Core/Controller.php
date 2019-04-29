<?php

namespace App\Core;

class Controller
{
	protected function alert($msg)
	{
		echo "
			<script>
				window.alert('$msg');
			</script>
		";

		return $this;
	}

	protected function move($url)
	{
		echo "
			<script>
				location.replace('$url');
			</script>
		";

		exit;
	}

	protected function back()
	{
		echo "
			<script>
				history.back();
			</script>
		";

		exit;
	}
}