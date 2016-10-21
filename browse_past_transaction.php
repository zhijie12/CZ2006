<?php include("header.php") ?>
<style type="text/css">
	th:after{
		display:none !important;
	}
</style>
<script type="text/javascript">
var table;
var url;
var records;
$(document).ready(function() {
	$.ajax({
		url: "controllers/PastResaleFlat/PastTransController.php?action=getSelectOptions",
	}).done(function(result) {
		var options = JSON.parse(result);
		console.log(options);
		for(var i=0;i<options.Month.length;i++){
			$("select[name='month']").append("<option value='"+options.Month[i]+"'>"+options.Month[i]+"</option>");
		}
		for(var i=0;i<options.FlatType.length;i++){
			$("select[name='flatType']").append("<option value='"+options.FlatType[i]+"'>"+options.FlatType[i]+"</option>");
		}
		for(var i=0;i<options.Town.length;i++){
			$("select[name='town']").append("<option value='"+options.Town[i]+"'>"+options.Town[i]+"</option>");
		}
	});
	var action = $("input[name='action']").val();
	url = "controllers/PastResaleFlat/PastTransController.php?"+"action="+action+"&town=&flatType=&month=";
	table = $("#resultTable").DataTable({
		"ajax": url,
	});
});
function validate(){
	return true;
}
function search(){
	if(validate()){
		var action = $("input[name='action']").val();
		var town = $("select[name='town']").val();
		var flatType =  $("select[name='flatType']").val();
		var month =  $("select[name='month']").val();
		url = "controllers/PastResaleFlat/PastTransController.php?"+"action="+action+"&town="+town+"&flatType="+flatType+"&month="+month+"";
		table.ajax.url(url).load(function(result){
			var rows = result.data;
			console.log(rows);
			for(var i=0;i<rows.length;i++){
				table.row.add(rows[i]).draw();
			}
		});
		$.ajax({
			url: "controllers/PastResaleFlat/PastTransController.php",
			data: "action="+action+"&town="+town+"&flatType="+flatType+"&month="+month+""
		}).done(function(result) {
			records = JSON.parse(result);
			var rows = records.data;
			table.clear().draw();
			table.rows.add(rows).draw();
		});
	}
}
</script>
</head>

<body class="flat-blue">
<?php include("menu.php") ?>

<div class="container-fluid">
	<div class="side-body">
		<div class="page-title">
			<span class="title">Dashboard</span>
			<div class="description">A ui elements use in form, input, select, etc.</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title">Past Transaction Trends</div>
							<div class="description">select the options you want select.</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<!-- <form method="GET" action="controllers/PastResaleFlat/PastTransController.php"> -->
								<div class="col-sm-2">
									<label for="month">Month:</label>
									<select name="month" style="width:200px" >
										<option value="all">all</option>
									</select>
								</div>
								<div class="col-sm-2">
									<label for="town">Town:</label>
									<select name="town" style="width:200px" >
										<option value="all">all</option>
									</select>
								</div>
								<div class="col-sm-2">
									<label for="flatType">flat type:</label>
									<select name="flatType" style="width:200px" >
										<option value="all">all</option>
									</select>
									
								</div>
								<div class="col-sm-2">
									<input type="button" class="btn btn-default" onclick="search()" value="Search">
								</div>
								<input type="hidden" name="action" value="search">
							<!-- </form> -->
						</div>
						<div class="row">
							<div class="col-xs-8">
								<table id="resultTable" class="display">
									<thead>
										<tr>
											<th>Month</th>
											<th>Town</th>
											<th>Street Name</th>
											<th>Block</th>
											<th>Flat Model</th>
											<th>Flat Type</th>
											<th>Floor Area</th>
											<th>Storey Range</th>
											<th>Lease Commence Date</th>
											<th>Resale Price</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Month</th>
											<th>Town</th>
											<th>Street Name</th>
											<th>Block</th>
											<th>Flat Model</th>
											<th>Flat Type</th>
											<th>Floor Area</th>
											<th>Storey Range</th>
											<th>Lease Commence Date</th>
											<th>Resale Price</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="card-header">
								<div class="card-title">
									<div class="title">Statistics</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>             
<?php include("footer.php") ?>