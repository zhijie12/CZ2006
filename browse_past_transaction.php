<?php include("header.php") ?>
<style type="text/css">
	th:after{
		display:none !important;
	}
	.hideme{
		display:none !important;
	}
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
var table;
var url;
var records;
$(document).ready(function() {
	$.ajax({
		url: "controllers/PastResaleFlat/PastTransController.php?action=getSelectOptions",
	}).done(function(result) {
		var options = JSON.parse(result);
		var i;
		for(i=0;i<options.Month.length;i++){
			$("select[name='monthfrom']").append("<option value='"+options.Month[i]+"'>"+options.Month[i]+"</option>");
			$("select[name='monthto']").append("<option value='"+options.Month[i]+"'>"+options.Month[i]+"</option>");
		}
		$("select[name='monthfrom']").trigger("change");
		for(var i=0;i<options.FlatType.length;i++){
			$("select[name='flatType']").append("<option value='"+options.FlatType[i]+"'>"+options.FlatType[i]+"</option>");
		}
		for(var i=0;i<options.Town.length;i++){
			$("select[name='town']").append("<option value='"+options.Town[i]+"'>"+options.Town[i]+"</option>");
		}
		for(var i=0;i<options.FlatModel.length;i++){
			$("select[name='flatModel']").append("<option value='"+options.FlatModel[i]+"'>"+options.FlatModel[i]+"</option>");
		}
	});
	var action = $("input[name='action']").val();
	url = "controllers/PastResaleFlat/PastTransController.php?"+"action="+action+"&town=&flatType=&monthfrom=%monthto";
	table = $("#resultTable").DataTable({
		"ajax": url,
	});
	$("select[name='monthfrom']").on("change",function(){
		var value = this.value;
		if(value=="all"){
			$("select[name='monthto']").prop("disabled", true);
			$("select[name='monthto']").val("all").trigger("change");
		}else{
			$("select[name='monthto']").prop("disabled", false);
		}
	});
});
function validate(){
	var monthfrom =  $("select[name='monthfrom']").val();
	var monthto =  $("select[name='monthto']").val();
	console.log(monthto);
	console.log(monthfrom>monthto);
	if(monthto!="all"&&monthfrom>monthto){
		alert("Month: from should not be after to");
		return false;
	}else if($("input[name='LeaseCommenceYear']").val()!=""&&$("input[name='LeaseCommenceYear']").val()<=0){
		alert("enter positive numbers for lease commence year");
		return false;
	}else if($("input[name='price']").val()!=""&&$("input[name='price']").val()<=0){
		alert("enter positive numbers for price");
		return false;
	}
	return true;
}
function search(){
	if(validate()){
		var action = $("input[name='action']").val();
		var town = $("select[name='town']").val();
		var flatType =  $("select[name='flatType']").val();
		var monthfrom =  $("select[name='monthfrom']").val();
		var monthto =  $("select[name='monthto']").val();
		
		var LeaseCommenceYear = $("input[name='LeaseCommenceYear']").val();
		var flatModel = $("select[name='flatModel']").val();
		var price = $("input[name='price']").val();
		url = "controllers/PastResaleFlat/PastTransController.php?"+"action="+action+"&town="+town+"&flatType="+flatType+"&monthfrom="+monthfrom+"&monthto="+monthto+
				"&LeaseCommenceYear="+LeaseCommenceYear+"&flatModel="+flatModel+"&price="+price+"";
		$.ajax({
			url:url
		}).done(function(result) {
			records = JSON.parse(result);
			var rows = records.data;
			table.clear().draw();
			table.rows.add(rows).draw();
			createStatistics();
		});
	}
}
function createStatistics(){
	console.log(records);
	
	var statistics  = records.statistics;
	var column = new Array();//['2014-01', '2014-02'];
	var data = new Array();//[107, 31, 635, 203, 2];
	for(var i=0;i<statistics.length;i++){
		column.push(statistics[i][0]);
		data.push(parseInt(statistics[i][1]));
	}
	console.log(column);
	console.log(data);
	$('#statistics').highcharts({
        chart: {type: 'bar'},
        title: {text: 'Mean Resale Price'},
        xAxis: {categories: column,title: {text: "month"}},
        yAxis: {min: 0,
				title: {text: 'Mean Resale Price(S$)',align: 'high'},
				labels: {overflow: 'justify'}
        },
        plotOptions: {bar: {dataLabels: {enabled: false}}},
        legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {enabled: false},
        series: [{data: data}]
    });
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
							<div class="col-sm-3">
								<div class="sub-title">Month </div>
								<div>
									<select class="month" name="monthfrom" style="width:47%" >
										<option value="all">all</option>
									</select> to 
									<select class="month" name="monthto" style="width:47%" >
										<option value="all">all</option>
									</select>
								</div>
								<div class="sub-title">Town </div>
								<div>
									<select name="town" style="width:100%" >
										<option value="all">all</option>
									</select>
								</div>
								<div class="sub-title">Flat Type </div>
								<div>
									<select name="flatType" style="width:100%" >
										<option value="all">all</option>
									</select>
								</div>
								<div class="sub-title">Lease Commence Year </div>
								<div>
									<input class="form-control" placeholder="Stated year and later" type="number" name="LeaseCommenceYear">
								</div>
								<div class="sub-title">Flat Model </div>
								<div>
									<select name="flatModel" style="width:100%" >
										<option value="all">all</option>
									</select>
								</div>
								<div class="sub-title">Price </div>
								<div>
									<input class="form-control" placeholder="Stated price and below" type="number" name="price">
								</div>
								<div style="float:right">
									<input type="button" class="btn btn-default" onclick="search()" value="Search">
									<input type="hidden" name="action" value="search">
								</div>
								<div style="clear:both"></div>
								
							</div>
							<div class="col-sm-8">
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
							<div class="col-xs-8">
								
							</div>
						</div>
						<div class="row">
							<div class="card-header">
								<div class="card-title">
									<div class="title">Statistics</div>
								</div>
							</div>
							<div class="card-body">
								<div id="statistics">
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