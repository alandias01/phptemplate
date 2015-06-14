<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
   		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
  		
  		<script src="http://ajax.microsoft.com/ajax/jquery.cycle/2.99/jquery.cycle.all.min.js" type="text/javascript"></script>

  		
  		
		<!--  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />  -->
		
		<!--Wijmo Theme  -->
	    <link href="http://cdn.wijmo.com/themes/metro/jquery-wijmo.css" rel="stylesheet" type="text/css" title="rocket-jqueryui" />
	
	    <!--Wijmo Widgets CSS -->
	    <link href="http://cdn.wijmo.com/jquery.wijmo-complete.all.2.1.0.min.css" rel="stylesheet" type="text/css" /> 
	
	    <!--Wijmo Widgets JavaScript-->
	    <!-- --> <script src="http://cdn.wijmo.com/jquery.wijmo-open.all.2.1.0.min.js" type="text/javascript"></script> 
	    <script src="http://cdn.wijmo.com/jquery.wijmo-complete.all.2.1.0.min.js" type="text/javascript"></script>


<script type="text/javascript">
	$(function() {
	
		$("#d1").click(function() {
			$("#d2").slideToggle();
		});
		
		$("#datepicker").datepicker();
	
		$("#eventscalendar").wijevcal();
	});
</script>

<div class="container"> 
    
    <div class="main demo"> 
        <!-- Begin demo markup -->
           <div id="eventscalendar"></div> 
        <!-- End demo markup -->
        <div class="demo-options"> 
            <!-- Begin options markup -->
            <!-- End options markup -->
        </div> 
    </div> 
     
</div>

<div id="d1">click</div>

<div id="d2">HELLO</div>

<p>Date: <input type="text" id="datepicker" /></p>
