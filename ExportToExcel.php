<?php

function ExportExcel($table)
	{

//		$filename = "uploads/".strtotime("now").'.csv';

		$sql = mysqli_query("SELECT n.newsletterformId,n.name,n.email,n.contactno,n.categoryId,n.interested,c.categoryId,c.categoryName from category c ,newsletterform n where c.categoryId = n.categoryId") or die(mysql_error());

		$num_rows = mysqli_num_rows($mysqli,$sql);
		if($num_rows >= 1)
		{
			$row = mysqli_fetch_assoc($mysqli,$sql);
			$fp = fopen($filename, "w");
			$seperator = "";
			$comma = "";

			foreach ($row as $name => $value)
				{
					$seperator .= $comma . '' .str_replace('', '""', $name);
					$comma = ",";
				}

			$seperator .= "\n";
			fputs($fp, $seperator);
	
			mysql_data_seek($sql, 0);
			while($row = mysqli_fetch_assoc($mysqli,$sql))
				{
					$seperator = "";
					$comma = "";

					foreach ($row as $name => $value) 
						{
							$seperator .= $comma . '' .str_replace('', '""', $value);
							$comma = ",";
						}

					$seperator .= "\n";
					fputs($fp, $seperator);
				}
	
			fclose($fp);
			echo "Your file is ready. You can download it from <a href='$filename'>here!</a>";
		}
		else
		{
			echo "There is no record in your Database";
		}


	}
?>