@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Soses.NET Dashboard Tagihan by Stepheeen', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Total Tagihan') }}</h4>
                            <p class="card-category">{{ __('Tagihan bulan sekarang') }}</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="tagihanPieChart" class="ct-chart ct-perfect-fourth" width="200"
                                height="200"></canvas>
                            <div class="legend mt-3">
                                <i class="fa fa-circle text-success"></i> Bayar: {{ $paid }} &nbsp;&nbsp;
                                <i class="fa fa-circle text-danger"></i> Belum Bayar: {{ $unpaid }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Users Behavior') }}</h4>
                            <p class="card-category">{{ __('24 Hours performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartHours" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2017 Sales') }}</h4>
                            <p class="card-category">{{ __('All products including Taxes') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartActivity" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Tesla Model S') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('BMW 5 Series') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> {{ __('Data information certified') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Tasks') }}</h4>
                            <p class="card-category">{{ __('Backend development') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Sign contract for "What are conference organizers afraid of?"') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Lines From Great Russian Literature? Or E-mails From My Boss?') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Create 4 Invisible User Experiences you Never Knew About') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Read "Following makes Medium better"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            disabled>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Unfollow 5 enemies from twitter') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const paid = {{ $paid }};
        const unpaid = {{ $unpaid }};
        const total = paid + unpaid;

        const paidPercent = total > 0 ? ((paid / total) * 100).toFixed(1) : 0;

        const centerText = {
            id: 'centerText',
            afterDraw(chart) {
                const {
                    ctx,
                    width,
                    height
                } = chart;
                ctx.save();
                ctx.font = 'bold 20px Arial';
                ctx.fillStyle = '#333';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(paidPercent + '% Lunas', width / 2, height / 2);
            }
        };

        const ctx = document.getElementById('tagihanPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Lunas', 'Belum Lunas'],
                datasets: [{
                    data: [paid, unpaid],
                    backgroundColor: ['#28a745', '#dc3545'], // hijau & merah
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                let percentage = total > 0 ? ((value / total) * 100).toFixed(1) + "%" : "0%";
                                return context.label + ': ' + percentage;
                            }
                        }
                    },
                    legend: {
                        display: false // legend custom di bawah
                    }
                }
            },
            plugins: [centerText]
        });
    </script>
@endpush
