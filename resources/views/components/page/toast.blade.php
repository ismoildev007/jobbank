<style>
    /* Toast Notification */
    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #28a745; /* Yashil muvaffaqiyat rangi */
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1050;
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: translateY(-20px);
    }

    .toast.show {
        opacity: 1;
        transform: translateY(0);
    }

    .toast .close-btn {
        margin-left: 15px;
        cursor: pointer;
        font-weight: bold;
    }
</style>
<!-- Toast Notification -->
<div id="toast" class="toast">
    <span id="toast-message"></span>
    <span class="close-btn" onclick="hideToast()">&times;</span>
</div>
    <!-- Oldingi kodlar (xizmatlar ro'yxati, filtrlar va h.k.) -->

    <!-- Toast Notification JavaScript -->
    <script>
        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            toastMessage.textContent = message;
            toast.classList.add('show');

            // 5 soniyadan keyin avtomatik yashirish
            setTimeout(() => {
                hideToast();
            }, 5000);
        }

        function hideToast() {
            const toast = document.getElementById('toast');
            toast.classList.remove('show');
        }

        // Laravel xabarlarini tekshirish
        @if (session('success'))
        showToast("{{ session('success') }}");
        @endif
    </script>
