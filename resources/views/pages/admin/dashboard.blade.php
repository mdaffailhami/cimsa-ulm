<x-layout.master>
    @section('title', 'Dashboard')


    <h1 class="h3 mb-3"><strong>Admin Dashboard</h1>

    {{-- First Row --}}
    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Perubahan Artikel</h5>

                    <a class="text-muted text-end d-block" href="{{ route('article.index') }}">
                        see more...<i class="align-middle" data-feather="arrow-right"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Judul</th>
                                <th class="bg-primary text-white" style="width: 200px">Penulis</th>
                                <th class="bg-primary text-white" style="width: 200px">Editor</th>
                                <th class="bg-primary text-white" style="width: 150px">Tanggal</th>
                                {{-- <th class="" style="width: 50px">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    <td class="">{{ $article->author->full_name }}</td>
                                    <td>{{ $article->editor->full_name }}</td>
                                    <td>
                                        {{ $timeStamp = date('d M Y', strtotime($article->updated_at)) }}
                                    </td>
                                    {{-- <td>
                                    <div class="d-flex justify-content-evenly">
                                        <div data-bs-toggle="tooltip" title="Ubah artikel">
                                            <a class="btn btn-warning text-dark"
                                                href="{{ route('article.edit', ['article' => $article->slug]) }}">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Kalender</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="chart">
                            <div id="datetimepicker-dashboard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Second Row --}}
    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        {{-- Artikel --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Artikel</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="file-text"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $card_statistic['article'] }}</h1>
                                <div class="mb-0">
                                    <a class="text-muted text-end d-block" href="{{ route('article.index') }}">
                                        see more...<i class="align-middle" data-feather="arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Komite --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Komite</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="clipboard"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $card_statistic['committe'] }}</h1>
                                <div class="mb-0">
                                    <a class="text-muted text-end d-block" href="{{ route('committe.index') }}">
                                        see more...<i class="align-middle" data-feather="arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Pelatihan</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="book-open"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $card_statistic['training'] }}</h1>
                                <div class="mb-0">
                                    <a class="text-muted text-end d-block" href="{{ route('training.index') }}">
                                        see more...<i class="align-middle" data-feather="arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Angkatan</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $card_statistic['official'] }}</h1>
                                <div class="mb-0">
                                    <a class="text-muted text-end d-block" href="{{ route('official.index') }}">
                                        see more...<i class="align-middle" data-feather="arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">Artikel Terpublikasi</h5>
                </div>
                <div class="card-body py-3">
                    <div class="chart chart-sm">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @section('scripts')
        {{-- Line Chart Script --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let line_statistic_data = @json($line_statistic);

                let ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
                let gradient = ctx.createLinearGradient(0, 0, 0, 225);
                gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
                // Line chart
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: "line",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                            "Dec"
                        ],
                        datasets: [{
                            label: "Articles",
                            fill: true,
                            backgroundColor: gradient,
                            borderColor: window.theme.primary,
                            data: line_statistic_data
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 1000
                                },
                                display: true,
                                borderDash: [3, 3],
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }]
                        }
                    }
                });
            });
        </script>

        {{-- Calendar Script --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let date = new Date(Date.now());

                let defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
                document.getElementById("datetimepicker-dashboard").flatpickr({
                    inline: true,
                    preletrow: "<span title=\"Previous month\">&laquo;</span>",
                    nextArrow: "<span title=\"Next month\">&raquo;</span>",
                    defaultDate: defaultDate
                });
            });
        </script>
    @endsection

</x-layout.master>
