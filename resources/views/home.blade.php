@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-md-10" style="width: 100%;">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <main class="app-content">
                        
                        <div class="row">
                          <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class="icon fa fa-university fa-3x"></i>
                              <div class="info">
                                <h4>Total Assets</h4>
                                <p><b>{{$properties}}</b></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class="icon fa fa-home fa-3x"></i>
                              <div class="info">
                                <h4>Remaining Assets</h4>
                                <p><b>{{$remainingassets}}</b></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class="icon fa fa-usd fa-3x"></i>
                              <div class="info">
                                <h4>User has not paid</h4>
                                <p><b>{{$notpaid}}</b></p>
                              </div>
                            </div>
                          </div><div class="col-md-6 col-lg-3">
                            <div class="widget-small danger coloured-icon"><i class="icon fa fa-money fa-3x"></i>
                              <div class="info">
                                <h4> Total Price</h4>
                                <p><b>{{ number_format($totalPrice, 0, ',', '.') }} $</b></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-3">
                            <div class="widget-small info coloured-icon"><i class="icon fa  fa-users fa-3x"></i>
                              <div class="info">
                                <h4>Total Tenant</h4>
                                <p><b>{{$tenants}}</b></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-3">
                            <div class="widget-small warning coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
                              <div class="info">
                                <h4>Total Documents</h4>
                                <p><b>{{$documents}}</b></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-3">
                            <div class="widget-small danger coloured-icon"><i class="icon fa fa-sticky-note-o fa-3x"></i>
                              <div class="info">
                                <h4> Total Notes</h4>
                                <p><b>{{$notes}}</b></p>
                              </div>
                            </div>
                          </div><div class="col-md-6 col-lg-3">
                            <div class="widget-small danger coloured-icon"><i class="icon fa fa-sticky-note-o fa-3x"></i>
                              <div class="info">
                                <h4> Total Notes</h4>
                                <p><b>{{$notes}}</b></p>
                              </div>
                            </div>
                          </div>
                          <div class="table-container">
                            <h2>Line Chart Data Analysis</h2>
                            <table>
                              <thead>
                                <tr>
                                  <th>Month</th>
                                  <th>Data</th>
                                  <th>Rent Amount</th>
                                  <th>Number of Rented Accommodations</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>January</td>
                                  <td>100</td>
                                  <td>$1000</td>
                                  <td>10</td>
                                </tr>
                                <tr>
                                  <td>February</td>
                                  <td>200</td>
                                  <td>$2000</td>
                                  <td>15</td>
                                </tr>
                                <tr>
                                  <td>March</td>
                                  <td>300</td>
                                  <td>$3000</td>
                                  <td>20</td>
                                </tr>
                                <tr>
                                  <td>April</td>
                                  <td>400</td>
                                  <td>$4000</td>
                                  <td>25</td>
                                </tr>
                                <tr>
                                  <td>May</td>
                                  <td>500</td>
                                  <td>$5000</td>
                                  <td>30</td>
                                </tr>
                                <tr>
                                  <td>June</td>
                                  <td>600</td>
                                  <td>$6000</td>
                                  <td>35</td>
                                </tr>
                                <tr>
                                  <td>July</td>
                                  <td>700</td>
                                  <td>$7000</td>
                                  <td>40</td>
                                </tr>
                                <tr>
                                  <td>August</td>
                                  <td>800</td>
                                  <td>$8000</td>
                                  <td>45</td>
                                </tr>
                                <tr>
                                  <td>September</td>
                                  <td>900</td>
                                  <td>$9000</td>
                                  <td>50</td>
                                </tr>
                                <tr>
                                  <td>October</td>
                                  <td>1000</td>
                                  <td>$10000</td>
                                  <td>55</td>
                                </tr>
                                <tr>
                                  <td>November</td>
                                  <td>1100</td>
                                  <td>$11000</td>
                                  <td>60</td>
                                </tr>
                                <tr>
                                  <td>December</td>
                                  <td>1200</td>
                                  <td>$12000</td>
                                  <td>65</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
<style>.table-container {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

h2 {
  font-size: 24px;
  margin-bottom: 30px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

tbody tr:hover {
  background-color: #f5f5f5;
}

/* Animation
</style>                          

                        </div>
                      </main>
                </div>
            </div>
        </div>
    </div>
@endsection
