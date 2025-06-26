<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - PAUD Ceria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes confetti {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
        }
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            animation: confetti 5s linear forwards;
        }
.checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            stroke-width: 5;
            stroke: #4CAF50;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: 0 0 0 rgba(76, 175, 80, 0.4);
            animation: checkmark-fill 0.4s ease-in-out 0.4s forwards, 
                       checkmark-scale 0.3s ease-in-out 0.9s both;
        }
.checkmark-circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 5;
            stroke-miterlimit: 10;
            stroke: #4CAF50;
            fill: none;
            animation: checkmark-circle 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        .checkmark-check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: checkmark-check 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        @keyframes checkmark-circle {
            0% { stroke-dashoffset: 166; }
            100% { stroke-dashoffset: 0; }
        }
@keyframes checkmark-circle {
            0% { stroke-dashoffset: 166; }
            100% { stroke-dashoffset: 0; }
        }
        @keyframes checkmark-check {
            0% { stroke-dashoffset: 48; }
            100% { stroke-dashoffset: 0; }
        }
        @keyframes checkmark-fill {
            0% { background: rgba(76, 175, 80, 0); }
            100% { background: rgba(76, 175, 80, 0.1); }
        }
        @keyframes checkmark-scale {
            0%, 100% { transform: none; }
            50% { transform: scale3d(1.1, 1.1, 1); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen flex items-center justify-center p-4">
    <div class="relative max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
        <!-- Confetti Effect -->
        <div id="confetti-container" class="absolute inset-0 overflow-hidden"></div>
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-400 to-purple-500 py-8 px-6 text-center">
            <svg class="checkmark mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
            <h1 class="text-3xl font-bold text-white mt-4">PENDAFTARAN BERHASIL!</h1>
        </div>
<!-- Content -->
        <div class="px-8 py-10 text-center">
            <p class="text-gray-600 mb-8">
                Terima kasih telah mendaftarkan putra/putri Anda di PAUD Ceria. 
                Silakan hubungi admin kami via WhatsApp untuk proses selanjutnya.
            </p>
            
            <!-- WhatsApp Button -->
            <a id="whatsappButton" href="#" class="inline-flex items-center justify-center px-8 py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded-full shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl mb-6">
                <i class="fab fa-whatsapp text-2xl mr-3"></i> 
                <span class="text-lg">Hubungi Admin via WhatsApp</span>
            </a>
            
            <div class="bg-blue-50 rounded-lg p-4 mb-6">
                <p class="text-sm text-blue-600 font-medium">
                    <i class="fas fa-info-circle mr-2"></i>
                    Pastikan nomor WhatsApp Anda aktif untuk memudahkan konfirmasi.
                </p>
            </div>
 <div class="border-t pt-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Proses Selanjutnya</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-blue-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <span class="text-blue-600 font-bold">1</span>
                        </div>
                        <div class="text-left">
                            <h4 class="font-medium text-gray-800">Verifikasi Data</h4>
                            <p class="text-gray-600 text-sm">Admin akan menghubungi Anda dalam 1×24 jam</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-purple-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <span class="text-purple-600 font-bold">2</span>
                        </div>
<div class="text-left">
                            <h4 class="font-medium text-gray-800">Pembayaran & Dokumen</h4>
                            <p class="text-gray-600 text-sm">Lengkapi administrasi dengan petunjuk dari admin</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tombol Kembali ke Halaman Utama -->
            <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded-full shadow-md transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg mt-4">
                <i class="fas fa-home mr-2 text-xs"></i>Kembali ke Halaman Utama
            </a>
        </div>
    </div>
<script>
        // Generate confetti
        function createConfetti() {
            const colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFEB3B', '#FFC107', '#FF9800', '#FF5722'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = -10 + 'px';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
                confetti.style.animationDelay = Math.random() * 2 + 's';
                
                // Random shapes
                if (Math.random() > 0.5) {
                    confetti.style.borderRadius = '50%';
                }
 // Random sizes
                const size = Math.random() * 10 + 5;
                confetti.style.width = size + 'px';
                confetti.style.height = size + 'px';
                
                document.getElementById('confetti-container').appendChild(confetti);
            }
        }
        
        // Set WhatsApp link with auto message
        function setWhatsAppLink() {
            const phoneNumber = '6289681669087'; // Ganti dengan nomor admin PAUD
            const message = encodeURIComponent(
                "Halo Admin PAUD Ceria,\n\n" +
                "Saya telah melakukan pendaftaran online melalui website PAUD Ceria.\n" +
                "Berikut data yang telah saya isi:\n\n" +
                "*Nama Anak*: [Nama Anak]\n" +
                "*Nama Orang Tua*: [Nama Orang Tua]\n" +
                "*Nomor WhatsApp*: [Nomor WhatsApp]\n\n" +
                "Mohon info langkah selanjutnya. Terima kasih."
            );
            
            document.getElementById('whatsappButton').href = `https://wa.me/${phoneNumber}?text=${message}`;
        }
        
        // Initialize
        window.onload = function() {
            createConfetti();
            setWhatsAppLink();
};
    </script>
</body>
</html>