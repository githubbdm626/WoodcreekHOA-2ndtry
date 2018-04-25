<?php

function gallery($folder) {
	$count=0;
	if ($handle = opendir("photos/$folder")) {
		while (false !== ($file = readdir($handle))) {
		    if (substr($file, 0,3) == "tn_") {
			echo "<a href='photos/$folder/".substr($file,3)."'><img src='photos/$folder/$file' border=0 class='thumbnail' style='float:".($count%2==0 ? 'left' : 'right')."'></a>\n";

			if ($count%2==1) { echo "<BR>"; }
			$count++;
		    }
		}
		closedir($handle);
	}
}

?>



<h1>Photos</h1>
Click on a photo for a larger image.<br><br>


<h2>February 2010</h2>
<div style="width:480">
<?php gallery("2010snow") ?>
</div>

<br clear="all">
<h2>August 2009</h2>
<div style="width:480">
<?php

gallery("2009sunnyDay")

?>
</div>
