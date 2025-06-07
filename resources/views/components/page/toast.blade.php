<style>
    /* Ixcham Toast Notification */
    .toast {
        position: fixed;
        top: 15px;
        right: 15px;
        background-color: #28a745; /* Yashil muvaffaqiyat rangi */
        color: #fff;
        padding: 8px 12px;
        border-radius: 4px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        font-size: 14px;
        font-weight: 500;
        z-index: 1050;
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: translateY(-10px);
        display: flex;
        align-items: center;
        min-width: 100px;
    }

    .toast.show {
        opacity: 1;
        transform: translateY(0);
    }

    .toast .close-btn {
        margin-left: 10px;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        line-height: 1;
        color: #fff;
        user-select: none;
    }
</style>

<!-- Toast Notification -->
<div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="display:none;">
    <span id="toast-message"></span>
    <span class="close-btn" onclick="hideToast()" aria-label="Yopish">&times;</span>
</div>

<script>
    function showToast(message) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        toastMessage.textContent = message;
        toast.style.display = 'flex';
        toast.classList.add('show');

        // 3 soniyadan keyin avtomatik yashirish
        setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.remove('show');
        setTimeout(() => {
            toast.style.display = 'none';
        }, 300); // transition tugagandan keyin display:none qilamiz
    }

    // Laravel xabarlarini tekshirish
    @if (session('success'))
    showToast("{{ session('success') }}");
    @endif
</script>
