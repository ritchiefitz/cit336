<?php include("modules/header.php"); ?>

<article>
	<h1 class="page-title">Presentation</h1>
	<h2>Foreach Loops</h2>
	<h3>Ritchie Fitzgerald</h3>
	<div class="slides">
		<div class="slide">
			<div class="title">In the Beginning</div>
			<ul>
				<li>You had to know the size</li>
				<li>You had to have a counter</li>
			</ul>
			<h3>Example</h3>
			<?php

			echo '$numbers = array(1,2,3,4); <br>';

			echo 'for ($i=0; $i < count($numbers); $i++) {  <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$numbers[$i]"; <br>';
			echo '} <br>';

			?>
			<h3>Result</h3>
			<?php

			$numbers = array(1,2,3,4);

			for ($i=0; $i < count($numbers); $i++) { 
				echo "$numbers[$i]<br>";
			}

			?>
		</div>
		<div class="slide">
			<div class="title">Foreach Loop</div>
			<ul>
				<li>You don't have to know the size</li>
				<li>You don't have to have a counter</li>
			</ul>
			<h3>Example</h3>
			<?php

			echo '$numbers = array(1,2,3,4); <br>';

			echo 'foreach ($numbers as $number) {  <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$number"; <br>';
			echo '} <br>';

			?>
			<h3>Result</h3>
			<?php
			
			$numbers = array(1,2,3,4);

			foreach ($numbers as $number) {
				echo "$number<br>";
			}

			?>
		</div>
		<div class="slide">
			<div class="title">Keys &amp; Values</div>
			<ul>
				<li>The foreach loop makes it easy to get the key associated with the value</li>
				<li>Extremely useful and necessary in some cases</li>
			</ul>
			<h3>Example</h3>
			<?php

			echo '$numbers = array("one" => 1, "two" => 2, "three" => 3); <br>';

			echo 'foreach ($numbers as $key => $value) {  <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$key: $value"; <br>';
			echo '} <br>';

			?>
			<h3>Result</h3>
			<?php
			
			$numbers = array("one" => 1, "two" => 2, "three" => 3);

			foreach ($numbers as $key => $value) { 
				echo "$key: $value<br>";
			}

			?>
		</div>
		<div class="slide">
			<div class="title">Pass by Value VS Pass by Reference</div>
			<ul>
				<li>The variable $value is passed by value rather than by reference</li>
				<li>The following code doesn't work as expected</li>
			</ul>
			<h3>Example</h3>
			<?php

			echo '$numbers = array("one" => 1, "two" => 2, "three" => 3); <br>';

			echo 'foreach ($numbers as $key => $value) {  <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$key: $value"; <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;$value *= 2; <br>';
			echo '} <br>';

			echo 'foreach ($numbers as $key => $value) { <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$key: $value"; <br>';
			echo '} <br>';


			?>
			<h3>Result</h3>
			<?php

			$numbers = array("one" => 1, "two" => 2, "three" => 3);

			foreach ($numbers as $key => $value) { 
				echo "$key: $value<br>";
				$value *= 2;
			}

			foreach ($numbers as $key => $value) {
				echo "$key: $value<br>";
			}

			?>
		</div>
		<div class="slide">
			<div class="title">Pass by Value VS Pass by Reference cont..</div>
			<ul>
				<li>So to get the value by reference we include the &amp; sign in front of $value in the foreach statement</li>
				<li>We still do not acheive the desired result because the variable $value is referencing the wrong position in the second loop</li>
			</ul>
			<h3>Example</h3>
			<?php

			echo '$numbers = array("one" => 1, "two" => 2, "three" => 3); <br>';

			echo 'foreach ($numbers as $key => <b>&</b>$value) {  <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$key: $value"; <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;$value *= 2; <br>';
			echo '} <br>';

			echo 'foreach ($numbers as $key => $value) { <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$key: $value"; <br>';
			echo '} <br>';


			?>
			<h3>Result</h3>
			<?php

			$numbers = array("one" => 1, "two" => 2, "three" => 3);

			foreach ($numbers as $key => &$value) { 
				echo "$key: $value<br>";
				$value *= 2;
			}

			foreach ($numbers as $key => $value) {
				echo "$key: $value<br>";
			}

			unset($value);

			?>
		</div>
		<div class="slide">
			<div class="title">Pass by Value VS Pass by Reference cont..</div>
			<ul>
				<li>To acheive the expected result we need to unset $value after the foreach statement</li>
				<li>Now $value in the second foreach statement will go back to the default settings</li>
			</ul>
			<h3>Example</h3>
			<?php

			echo '$numbers = array("one" => 1, "two" => 2, "three" => 3); <br>';

			echo 'foreach ($numbers as $key => <b>&</b>$value) {  <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$key: $value"; <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;$value *= 2; <br>';
			echo '} <br>';
			echo ' <br>';
			echo '<b>unset($value);</b> <br>';
			echo ' <br>';
			echo 'foreach ($numbers as $key => $value) { <br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;echo "$key: $value"; <br>';
			echo '} <br>';


			?>
			<h3>Result</h3>
			<?php

			$numbers = array("one" => 1, "two" => 2, "three" => 3);

			foreach ($numbers as $key => &$value) { 
				echo "$key: $value<br>";
				$value *= 2;
			}

			unset($value);

			foreach ($numbers as $key => $value) {
				echo "$key: $value<br>";
			}

			?>
		</div>
	</div>
</article>

<?php include("modules/footer.php"); ?>