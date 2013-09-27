<?php
	require_once("constants.php");
	require_once("db_connection_close.php");
	require_once("queries.php");


	function getChapters()
	{
		include("db_connection.php");
		$getChapterQuery = getChapterQuery();

		$chapters = array();
		$result = mysqli_query($dbConnect, $getChapterQuery);
		if($result->num_rows != 0)
		{
			$index=0;
			while($rows = mysqli_fetch_array($result))
			{
				$chapters[$rows[chapterID]] =  $rows[chapterName];
				$index++;
			}
			//echo "Inside the while loop";
			//var_dump($chapters);
		}

		//var_dump($chapters);
		return $chapters;

	}
?>