@extends('template.layout')

@section('content')
    <style>
        .dashboard-card {
            border-radius: 18px;
            padding: 22px;
            min-height: 160px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        .dashboard-card h6 {
            font-size: 14px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0;
        }

        .dashboard-card h1 {
            font-size: 40px;
            font-weight: 700;
            margin: 10px 0;
            color: #1a202c;
        }

        .dashboard-card p {
            font-size: 13px;
            margin: 0;
        }

        .dashboard-card i {
            font-size: 18px;
        }

        .card-footer-link {
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
        }

        .card-footer-link:hover {
            text-decoration: underline;
        }

        /* Gradient */
        .card-video {
            background: linear-gradient(135deg, #bce0c5, #e4f7ea);
        }

        .card-video i,
        .card-video p,
        .card-video .card-footer-link {
            color: #27ae60;
        }

        .card-flyer {
            background: linear-gradient(135deg, #b6d9e8, #e4f5fb);
        }

        .card-flyer i,
        .card-flyer p,
        .card-flyer .card-footer-link {
            color: #3498db;
        }

        .card-banner {
            background: linear-gradient(135deg, #b5e2e2, #ebf9ec);
        }

        .card-banner i,
        .card-banner p,
        .card-banner .card-footer-link {
            color: #24989a;
        }

        .card-running {
            background: linear-gradient(135deg, #e9e1bc, #fcf8e6);
        }

        .card-running i,
        .card-running p,
        .card-running .card-footer-link {
            color: #d4a017;
        }


        .text-gradient {
            background: linear-gradient(to left, #2386d1, #1de7e4);
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            display: inline-block;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card p-4">

                <div class="mb-4">
                    <h2 class="font-weight-bold mb-1 text-gradient">Dashboard</h2><br>
                    <small class="text-muted">Overview Display TV</small>
                </div>
                <div class="row">
                    <!-- Total Video -->
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <a href="{{ route('videos.index') }}" class="card-decoration-none">
                            <div class="dashboard-card card-video">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h6>Total Video</h6>
                                    <i class="fas fa-video"></i>
                                </div>
                                <div>
                                    <h1>{{ $totalVideo }}</h1>
                                    <p>{{ $totalVideo }} Total Data</p>
                                </div>
                                <span class="card-footer-link">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Total Flyer -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <a href="{{ route('flyers.index') }}" class="card-decoration-none">
                        <div class="dashboard-card card-flyer">
                            <div class="d-flex justify-content-between align-items-start">
                                <h6>Total Flyer</h6>
                                <i class="fas fa-image"></i>
                            </div>
                            <div>
                                <h1>{{ $totalFlyer }}</h1>
                                <p>{{ $totalFlyer }} Total Data</p>
                            </div>
                            <span class="card-footer-link">
                                More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Total Banner -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <a href="{{ route('banners.index') }}" class="text-decoration-none">
                    <div class="dashboard-card card-banner">
                        <div class="d-flex justify-content-between align-items-start">
                            <h6>Total Banner</h6>
                            <i class="fas fa-images"></i>
                        </div>
                        <div>
                            <h1>{{ $totalBanner }}</h1>
                            <p>{{ $totalBanner }} Total Data</p>
                        </div>
                        <span class="card-footer-link">
                            More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Running Text -->
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <a href="{{ route('runningtext.index') }}" class="text-decoration-none">
                <div class="dashboard-card card-running">
                    <div class="d-flex justify-content-between align-items-start">
                        <h6>Running Text</h6>
                        <i class="fas fa-text-width"></i>
                    </div>
                    <div>
                        <h1>{{ $totalRunningText }}</h1>
                        <p>{{ $totalRunningText }} Total Data</p>
                    </div>
                    <span class="card-footer-link">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </span>
                </div>
            </a>
        </div>
    </div>

    </div>
    </div>
    </div>
@endsection
