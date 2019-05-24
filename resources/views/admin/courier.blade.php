@section('title', 'Admin Dashboard')
@extends('layouts.layout')
@section('content')
	<div class="row">
								<div class="col-xl-4 col-lg-4">
									<div class="card bg-gradient-primary border-0 overflow-hidden">
										<div class="">
											<div class="card-body">
												<img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
												<div class="media d-flex">
													<div class="media-body text-left">
														<h4 class="text-white">Total Expenses</h4>
														<h2 class="text-white mb-0">$88,568</h2>
													</div>
													<div class="align-self-center">
														<i class="fe fe-shopping-cart text-white font-large-2 float-right"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4">
									<div class="card bg-gradient-warning border-0 overflow-hidden">
										<div class="">
											<div class="card-body">
												<img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
												<div class="media d-flex">
													<div class="media-body text-left">
														<h4 class="text-white">Total Budget</h4>
														<h2 class="text-white mb-0">$5,28,568</h2>
													</div>
													<div class="align-self-center">
														<i class="fe fe-dollar-sign text-white font-large-2 float-right"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4">
									<div class="card bg-gradient-danger border-0 overflow-hidden">
										<div class="">
											<div class="card-body">
												<img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
												<div class="media d-flex">
													<div class="media-body text-left">
														<h4 class="text-white">Balance</h4>
														<h2 class="text-white mb-0">236</h2>
													</div>
													<div class="align-self-center">
														<i class="fe fe-credit-card success font-large-2 text-white float-right"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
	</div>
	<div class="row">
		<div class="col-xl-6">
			<div class="card  shadow">
				<div class="card-header bg-transparent">
					<div class="row align-items-center">
						<div class="col">
							<h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
							<h2 class="mb-0">Expense Trend</h2>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Chart -->
					<canvas id="Entertainment-chart" class="chart-dropshadow h-300"></canvas>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card  shadow">
				<div class="card-header bg-transparent">
					<div class="row align-items-center">
						<div class="col">
							<h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
							<h2 class="mb-0">Expenses Vs Budget</h2>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Chart -->
					<canvas id="Entertainment-chart2" class="chart-dropshadow h-300"></canvas>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card  shadow">
				<div class="card-header bg-transparent">
					<div class="row align-items-center">
						<div class="col">
							<h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
							<h2 class="mb-0">Each Person Expenses And Budget By year</h2>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Chart -->
					<canvas id="Entertainment-chart3" class="chart-dropshadow h-300"></canvas>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card  shadow">
				<div class="card-header bg-transparent">
					<div class="row align-items-center">
						<div class="col">
							<h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
							<h2 class="mb-0">All Expenses By Category</h2>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Chart -->
					<canvas id="entertainment-pieChart" class="chart-dropshadow h-300"></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header bg-transparent border-0">
					<h2 class=" mb-0">Expenses Vs Budget Table</h2>
				</div>
				<div class="">
					<div class="grid-margin">
						<div class="">
							<div class="table-responsive">
								<table class="table card-table table-vcenter text-nowrap align-items-center">
									<thead class="thead-dark">
										<tr>
											<th>Category</th>
											<th>Expenses</th>
											<th>Budget</th>
											<th>Variance</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-sm font-weight-600">Business Best Meals</td>
											<td>3,542</td>
											<td>5,000</td>
											<td>1,458</td>
										</tr>
										<tr>
											<td class="text-sm font-weight-600">Lodging</td>
											<td>56,368</td>
											<td>75,000</td>
											<td>18,632</td>
										</tr>
										<tr>
											<td class="text-sm font-weight-600">Meetings/Conferences</td>
											<td>0</td>
											<td>2,000</td>
											<td>2,000</td>
										</tr>
										<tr>
											<td class="text-sm font-weight-600">Association Fee</td>
											<td>0</td>
											<td>1,000</td>
											<td>1,000</td>
										</tr>
										<tr>
											<td class="text-sm font-weight-600">Personal Meals</td>
											<td>2,850</td>
											<td>5,000</td>
											<td>2,150</td>
										</tr>
										<tr>
											<td class="text-sm font-weight-600">Transportation</td>
											<td>25,000</td>
											<td>55,000</td>
											<td>30,000</td>
										</tr>
										<tr>
											<td class="text-sm font-weight-600">Vehicle Rental</td>
											<td>30,000</td>
											<td>45,000</td>
											<td>15,000</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop