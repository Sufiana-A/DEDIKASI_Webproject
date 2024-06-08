@extends('layout.master')

@section('content')
<style>
    .view-button {
        position: absolute;
        bottom: 12px;
        left: 12px;
        font-size: 1.5em;
        background: none;
        border: none;
        color: inherit;
        cursor: pointer;
    }
    .favorite-icon {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 1.5em;
        color: #ccc;
        cursor: pointer;
        background: none;
        border: none;
    }
    .favorite-icon:hover {
        color: #ff0;
    }
    .description {
        margin-bottom: 10px;
    }
    .popup {
        display: none;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        z-index: 1001;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        border-radius: 10px;
        max-width: 400px;
        width: 100%;
    }
    .popup-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }
    .popup-title {
        font-size: 18px;
        font-weight: bold;
    }
    .popup-close {
        cursor: pointer;
        font-size: 18px;
        color: #aaa;
    }
    .popup-close:hover {
        color: #000;
    }
    .popup-body {
        margin-top: 10px;
    }
    .popup-footer {
        margin-top: 20px;
        text-align: right;
    }
    .favorite-active {
        color: yellow;
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
    }
    .card-container .card {
        margin: 10px;
        flex: 1 0 21%;
    }
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .alert-error {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
    input[type="checkbox"] {
        transform: scale(1.5); /* Adjust the scale factor as needed */
        margin-right: 10px; /* Add some spacing between checkbox and label */
    }
    .popup {
    /* ... (style yang sudah ada) ... */
    animation: fadeIn 0.3s ease-out forwards; /* Tambahkan animasi ini */
}

/* Efek hover untuk tombol close */
.popup-close:hover {
    color: #f00; /* Ubah warna saat di-hover */
    transform: rotate(90deg); /* Tambahkan rotasi */
    transition: transform 0.2s, color 0.2s; /* Tambahkan transisi untuk smooth effect */
}

/* Styling untuk checkbox yang lebih menarik */
input[type="checkbox"] {
    -webkit-appearance: none; /* Hilangkan style bawaan */
    appearance: none;
    background-color: #fff; /* Warna background */
    margin: 10px; /* Jarak dari teks */
    font-size: 1.5em; /* Ukuran checkbox */
    width: 1em; /* Lebar */
    height: 1em; /* Tinggi */
    border: 2px solid #555; /* Border */
    border-radius: 0.15em; /* Rounded corners */
    transform: scale(1.2); /* Besarkan sedikit */
    vertical-align: middle; /* Align dengan teks */
    position: relative; /* Untuk pseudo-elements */
}

input[type="checkbox"]:checked {
    background-color: #007bff; /* Warna saat dicentang */
    border-color: #007bff; /* Border saat dicentang */
}

input[type="checkbox"]:checked:after {
    content: '✔'; /* Tambahkan tanda centang */
    position: absolute;
    top: -0.3em;
    left: 0.1em;
    color: #fff; /* Warna tanda centang */
}
.popup-close {
    cursor: pointer;
    font-size: 24px; /* Besarkan ukuran tombol */
    color: #aaa;
}
</style>

<div class="page-wrapper">
    <div class="content container-fluid">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Selamat Datang!</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-10 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Pelatihan yang Kamu Ikuti</h6>
                                <h3>20</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-container">
            @foreach($pelatihanAcc as $enroll)
            <div class="col-12 col-lg-12 col-xl-2 d-flex">
                <div class="card flex-fill comman-shadow position-relative">
                    <div class="card-body">
                        <div class="d-flex justify-content-left mb-3 text-left">
                            <h5 class="card-title"><strong>{{ $enroll->title }}</strong></h5>
                        </div>
                        <div class="d-flex justify-content-left mb-3 text-left description">
                            <p class="card-text">{!! Str::limit(strip_tags($enroll->description), 100, '.......') !!}</p>
                        </div>
                        <br>
                        <div class="actions">
                            @if($enroll->pivot->favorite === 'yes')
                                <form action="{{ route('remove-favorite') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $enroll->id }}">
                                    <button type="submit" class="view-button">
                                        <i class="fe fe-trash"></i>
                                    </button>
                                </form>
                            @else
                                <button class="view-button" data-target="popup{{ $enroll->id }}">
                                    <i class="fe fe-star"></i> 
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Popup Section -->
            <div id="popup{{ $enroll->id }}" class="popup">
                <div class="popup-header">
                    <span class="popup-title">Tambahkan ke Favorit</span>
                    <span class="popup-close" data-target="popup{{ $enroll->id }}">&times;</span>
                </div>
                <div class="popup-body">
                    <form id="form{{ $enroll->id }}" action="{{ route('save-checkbox') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $enroll->id }}">
                        <input type="checkbox" name="favorite_course[]" value="{{ $enroll->id }}"> Tambahkan ke Favorit ke Dashboard
                    </form>
                    <div class="warning" style="display:none; color:red;">Isi kolom cekbox!</div>
                </div>
                <div class="popup-footer">
                    <button type="button" class="btn btn-primary btn-submit" data-target="popup{{ $enroll->id }}">Submit</button>
                </div>
            </div>
            <!-- End Popup Section -->
            @endforeach
        </div>

    </div>
</div>

<!-- Overlay Element -->
<div class="overlay"></div>

<script>
    // Ambil semua tombol "Tambahkan ke Favorit" dan tambahkan event listener
    document.querySelectorAll('.view-button').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const popup = document.getElementById(targetId);
            const overlay = document.querySelector('.overlay');
            popup.style.display = 'block';
            overlay.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Mencegah scroll saat popup muncul
        });
    });

    // Ambil semua tombol "close" pada popup dan tambahkan event listener
    document.querySelectorAll('.popup-close').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const popup = document.getElementById(targetId);
            const overlay = document.querySelector('.overlay');
            popup.style.display = 'none';
            overlay.style.display = 'none';
            document.body.style.overflow = 'auto'; // Mengembalikan scroll saat popup ditutup
        });
    });

    // Ambil semua tombol "submit" pada popup dan tambahkan event listener
    document.querySelectorAll('.btn-submit').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const form = document.getElementById(`form${targetId.replace('popup', '')}`);
            form.submit();
        });
    });
</script>
@endsection
