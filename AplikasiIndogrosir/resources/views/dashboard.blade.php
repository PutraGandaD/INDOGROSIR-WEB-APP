@extends('layout.main')
@section('pagetitle', 'Dashboard')

@section('hoverdashboard','active')
@section('content')

<div class="container-fluid">
    {{-- BANNER SECTION --}}
    <div class="row pt-3">
        <div class="col-sm">
            <div class="card mb-1">

                <img class="card-img-top" src="assets/img/hero-bg.jpg" height="300" alt="Card image cap">
                <div class="card-body">
                  <h1 class="card-title text-primary fw-bold">INDOGROSIR PALEMBANG</h1>
                  <p class="card-text">Indogrosir adalah toko retail yang tersebar di kota-kota besar di Indonesia, yang menyediakan barang dagangan untuk para UMKM atau Pedagang eceran seperti warung, toko kelontong, minimarket (retail) dan juga menyediakan barang untuk kebutuhan sehari-hari bagi semua masyarakat umum (End user).
                  </p>
                  <p class="card-text text-end"><small class="text-muted">support kami www.indogrosir.co.id</small></p>
                </div>
              </div>
        </div>
    </div>
    {{-- END BANNER --}}

    {{-- CHART SECTION --}}
    <div class="row">
        <div class="col-sm-6">
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <figure class="highcharts-figureone">
                <div id="container"></div>
            </figure>


        </div>
        <div class="col-sm-6">
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="containerr"></div>

            </figure>
        </div>



    </div>
    {{-- END CHART SECTION --}}

    {{-- TABLE SECTION --}}
    <div class="row">
        <div class="col-sm mt-3">
            <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

            <div class="card card-default">
              <div class="card-header">
                <h2 class="text-primary">PRODUK KAMI</h2>
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
        /* pegawai */

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #containerr {
            height: 400px;
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

        // pegawai
        Highcharts.chart('containerr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik Pegawai Indogrosir'
    },
    subtitle: {
        text: 'Total Pegawai : {{count($pegawai)}}'
    },
    xAxis: {
        categories: [
            @foreach ($pegawaidivisi as $item)
                '{{$item->nama_divisi}}',
            @endforeach
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Data (pegawai)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'JUMLAH PEGAWAI / divisi',
        data: [
            @foreach ($pegawaidivisi as $item)
                {{$item -> jumlah}},
            @endforeach
        ]
    }]
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
