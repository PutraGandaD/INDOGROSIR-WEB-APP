@extends('layout.main')
@section('pagetitle', 'Dashboard')

@section('hoverdashboard','active')
@section('content')

<div class="container-fluid">
    {{-- Brand : {{count($brand)}} <br>
    Kontainer Barang : {{count($kontainerbarang)}} <br>
    Produk : {{count($produk)}} <br> --}}
    <div class="row">
        <div class="col-sm-5">
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <figure class="highcharts-figureone">
                <div id="container"></div>
            </figure>
        </div>
        <div class="col-sm-7 mt-3">
            <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

            <div class="card card-default">
              <div class="card-header">
                <h2>List Produk</h2>
              </div>
              <div class="card-body">
                <table id="example" class="table table-hover table-product table-paginate" style="width:100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nama Produk</th>
                      <th>Brand</th>
                      <th>Kontainer</th>
                      <th>Stok</th>
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produk as $item)
                        <tr>
                            <td class="py-0">
                                <img src="{{ $item->foto_produk ? asset('storage/' . $item->foto_produk) : asset('images/faces/face5.jpg') }}">
                            </td>
                            <td>{{$item -> nama_produk}}</td>
                            <td>{{$item -> brand -> nama_brand}}</td>
                            <td>{{$item -> kontainerbarang -> nama_kontainer}}</td>
                            <td>{{$item -> stok_produk}}</td>
                            <td>{{$item -> harga_produk}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .highcharts-figureone,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 660px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>

    <script>
        // Data retrieved from https://netmarketshare.com/
        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Jumlah Produk per Brand',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [
                {
                    name: 'Jumlah Produk',
                    colorByPoint: true,
                    data: [
                        @foreach ($produkbrand as $item)
                            {
                                name: '{{ $item->name }}',
                                y: {{ $item->jumlah }}
                            },
                        @endforeach
                    ]
                }
            ]
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#example ').DataTable({
                "lengthChange": false,
                "pageLength": 5
            });
        });
    </script>



@endsection
