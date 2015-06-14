<?php 
/*
var_dump($x) will show value and its type

Arrays
	$cars=array("Volvo","BMW","Toyota");	echo $cars[0];
	$cars[0]="Volvo"; $cars[1]="BMW";
	$x = array("a" => "red", "b" => "green"); 	echo $x['a'];	
	$a[]=1; $a[]=3; $a[]=5;
	
	Cover multidimensional Arrays

	echo count($cars);

Arrays FOREACH
	$colors = array("red","green","blue","yellow"); 
	
	foreach ($colors as $value) {
	  echo "$value <br>";
	}
	
	$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
	
	foreach($age as $x=>$x_value) {
	  echo "Key=" . $x . ", Value=" . $x_value;
	  echo "<br>";
	}

Arrays Sort
	sort() - sort arrays in ascending order
	rsort() - sort arrays in descending order
	asort() - sort associative arrays in ascending order, according to the value
	ksort() - sort associative arrays in ascending order, according to the key
	arsort() - sort associative arrays in descending order, according to the value
	krsort() - sort associative arrays in descending order, according to the key

	Ex. 
	$numbers=array(4,6,2,22,11);
	sort($numbers);

Strings
	

	$a = "Hello"; $b = $a . " world!"; 
	echo $b; // outputs Hello world! 
	
	$arr= explode(" ","Hello, my name"); echo $arr[0];	//Hello,
	
	$ar[]="Hi,";$ar[]="my";$ar[]="name"; 
	echo implode(" ",$ar);	//Hi, my name	You can also use join()
	
	echo lcfirst("Alan"); //alan
	
	echo ltrim("hi alan","hi");  //alan  Removes white spaces or other characters from the left.  Also rtrim() and trim()
	
	echo number_format("1000000")."<br>";		//1,000,000
	echo number_format("1000000",2)."<br>";		//1,000,000.00
	echo number_format("1000000",2,",",".");	//1.000.000,00

	$number = 9; $str = "Beijing";
	printf("There are %u million bicycles in %s.",$number,$str); //There are 9 million bicycles in Beijing.

	echo str_ireplace("WORLD","Peter","Hello world!");	//Hello Peter!
	
	$str = "5239";
	echo str_pad(5239,7,"0",STR_PAD_LEFT);	//0005239
	echo str_pad(5239,7,"0",STR_PAD_RIGHT);	//5239000	
	echo str_pad(5239,8,"0",STR_PAD_BOTH);	//00523900	if you put 7 instead of 8, then right side gets extra padding 0523900
	
	echo str_repeat("A",13);	//AAAAAAAAAAAAA
	
	echo str_shuffle("Hello World");	//ldroWl eHol
	
	$b= str_split("Hello",3);
	echo $b[0];	//Hel
	
	echo str_word_count("Hello world!");	//2
	
	echo strlen("Hello world!"); //12
	
	echo stripos("Hello world!","world"); //6
	
	echo strip_tags("Hello <b>world!</b>");	//Hello world!
	
	echo strrev("Hello World!");	//!dlroW olleH
	
	echo strspn("Hello world!","kHlleoz");	//5
	
	echo strtolower("Hello WORLD.");	//hello world.
	
	echo strtoupper("Hello WORLD!");	//HELLO WORLD!
			
	echo substr("Hello world",2);	//llo world
	echo substr("Hello world",2,6);	//llo wo
	
	echo substr_count("Hello world. The world is nice","world");	//2
	
	echo substr_replace("Hello","world",0);	//world
	echo substr_replace("Hello","world",2);	//Heworld
	echo substr_replace("Hello","world",1,3);	//Hworldo
	
	echo ucfirst("hello world!");	//Hello world!
	
	echo ucwords("hello world");	//Hello World
	
	
SWITCH
	$favcolor="red";
	
	switch ($favcolor) {
	  case "red":
	    echo "Your favorite color is red!";
	    break;
	  case "blue":
	    echo "Your favorite color is blue!";
	    break; 
	  default:
	    echo "Your favorite color is neither red, blue, or green!";
		}




FILE HANDLING
	
	OPENING A FILE AND READING
		if(!file_exists("welcome.txt")) 
		{
		  die("File not found");
		} 
		else {  $file=fopen("welcome.txt","r"); 	}
		
		or you can do
		$fh = fopen($LogFile, 'a') or die ('no');	//a = append end of file or create new file
		
		fclose($file);
	
	READ FILE LINE BY LINE
		$file = fopen("welcome.txt", "r") or exit("Unable to open file!");
		
		while(!feof($file)) {
		  echo fgets($file). "<br>";
		}
		fclose($file);
	
	WRITE FILE
		fwrite($file, "hello");	//remember to close file
	

FILE UPLOAD




*/

?>


<?php 
$a="  Alan ";


echo ucwords("hello world");	//Hello World


?>










