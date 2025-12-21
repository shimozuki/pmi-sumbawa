<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMI Kabupaten Sumbawa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .pmi-red {
            color: #b91c1c;
        }

        .bg-pmi {
            background-color: #b91c1c;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- NAVBAR --}}
    <header class="bg-white shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-pmi flex items-center justify-center text-white font-bold">
                    PMI
                </div>
                <span class="font-semibold text-lg">PMI Sumbawa</span>
            </div>

            <div class="flex gap-3">
                @auth
                <a href="/dashboard" class="px-4 py-2 text-sm bg-pmi text-white rounded-md">
                    Dashboard
                </a>
                @else
                <a href="/admin/login"
                    class="px-4 py-2 text-sm bg-red-600 text-white rounded-md hover:bg-red-700">
                    Login
                </a>
                @endauth
            </div>
        </div>
    </header>

    {{-- HERO --}}
    <section class="pt-32 pb-20 bg-gradient-to-br from-red-50 to-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Setetes Darah Anda,
                    <span class="pmi-red">Sejuta Harapan</span>
                </h1>

                <p class="text-gray-600 mb-8">
                    Palang Merah Indonesia Kabupaten Sumbawa berkomitmen
                    menyediakan darah yang aman dan berkualitas bagi masyarakat.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#donor" class="bg-pmi text-white px-6 py-3 rounded-lg shadow hover:bg-red-700 transition">
                        Jadwal Donor
                    </a>
                    <a href="/admin/register"
                        class="border border-red-600 text-red-600 px-6 py-3 rounded-lg hover:bg-red-50 transition">
                        Daftar Pendonor
                    </a

                        </div>
                </div>

                <div class="hidden md:block">
                    <img src="{{ asset('images/donation-pana.png') }}"
                        class="rounded-xl shadow-lg"
                        alt="Donor Darah">
                </div>
            </div>
    </section>

    {{-- LAYANAN --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Layanan PMI Sumbawa</h2>
            <p class="text-gray-600 mb-12">Pelayanan cepat, aman, dan terpercaya</p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4 pmi-red">🩸</div>
                    <h3 class="font-semibold text-lg mb-2">Donor Darah</h3>
                    <p class="text-sm text-gray-600">
                        Kegiatan donor rutin dan mobile unit ke berbagai lokasi.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4 pmi-red">📦</div>
                    <h3 class="font-semibold text-lg mb-2">Stok Darah</h3>
                    <p class="text-sm text-gray-600">
                        Monitoring stok darah real-time dan transparan.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4 pmi-red">🚑</div>
                    <h3 class="font-semibold text-lg mb-2">Permintaan Darah</h3>
                    <p class="text-sm text-gray-600">
                        Respon cepat untuk kebutuhan darah darurat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- STATISTIK --}}
    <section class="bg-red-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 text-center gap-8">
            <div>
                <h3 class="text-4xl font-bold">1.200+</h3>
                <p class="text-sm opacity-90">Pendonor Aktif</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold">3.500+</h3>
                <p class="text-sm opacity-90">Kantong Darah / Tahun</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold">24 Jam</h3>
                <p class="text-sm opacity-90">Layanan Darurat</p>
            </div>
        </div>
    </section>

    {{-- ================= GRAFIK DARAH MASUK ================= --}}
    <section class="bg-white py-20">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-2">
                Grafik Donor Darah
            </h2>
            <p class="text-center text-gray-600 mb-10">
                Jumlah darah masuk per bulan
            </p>

            <div class="bg-gray-50 p-6 rounded-xl shadow">
                <canvas id="darahMasukChart" height="300"></canvas>
            </div>
        </div>
    </section>


    {{-- AJAKAN --}}
    <section id="donor" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Ayo Jadi Pahlawan Kemanusiaan</h2>
            <p class="text-gray-600 mb-8">
                Donor darah Anda sangat berarti bagi mereka yang membutuhkan.
            </p>

            <a href="/register" class="inline-block bg-pmi text-white px-8 py-4 rounded-lg shadow hover:bg-red-700 transition">
                Daftar Donor Sekarang
            </a>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-gray-300 py-10">
        <div class="max-w-7xl mx-auto px-6 text-center text-sm">
            <p>© {{ date('Y') }} PMI Kabupaten Sumbawa</p>
            <p class="mt-2">Kemanusiaan • Kesukarelaan • Profesional</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Chart === 'undefined') {
                console.error('Chart.js belum ter-load');
                return;
            }

            const canvas = document.getElementById('darahMasukChart');
            if (!canvas) return;

            new Chart(canvas.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: 'Orang',
                        data: @json($chartData),
                        backgroundColor: '#b91c1c',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>