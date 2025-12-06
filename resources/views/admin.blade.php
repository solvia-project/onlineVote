@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('content')

<!-- Loader -->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>

<!-- Page Wrapper Start -->
<div class="page-wrapper compact-sidebar" id="pageWrapper">

    <!-- Page Header -->
    <div class="page-main-header">
        <div class="main-header-right row m-0">
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light btn-logout" type="button">
                            <i data-feather="log-out"></i> Log out
                        </button>
                    </li>
                </ul>
            </div>

            <div class="d-lg-none mobile-toggle pull-right w-auto">
                <i data-feather="more-horizontal"></i>
            </div>

        </div>
    </div>
    <!-- Page Header End -->

    <div class="page-body-wrapper sidebar-icon">

        <!-- Sidebar -->
        <header class="main-nav">

            <div class="sidebar-user text-center">
                <img class="img-90 rounded-circle"
                    src="{{ asset('images/dashboard/boy-2.png') }}"
                    alt="Avatar" />
                <a href="user-profile">
                    <h6 class="mt-3 f-14 f-w-600">{{ Auth::check() ? Auth::user()->name : 'User' }}</h6>
                </a>
                <p class="mb-0 font-roboto">{{ ucfirst(Auth::check() ? (Auth::user()->role ?? 'user') : 'user') }}</p>
            </div>

            <nav>
                <div class="main-navbar">
                    <div class="left-arrow" id="left-arrow">
                        <i data-feather="arrow-left"></i>
                    </div>

                    <div id="mainnav">
                        <ul class="nav-menu custom-scrollbar">

                            <li class="back-btn">
                                <div class="mobile-back text-end">
                                    <span>Back</span>
                                    <i class="fa fa-angle-right ps-2"></i>
                                </div>
                            </li>

                            <li class="dropdown">
                                <a class="nav-link menu-title active" href="/admin/dashboard">
                                    <i data-feather="home"></i> <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a class="nav-link menu-title" href="/admin/manage">
                                    <i data-feather="airplay"></i> <span>Manage Election</span>
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="right-arrow" id="right-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </div>
            </nav>

        </header>
        <!-- Sidebar End -->

        <!-- Page Content -->
        <div class="page-body">

            <div class="container-fluid">

                <h1 class="mb-4 fw-bold">Dashboard</h1>

                <div class="row g-4 align-items-stretch">

                    <!-- LEFT PROFILE -->
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <div class="card p-3"
                            style="background:#325246; color:white; border-radius:12px; height:100%;">

                            <h6 class="fw-bold text-white mb-2">Hi, {{ Auth::user()->name }}</h6>
                            <p class="text-white-50 mb-3">Welcome back, {{ ucfirst(Auth::user()->role ?? 'user') }}</p>

                            <div class="p-3 text-center"
                                style="background:#b1d4c7; border-radius:12px;">

                                <p class="text-dark mb-2">Welcome to Election Page</p>

                                <iframe src="https://free.timeanddate.com/clock/ia6pgnx8/n108/szw210/szh210/hocfff/hbw0/hfcb2d4c6/cf100/hgr0/fas20/fdi86/mqc000/mqs2/mql3/mqw4/mqd70/mhc000/mhs2/mhl3/mhw4/mhd70/mmv0/hhs3/hms3/hsc00f" frameborder="0" width="210" height="210"></iframe>

                                <p class="mt-3 text-white-50 small text-center">
                                    {{ now()->format('l, d F Y') }}
                                </p>

                            </div>

                        </div>
                    </div>

                    <!-- RIGHT SIDE STATS -->
                    <div class="col-lg-8 col-md-6 d-flex">
                        <div class="w-100 d-flex flex-column">

                            <div class="row g-4 align-items-stretch flex-grow-1">

                                <!-- STAT CARD -->
                                @php($cards = [
                                ['label' => 'Total Elections', 'value' => $stats['totalElections'] ?? 0],
                                ['label' => 'Active Elections', 'value' => $stats['activeElections'] ?? 0],
                                ['label' => 'Total Candidates', 'value' => $stats['totalCandidates'] ?? 0],
                                ['label' => 'Total Votes Cast', 'value' => $stats['totalVotes'] ?? 0],
                                ])
                                @foreach($cards as $card)
                                <div class="col-lg-6 col-md-6 d-flex">
                                    <div class="card p-3 text-center h-100 w-100" style="background:#325246; color:white; border-radius:12px;">
                                        <div class="p-3 h-100 d-flex flex-column justify-content-center" style="background:#b1d4c7; border-radius:12px;">
                                            <p class="mb-2 fw-semibold text-dark">{{ $card['label'] }}</p>
                                            <p class="mb-1">
                                                <img src="{{ asset('images/voter/user-check.svg') }}" width="35">
                                                <span class="fw-bold text-dark">{{ number_format($card['value']) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>

                </div>

                <hr class="my-5">

                <div class="row g-4 p-4" style="border-radius:12px; background:#ffffff;">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Analytics</h5>
                        <div class="d-flex align-items-center gap-2">
                            <select id="analyticsElection" class="form-select" style="max-width:260px;"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" style="border-radius:12px;">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-3">Registration Revenue</h6>
                                    <div id="revenueChart" style="height:180px;"></div>
                                    <p class="m-0 mt-2 text-muted small">Total: <span id="revenueTotal">0</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="border-radius:12px;">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-3">Votes</h6>
                                    <div id="votesChart" style="height:180px;"></div>
                                    <p class="m-0 mt-2 text-muted small">Total: <span id="votesTotal">0</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                {{-- testing --}}

                <!-- WRAPPER -->
                <div class="row g-4 p-4" style="border-radius:12px; background:#ffffff;">
                    <!-- TITLE + SEARCH -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Votes Report</h5>

                        <input
                            id="dashboardSearch"
                            type="text"
                            placeholder="Search..."
                            class="px-3 py-2 border border-gray-300 rounded-lg"
                            style="max-width: 250px;">
                    </div>
                    <!-- LEFT SIDEBAR -->
                    <div class="col-3 border-end">
                        <div class="h-100 pe-3">

                            <div class="list-group">
                                @forelse($elections ?? [] as $e)
                                @php($top = $topCandidates[$e->id] ?? null)
                                <a class="list-group-item mb-3 text-center" style="border-radius:12px;"
                                    data-election-id="{{ $e->id }}"
                                    data-e-name="{{ strtolower($e->name) }}"
                                    data-e-cand="{{ strtolower(optional($top)->name ?? '') }}">
                                    <p class="fw-bold d-block mb-1" style="font-size:16px; text-decoration:none;">
                                        {{ $e->name }}
                                    </p>
                                    {{-- <p class="m-0 fw-semibold">{{ optional($topCandidates[$e->id] ?? null)->name ?? '—' }}</p> --}}
                                    <p class="m-0 text-muted small">{{ number_format($e->votes_count) }} Votes</p>
                                </a>
                                @empty
                                <div class="text-center text-muted">No elections</div>
                                @endforelse
                            </div>


                        </div>
                    </div>

                    <!-- RIGHT SIDE ELECTION CARDS -->
                    <div class="col-xl-9 col-lg-4 col-md-7">
                        <div class="row g-4" id="electionCards">
                            <div class="col-12 d-flex align-items-center justify-content-center" style="min-height: 320px;">
                                <div class="text-muted">choose election at sidebar</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
</div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('dashboardSearch');
        if (!input) return;
        const filter = (q) => {
            const term = (q || '').toLowerCase().trim();
            document.querySelectorAll('.list-group .list-group-item[data-e-name]').forEach(el => {
                const name = el.dataset.eName || '';
                const cand = el.dataset.eCand || '';
                const match = !term || name.includes(term) || cand.includes(term);
                el.style.display = match ? '' : 'none';
            });
            document.querySelectorAll('#electionCards [data-e-name], #electionCards [data-e-cand]').forEach(el => {
                const name = el.dataset.eName || '';
                const cand = el.dataset.eCand || '';
                const match = !term || name.includes(term) || cand.includes(term);
                el.style.display = match ? '' : 'none';
            });
        };
        input.addEventListener('input', (e) => filter(e.target.value));

        document.querySelectorAll('.btn-logout').forEach(btn => {
            btn.addEventListener('click', () => {
                const form = document.getElementById('logout-form');
                if (form) {
                    form.submit();
                    return;
                }
                const f = document.createElement('form');
                f.method = 'POST';
                f.action = '/logout';
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                f.appendChild(csrf);
                document.body.appendChild(f);
                f.submit();
            });
        });

        document.querySelectorAll('.list-group .list-group-item[data-election-id]').forEach(item => {
            item.addEventListener('click', async () => {
                const id = item.dataset.electionId;
                const name = item.querySelector('p.fw-bold')?.textContent || '';
                const container = document.getElementById('electionCards');
                if (!id || !container) return;
                container.innerHTML = '';
                const res = await fetch(`/elections/${id}/candidates`);
                if (!res.ok) return;
                const data = await res.json();
                if (!Array.isArray(data) || data.length === 0) {
                    const empty = document.createElement('div');
                    empty.className = 'col-12';
                    empty.innerHTML = '<div class="text-center text-muted">No candidates</div>';
                    container.appendChild(empty);
                    return;
                }
                const fallbackImg = "{{ asset('images/caleg/caleg.png') }}";
                data.forEach(c => {
                    const col = document.createElement('div');
                    col.className = 'col-4';
                    col.setAttribute('data-e-name', name.toLowerCase());
                    col.setAttribute('data-e-cand', (c.name || '').toLowerCase());
                    const img = c.image_url || fallbackImg;
                    const position = (c.position && c.position.name) ? c.position.name : '';
                    const votes = c.votes_count || 0;
                    col.innerHTML = `
                        <div class="card shadow-sm h-100" style="border-radius:12px;">
                            <div class="text-center p-3">
                                <h6 class="fw-bold m-0">${position}</h6>
                            </div>
                            <img src="${img}" class="card-img-top" style="border-radius:12px; padding:40px;">
                            <div class="card-body text-center">
                                <p class="fw-bold m-0">${c.name || ''}</p>
                                <p class="m-0 fw-semibold" style="font-size:20px;">${votes.toLocaleString()}</p>
                                <p class="text-muted small">Votes</p>
                            </div>
                        </div>
                    `;
                    container.appendChild(col);
                });
            });
        });

        function fmtMoney(n) {
            return (n || 0).toLocaleString('id-ID');
        }
        let revenueChart, votesChart;
        async function loadAnalytics(electionId) {
            const res = await fetch(`/admin/analytics${electionId?`?election_id=${electionId}`:''}`);
            if (!res.ok) return;
            const data = await res.json();
            const sel = document.getElementById('analyticsElection');
            if (sel && sel.options.length === 0) {
                const opt0 = document.createElement('option');
                opt0.value = '';
                opt0.textContent = 'All Elections';
                sel.appendChild(opt0);
                (data.elections || []).forEach(e => {
                    const o = document.createElement('option');
                    o.value = e.id;
                    o.textContent = e.name;
                    sel.appendChild(o);
                });
            }
            document.getElementById('revenueTotal').textContent = fmtMoney(data.revenue_total || 0);
            document.getElementById('votesTotal').textContent = fmtMoney(data.votes_total || 0);
            const revSeries = (data.revenue_by_day || []).map(d => ({
                x: d.day,
                y: d.total
            }));
            const vSeries = (data.votes_by_day || []).map(d => ({
                x: d.day,
                y: d.total
            }));

            const revOpts = {
                series: [{
                    name: 'Revenue (IDR)',
                    data: revSeries
                }],
                chart: {
                    type: 'area',
                    height: 220,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    colors: ['#325246']
                },
                markers: {
                    size: 4,
                    colors: ['#325246'],
                    strokeColors: '#325246',
                    strokeWidth: 2
                },
                xaxis: {
                    type: 'category',
                    labels: {
                        rotate: 0
                    }
                },
                yaxis: {
                    min: 0
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.6,
                        stops: [0, 100]
                    }
                },
                colors: ['#b1d4c7']
            };
            const maxVotesPoint = Math.max(...(vSeries || []).map(p => (typeof p.y === 'number' ? p.y : parseFloat(p.y) || 0)), 0);
            const stepVotes = Math.max(1, Math.ceil(maxVotesPoint / 6));
            const yMaxVotes = stepVotes * 6;
            const votesOpts = {
                series: [{
                    name: 'Votes',
                    data: vSeries
                }],
                chart: {
                    type: 'area',
                    height: 220,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    colors: ['#325246']
                },
                markers: {
                    size: 4,
                    colors: ['#325246'],
                    strokeColors: '#325246',
                    strokeWidth: 2
                },
                xaxis: {
                    type: 'category',
                    labels: {
                        rotate: 0
                    }
                },
                yaxis: {
                    min: 0,
                    max: yMaxVotes,
                    tickAmount: 6,
                    labels: {
                        formatter: (val) => String(Math.round(val))
                    }
                },
                tooltip: {
                    y: {
                        formatter: (val) => parseInt(val, 10).toLocaleString('id-ID')
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.2,
                        opacityTo: 0.4,
                        stops: [0, 100]
                    }
                },
                colors: ['#b1d4c7']
            };
            if (revenueChart) revenueChart.destroy();
            if (votesChart) votesChart.destroy();
            revenueChart = new ApexCharts(document.querySelector('#revenueChart'), revOpts);
            votesChart = new ApexCharts(document.querySelector('#votesChart'), votesOpts);
            revenueChart.render();
            votesChart.render();
        }
        const sel = document.getElementById('analyticsElection');
        if (sel) {
            sel.addEventListener('change', () => {
                const id = sel.value ? parseInt(sel.value, 10) : undefined;
                loadAnalytics(id);
            });
        }
        const script = document.createElement('script');
        script.src = '/js/chart/apex-chart/apex-chart.js';
        script.onload = () => loadAnalytics();
        document.body.appendChild(script);
    });
</script>
@endpush