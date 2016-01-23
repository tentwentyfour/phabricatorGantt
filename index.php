<!DOCTYPE html>
<?php
include "functions.php";
$tasks = getTasks();
$users = getUsers();
?>
<html>
<head>
	<title>1024.lu - Gantt Diagram</title>
	<script src="codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
	<script src="codebase/ext/dhtmlxgantt_tooltip.js" type="text/javascript" charset="utf-8"></script>
	<script src="functions.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://export.dhtmlx.com/gantt/api.js"></script>
	<link href="codebase/dhtmlxgantt.css" rel="stylesheet">
	<style type="text/css" media="screen">
		html, body{
			margin:0px;
			padding:0px;
			height:100%;
			overflow:hidden;
		}
		.weekend{ background: #e1e7e9 !important;}
		.gantt_selected .weekend{
			background: #e1e7e9 !important;
		}
		.btn {
			background: #3498db;
			background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
			background-image: -moz-linear-gradient(top, #3498db, #2980b9);
			background-image: -ms-linear-gradient(top, #3498db, #2980b9);
			background-image: -o-linear-gradient(top, #3498db, #2980b9);
			background-image: linear-gradient(to bottom, #3498db, #2980b9);
			-webkit-border-radius: 5;
			-moz-border-radius: 5;
			border-radius: 5px;
			font-family: Arial;
			color: #ffffff;
			font-size: 15px;
			padding: 5px 10px 5px 10px;
			text-decoration: none;
		}

		.btn:hover {
			background: #3cb0fd;
			background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
			background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
			background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
			background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
			background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
			text-decoration: none;
		}
	</style>
	<script type="text/javascript" charset="utf-8">
		//gantt.config.grid_width = 500;
		gantt.templates.task_text = function(start,end,task) {
			return "<b>" + task.text + "</b>";
		};
		gantt.config.lightbox.sections = [
		        {name: "description", map_to: "description", type: "textarea", focus: true},
	        	{name: "time", type: "duration", map_to: "auto", time_format:["%d", "%m", "%Y", "%H:%i"]},
	    	];
		gantt.config.columns =  [
			{name:"text", label:"Task name", tree:true, width:'*'},
			{name:"start_date", label:"Start time", align: "center"},
			{name:"end_date", label:"End date", align: "center", width: "90px"}
		];
	</script>
</head>
<body>
	<div id="gantt_here" style='width:100%; height:95%'></div>
	<button type="button" class="btn" onclick='gantt.exportToPDF()' style='margin:10px;float: right'>Export to PDF</button>
	<button type="button" class="btn" onclick='gantt.exportToPNG()' style='margin:10px;float: right;'>Export to PNG</button>
	<script type="text/javascript" charset="utf-8">
		var users = userAdapter(<?php echo json_encode($users) ?>);
		var tasks = taskAdapter(<?php echo json_encode($tasks) ?>);

		gantt.config.subscales = [
			{ unit:"week", step:1, date:"Week N°%W"}
		];
		gantt.templates.scale_cell_class = function(date){
		    if(date.getDay()==0||date.getDay()==6){
		        return "weekend";
		    }
		};
		gantt.templates.task_cell_class = function(item,date){
		    if(date.getDay()==0||date.getDay()==6){
		        return "weekend" ;
		    }
		};

		//gantt.config.xml_date = "%d-%m-%Y %H:%i";
		gantt.init("gantt_here");
		gantt.parse(tasks);
		//gantt.load('data.php');

		//var dp=new gantt.dataProcessor("data.php");
		//dp.init(gantt);
	</script>
</body>
</html>
