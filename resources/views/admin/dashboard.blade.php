@extends('index')

@section('title', $title)

@section('content')
  <!-- BEGIN PAGE CONTAINER -->
  <div class="page-container">
  	<!-- BEGIN PAGE HEAD -->
  	<div class="page-head">
  		<div class="container">
  			<!-- BEGIN PAGE TITLE -->
  			<div class="page-title">
  				<h1>Dashboard <small>statistics & reports</small></h1>
  			</div>
  			<!-- END PAGE TITLE -->
  		</div>
  	</div>
  	<!-- END PAGE HEAD -->
  	<!-- BEGIN PAGE CONTENT -->
  	<div class="page-content">
  		<div class="container">
  			<!-- BEGIN PAGE BREADCRUMB -->
  			<ul class="page-breadcrumb breadcrumb">
  				<li>
  					<a href="{{ url('/')}}">Home</a><i class="fa fa-circle"></i>
  				</li>
  				<li class="active">
  					 Dashboard
  				</li>
  			</ul>
  			<!-- END PAGE BREADCRUMB -->
  			<!-- BEGIN PAGE CONTENT INNER -->
  			<div class="row margin-top-10">

  				<div class="col-md-12 col-sm-12">
            <!-- BEGIN PORTLET-->
  					<div class="portlet light ">
  						<div class="portlet-title">
  							<div class="caption caption-md">
  								<i class="icon-bar-chart theme-font hide"></i>
  								<span class="caption-subject theme-font bold uppercase">Sales Summary</span>
  								<span class="caption-helper hide">weekly stats...</span>
  							</div>
  							<div class="actions">
  								<div class="btn-group btn-group-devided" data-toggle="buttons">
  									<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
  									<input type="radio" name="options" class="toggle" id="option1">Today</label>
  									<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
  									<input type="radio" name="options" class="toggle" id="option2">Week</label>
  									<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
  									<input type="radio" name="options" class="toggle" id="option2">Month</label>
  								</div>
  							</div>
  						</div>
  						<div class="portlet-body">
  							<div class="row list-separated">
  								<div class="col-md-3 col-sm-3 col-xs-6">
  									<div class="font-grey-mint font-sm">
  										 Total Sales
  									</div>
  									<div class="uppercase font-hg font-red-flamingo">
  										 13,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</div>
  								<div class="col-md-3 col-sm-3 col-xs-6">
  									<div class="font-grey-mint font-sm">
  										 Revenue
  									</div>
  									<div class="uppercase font-hg theme-font">
  										 4,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</div>
  								<div class="col-md-3 col-sm-3 col-xs-6">
  									<div class="font-grey-mint font-sm">
  										 Expenses
  									</div>
  									<div class="uppercase font-hg font-purple">
  										 11,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</div>
  								<div class="col-md-3 col-sm-3 col-xs-6">
  									<div class="font-grey-mint font-sm">
  										 Growth
  									</div>
  									<div class="uppercase font-hg font-blue-sharp">
  										 9,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</div>
  							</div>
  							<ul class="list-separated list-inline-xs hide">
  								<li>
  									<div class="font-grey-mint font-sm">
  										 Total Sales
  									</div>
  									<div class="uppercase font-hg font-red-flamingo">
  										 13,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</li>
  								<li>
  								</li>
  								<li class="border">
  									<div class="font-grey-mint font-sm">
  										 Revenue
  									</div>
  									<div class="uppercase font-hg theme-font">
  										 4,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</li>
  								<li class="divider">
  								</li>
  								<li>
  									<div class="font-grey-mint font-sm">
  										 Expenses
  									</div>
  									<div class="uppercase font-hg font-purple">
  										 11,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</li>
  								<li class="divider">
  								</li>
  								<li>
  									<div class="font-grey-mint font-sm">
  										 Growth
  									</div>
  									<div class="uppercase font-hg font-blue-sharp">
  										 9,760 <span class="font-lg font-grey-mint">$</span>
  									</div>
  								</li>
  							</ul>
  							<div id="sales_statistics" class="portlet-body-morris-fit morris-chart" style="height: 260px">
  							</div>
  						</div>
  					</div>
  					<!-- END PORTLET-->
  				</div>
  			</div>
  			<!-- END PAGE CONTENT INNER -->
  		</div>

  	</div>
  	<!-- END PAGE CONTENT -->
  </div>
  <!-- END PAGE CONTAINER -->
@endsection
